<?php
/*
	Appointment: Отзывы пользователей о сайте
	File: review.php
	Author: PaZiTiF
	Engine: Vii Engine
	Copyright: MaxiNet (с) 2013
	E-Mail: pazitif@xaker.ru
	URL: http://maxinet.su
	SKYPE: legendar-boy
	ICQ: 44-63-662
	Данный код защищен авторскими правами
*/
if(!defined('MOZG'))
	die('Hacking attempt!');

if($ajax == 'yes')
	NoAjaxQuery();

if($logged){
	$act = $_GET['act'];
	$user_id = $user_info['user_id'];

	switch($act){
		//################### Добавление отзыва в БД ###################//
		case "add":
			NoAjaxQuery();
				$text = ajax_utf8(textFilter($_POST['text'], 5000));
				if($text){
					$db->query("INSERT INTO `".PREFIX."_review` SET text = '{$text}', data = '{$server_time}', aid = '{$user_id}'");					
                }
			die();
		break;
		
		//################### Удаление отзыва с БД ###################//
		case "del":
			NoAjaxQuery();
			$id = intval($_POST['id']);
			$del_rev = $db->super_query("SELECT id, aid FROM `".PREFIX."_review` WHERE id = '{$id}'");
			if($del_rev['aid'] == $user_id){
				$db->query("DELETE FROM `".PREFIX."_review` WHERE id = '{$id}'");
			}
			die();
		break;
		
		//################### Изменение отзыва в БД ###################//
		case "save":
			NoAjaxQuery();
			$id = intval($_POST['id']);
			$texts = ajax_utf8(textFilter($_POST['texts']));
			$edit_rev = $db->super_query("SELECT id, aid FROM `".PREFIX."_review` WHERE id = '{$id}'");
			if($edit_rev['aid'] == $user_id){			
			if($id){
				$db->query("UPDATE `".PREFIX."_review` SET text = '{$texts}' WHERE id = '{$id}'");							
			}
			}
			exit();
		break;
		
		default:

		//################### Вывод всех отзывов ###################//
		$metatags['title'] = "Отзывы о сайте";
		//Проверка залогин ли пользователь
        if($logged){
	        $tpl->set_block("'\\[not-logged\\](.*?)\\[/not-logged\\]'si","");
	        $tpl->set('[logged]','');
	        $tpl->set('[/logged]','');
        } else {
	        $tpl->set_block("'\\[logged\\](.*?)\\[/logged\\]'si","");
	        $tpl->set('[not-logged]','');
	        $tpl->set('[/not-logged]','');
        }
		if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
		$gcount = 10;
		$limit_page = ($page-1) * $gcount;
		$sql_text = $db->super_query("SELECT tb1.id, text, aid, data, tb2.user_search_pref, user_photo, user_last_visit, user_sex FROM `".PREFIX."_review` tb1, `".PREFIX."_users` tb2 WHERE tb1.aid = tb2.user_id ORDER by `id` DESC LIMIT {$limit_page}, {$gcount}", 1);
			//верх и форма отзывов
			$tpl->load_template('review/review_top.tpl');
			$db_num_all = $db->super_query("SELECT COUNT(*) AS id FROM `".PREFIX."_review`");
			if($db_num_all['id'] > 0)
			$tpl->set('{r_cnt}', $db_num_all['id'].' '.gram_record($db_num_all['id'], 'review'));
			else
			$tpl->set('{r_cnt}', '');
			$tpl->set('{my-uid}', $user_info['user_id']);
            if($user_info['user_photo'])
			   $tpl->set('{my-ava}', "/uploads/users/{$user_info['user_id']}/50_{$user_info['user_photo']}");
			else
			   $tpl->set('{my-ava}', '{theme}/images/no_ava_50.png');
			$tpl->compile('info');
		if($sql_text){
			$tpl->load_template('review/review.tpl');
			foreach($sql_text as $sql_rev){
				//Показ кнопок "удалить" и "изменить" только для владельца
			    if($user_info['user_id'] == $sql_rev['aid']){
				   $tpl->set('[a_user]', '');
				   $tpl->set('[/a_user]', '');
				   $tpl->set_block("'\\[not-a_user\\](.*?)\\[/not-a_user\\]'si","");
			    } else {
				   $tpl->set('[not-a_user]', '');
				   $tpl->set('[/not-a_user]', '');
				   $tpl->set_block("'\\[a_user\\](.*?)\\[/a_user\\]'si","");
			    }
				$tpl->set('{aname}', $sql_rev['user_search_pref']);
				$tpl->set('{text}', $sql_rev['text']);
				$tpl->set('{aid}', $sql_rev['aid']);
				megaDate($sql_rev['data'], 1, 1);
				OnlineTpl($sql_rev['user_last_visit']);
				if($sql_rev['user_photo'])
					$tpl->set('{a_ava}', '/uploads/users/'.$sql_rev['aid'].'/100_'.$sql_rev['user_photo']);
				else
					$tpl->set('{a_ava}', '{theme}/images/100_no_ava.png');
				if($sql_rev['user_sex'] == 2)
				    $tpl->set('{rsex}', 'Написала отзыв');
			    else 
				    $tpl->set('{rsex}', 'Написал отзыв');
				$tpl->set('{id}', $sql_rev['id']);
				$tpl->compile('content');
			}
				$db_cnt = $db->super_query("SELECT COUNT(*) AS id FROM `".PREFIX."_review`");
				navigation($gcount, $db_cnt['id'], $config['home_url'].'review&page=');
		} else
				msgbox('', '<br>Ещё никто не оставил отзыв о нашем сайте :( ', 'info_2');
    }

    $tpl->clear();
	$db->free();
	} else {
	$user_speedbar = $lang['no_infooo'];
	msgbox('', $lang['not_logged'], 'info');
}

?>
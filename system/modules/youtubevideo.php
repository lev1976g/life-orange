<?php
/* 
	Appointment: Видеоролики YouTube
	File: youtubevideo.php 
 
*/
if(!defined('MOZG'))
	die('Hacking attempt!');

if($ajax == 'yes')
	NoAjaxQuery();

if($logged){
	$act = $_GET['act'];
	$user_id = $user_info['user_id'];
	$metatags['title'] = $lang['apps'];
	
	switch($act){
			//################### Добавление видео в БД ###################//
		case "send":
			NoAjaxQuery();
			
			if($config['video_mod_add'] == 'yes'){
				$good_video_lnk = ajax_utf8(textFilter($_REQUEST['good_video_lnk']));
                                $title = ajax_utf8(textFilter($_REQUEST['title'], false, true));
                                $descr = ajax_utf8(textFilter($_REQUEST['descr'], 3000));
				$privacy = intval($_POST['privacy']);
				if($privacy <= 0 OR $privacy > 3) $privacy = 1;

				//Если youtube то добавляем префикс src=" и составляем ответ для скрипта, для вставки в БД
				if(preg_match("/src=\"http:\/\/www.youtube.com|src=\"http:\/\/youtube.com/i", 'src="'.$good_video_lnk)){
					$good_video_lnk = str_replace(array('#', '!'), '', $good_video_lnk);
					$exp_y = explode('v=', $good_video_lnk);
					$exp_x = explode('&', $exp_y[1]);
					$result_video_lnk = '<iframe width="770" height="420" src="http://www.youtube.com/embed/'.$exp_x[0].'" frameborder="0" allowfullscreen></iframe>';
				}
				
				
				//Формируем данные о фото
				$photo = $db->safesql(ajax_utf8(htmlspecialchars(trim($_POST['photo']))));
				$photo = str_replace("\\", "/", $photo);
				$img_name_arr = explode(".", $photo);
				$img_format = totranslit(end($img_name_arr));
				$image_name = substr(md5(time().md5($good_video_lnk)), 0, 15);
				
				//Разришенные форматы
				$allowed_files = array('jpg', 'jpeg', 'jpe', 'png', 'gif');

				//Загружаем картинку на сайт
				if(in_array(strtolower($img_format), $allowed_files) && preg_match("/http:\/\//i", $photo) && $result_video_lnk){
							
					//Директория загрузки фото
					$upload_dir = ROOT_DIR.'/uploads/videos/'.$user_id;
							
					//Если нет папки юзера, то создаём её
					if(!is_dir($upload_dir)){ 
						@mkdir($upload_dir, 0777);
						@chmod($upload_dir, 0777);
					}
							
					//Подключаем класс для фотографий
					include ENGINE_DIR.'/classes/images.php';

					@copy($photo, $upload_dir.'/'.$image_name.'.'.$img_format);

					$tmb = new thumbnail($upload_dir.'/'.$image_name.'.'.$img_format);
					$tmb->size_auto(175);
					$tmb->jpeg_quality(100);
					$tmb->save($upload_dir.'/'.$image_name.'.'.$img_format);
				}
				
				if($result_video_lnk AND $title){
					$photo = $config['home_url'].'uploads/videos/'.$user_id.'/'.$image_name.'.'.$img_format;
					$db->query("INSERT INTO `".PREFIX."_videos` SET owner_user_id = '{$user_id}', video = '{$result_video_lnk}', photo = '{$photo}', title = '{$title}', descr = '{$descr}', add_date = NOW(), privacy = '{$privacy}'");
					$dbid = $db->insert_id();
					
					$db->query("UPDATE `".PREFIX."_users` SET user_videos_num = user_videos_num+1 WHERE user_id = '{$user_id}'");
					
					$photo = str_replace($config['home_url'], '/', $photo);
					
					//Добавляем действия в ленту новостей
					$generateLastTime = $server_time-10800;
					$row = $db->super_query("SELECT ac_id, action_text FROM `".PREFIX."_news` WHERE action_time > '{$generateLastTime}' AND action_type = 2 AND ac_user_id = '{$user_id}'");
					if($row)
						$db->query("UPDATE `".PREFIX."_news` SET action_text = '{$dbid}|{$photo}||{$row['action_text']}', action_time = '{$server_time}' WHERE ac_id = '{$row['ac_id']}'");
					else
						$db->query("INSERT INTO `".PREFIX."_news` SET ac_user_id = '{$user_id}', action_type = 2, action_text = '{$dbid}|{$photo}', action_time = '{$server_time}'");

					//Чистим кеш
					mozg_mass_clear_cache_file("user_{$user_id}/page_videos_user|user_{$user_id}/page_videos_user_friends|user_{$user_id}/page_videos_user_all|user_{$user_id}/profile_{$user_id}|user_{$user_id}/videos_num_all|user_{$user_id}/videos_num_friends");
					
					if($_POST['notes'] == 1)
						echo "{$photo}|{$user_id}|{$dbid}";
				}
			} else
				echo 'error';
			
			header("Location: index.php?go=youtubevideo");
		break;	
		
		
		default:
		
			//################### Видеоролики YouTube ###################//
                        $metatags['title'] = 'YouTube Видео';
			$tpl->load_template('youtube/main.tpl');
			$tpl->compile('content');
	}
	$tpl->clear();
	$db->free();
} else {
	$user_speedbar = $lang['no_infooo'];
	msgbox('', $lang['not_logged'], 'info');
}
?>

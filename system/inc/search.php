<?php
/* 
	Appointment: Поиск и замена
	File: search.php
	Author: f0rt1 
	Engine: Vee Engine
	Copyright: NiceWeb Group (с) 2011
	e-mail: niceweb@i.ua
	URL: http://www.niceweb.in.ua/
	ICQ: 427-825-959
	Данный код защищен авторскими правами
*/
if(!defined('MOZG'))
	die('Hacking attempt!');

//Если начали замену
if(isset($_POST['save'])){
	if(function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()){
		$_POST['find'] = stripslashes($_POST['find']);
		$_POST['replace'] = stripslashes($_POST['replace']);
	} 

	$find = $db->safesql(addslashes(trim($_POST['find'])));
	$replace = $db->safesql(addslashes(trim($_POST['replace'])));
	
	if(isset($find) AND !empty($find) AND isset($replace) AND !empty($replace)){
		if($_POST['photo_comm']) $db->query("UPDATE `".PREFIX."_photos_comments` SET `text` = REPLACE(`text`, '".$find."', '".$replace."')");
		if($_POST['video_comm']) $db->query("UPDATE `".PREFIX."_videos_comments` SET `text` = REPLACE(`text`, '".$find."', '".$replace."')");
		if($_POST['notes_comm']) $db->query("UPDATE `".PREFIX."_notes_comments` SET `text` = REPLACE(`text`, '".$find."', '".$replace."')");
		if($_POST['users_wall']) $db->query("UPDATE `".PREFIX."_wall` SET `text` = REPLACE(`text`, '".$find."', '".$replace."')");
		if($_POST['groups_wall']) $db->query("UPDATE `".PREFIX."_communities_wall` SET `text` = REPLACE(`text`, '".$find."', '".$replace."')");
		if($_POST['news']) $db->query("UPDATE `".PREFIX."_news` SET `action_text` = REPLACE(`action_text`, '".$find."', '".$replace."')");
		if($_POST['msg']) $db->query("UPDATE `".PREFIX."_messages` SET `text` = REPLACE(`text`, '".$find."', '".$replace."')");
		if($_POST['gift_msg']) $db->query("UPDATE `".PREFIX."_gifts` SET `msg` = REPLACE(`msg`, '".$find."', '".$replace."')");
		if($_POST['notes_text']) $db->query("UPDATE `".PREFIX."_notes` SET `full_text` = REPLACE(`full_text`, '".$find."', '".$replace."')");
		
		msgbox('Информация', '<div class="alert alert-info">Текст в базе данных был успешно заменен.</div>', '?mod=search');
	} else
		msgbox('Ошибка', '<div class="alert alert-info">Все поля обязательны к заполнению</div>', 'javascript:history.go(-1)');
} else {
	echoheader();
	
	echohtmlstart();
	echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Поиск и замена</li>
</ol>	<h2 class="page-header">Быстрая замена текста в базе данных скрипта</h2>
 <div class="alert alert-info">
                    Данная утилита производит замену текста в вашей базе. Например у вас изменился домен и вы хотите его изменить в комментариях, заметках и т.д.
                </div>
                <div class="alert alert-danger">
                    <strong>Внимание:</strong>Перед заменой не забудьте создать резервную копию базы данных, т.к. данное действие в случае некорректной или не совсем ожидаемой замены, невозможно будет отменить. Мы настоятельно не рекомендуем производить замену коротких слов или предлогов, т.к. они могут встречаться в составе других слов.
                </div>

<form method="POST" action="" style="margin-top:15px">


<label>Где заменять:</label>
   <div class="checkbox">
        <label>
            <input type="checkbox" name="photo_comm" value=""> в комментариях к фотографиям
        </label>
    </div>
   <div class="checkbox">
        <label>
            <input type="checkbox" name="video_comm" value=""> в комментариях к видеозаписям
        </label>
    </div>
	   <div class="checkbox">
        <label>
            <input type="checkbox" name="notes_comm" value=""> в комментариях к заметкам
        </label>
    </div>
	 <div class="checkbox">
        <label>
            <input type="checkbox" name="users_wall" value="">  на стенах пользователей
        </label>
    </div>
		 <div class="checkbox">
        <label>
            <input type="checkbox" name="groups_wall" value="">  на стенах сообществ
        </label>
    </div>
		 <div class="checkbox">
        <label>
            <input type="checkbox" name="news" value="">  в ленте новостей
        </label>
    </div>
		 <div class="checkbox">
        <label>
            <input type="checkbox" name="msg" value="">  в персональных сообщениях
        </label>
    </div>
		 <div class="checkbox">
        <label>
            <input type="checkbox" name="gift_msg" value="">   в сообщениях к подаркам
        </label>
    </div>
		 <div class="checkbox">
        <label>
            <input type="checkbox" name="notes_text" value="">    в содержаниях заметок
        </label>
    </div>

<label>Введите старый текст:</label><textarea class="form-control form-cascade-control" rows="3" name="find"></textarea>

<label>Введите новый текст:</label><textarea class="form-control form-cascade-control rows="4" name="replace"></textarea>
<br>
<input type="submit" value="Произвести замену" name="save" class="btn btn-primary" />

</form>
HTML;

	echohtmlend();
}
?>
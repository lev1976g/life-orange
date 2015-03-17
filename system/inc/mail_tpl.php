<?php
/* 
	Appointment: Шаблоны сообщений
	File: mail_tpl.php
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

	
if(isset($_POST['save'])){
	$find = array ("<", ">");
	$replace = array ("&lt;", "&gt;");
	for($i = 1; $i <= 8; $i++){
		$post = $db->safesql(str_replace($find, $replace, $_POST[$i]));
		$db->query("UPDATE `".PREFIX."_mail_tpl` SET text = '".$post."' WHERE id = '".$i."'");
	}
}

$row1 = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '1'");
$row2 = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '2'");
$row3 = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '3'");
$row4 = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '4'");
$row5 = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '5'");
$row6 = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '6'");
$row7 = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '7'");
$row8 = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '8'");

echoheader();
	
echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Шаблон сообщений</li>
</ol>
	<h2 class="page-header">Шаблон сообщений</h2>
<form method="POST" action="">
HTML;

echohtmlstart();
echo <<<HTML
<h3>1. Настройка E-Mail сообщения, которое отсылается при новой заявки в друзья</h3>
<div class="col-lg-12">
<b>{%user%}</b> &nbsp;-&nbsp; имя пользователя которому предназначено оповещание<br />
<b>{%user-friend%}</b> &nbsp;-&nbsp; пользователь который отправил заявку на дружбу<br><br>
<textarea class="form-control well" rows="5" name="1">{$row1['text']}</textarea>
HTML;
		
echohtmlstart();
echo <<<HTML
<h3>2. Настройка E-Mail сообщения, которое отсылается при ответе на запись</h3>
<b>{%user%}</b> &nbsp;-&nbsp; имя пользователя которому предназначено оповещание<br />
<b>{%user-friend%}</b> &nbsp;-&nbsp; пользователь который ответил<br />
<b>{%rec-link%}</b> &nbsp;-&nbsp; ссылка на запись<br><br>
<textarea class="form-control well" rows="5" name="2">{$row2['text']}</textarea>
HTML;
		
echohtmlstart();
echo <<<HTML
<h3>3. Настройка E-Mail сообщения, которое отсылается при новом комментарии к видео</h3>
<b>{%user%}</b> &nbsp;-&nbsp; имя пользователя которому предназначено оповещание<br />
<b>{%user-friend%}</b> &nbsp;-&nbsp; пользователь который оставил комментарий<br />
<b>{%rec-link%}</b> &nbsp;-&nbsp; ссылка на видеозапись<br><br>
<textarea class="form-control well" rows="5" name="3">{$row3['text']}</textarea>
HTML;
		
echohtmlstart();
echo <<<HTML
<h3>4. Настройка E-Mail сообщения, которое отсылается при новом комментарии к фото</h3>
<b>{%user%}</b> &nbsp;-&nbsp; имя пользователя которому предназначено оповещание<br />
<b>{%user-friend%}</b> &nbsp;-&nbsp; пользователь который оставил комментарий<br />
<b>{%rec-link%}</b> &nbsp;-&nbsp; ссылка на фотографию<br><br>
<textarea class="form-control well" rows="5" name="4">{$row4['text']}</textarea>
HTML;
HTML;
		
echohtmlstart();
echo <<<HTML
<h3>5. sНастройка E-Mail сообщения, которое отсылается при новом комментарии к заметке</h3>
<b>{%user%}</b> &nbsp;-&nbsp; имя пользователя которому предназначено оповещание<br />
<b>{%user-friend%}</b> &nbsp;-&nbsp; пользователь который оставил комментарий<br />
<b>{%rec-link%}</b> &nbsp;-&nbsp; ссылка на заметку<br><br>
<textarea class="form-control well" rows="5" name="5">{$row5['text']}</textarea>
HTML;
		
echohtmlstart();
echo <<<HTML
<h3>6. Настройка E-Mail сообщения, которое отсылается при новом подарке</h3>
<b>{%user%}</b> &nbsp;-&nbsp; имя пользователя которому предназначено оповещание<br />
<b>{%user-friend%}</b> &nbsp;-&nbsp; пользователь который отправил подарок<br />
<b>{%rec-link%}</b> &nbsp;-&nbsp; ссылка на подарки<br><br>
<textarea class="form-control well" rows="5" name="6">{$row6['text']}</textarea>
HTML;
		
echohtmlstart();
echo <<<HTML
<h3>7. Настройка E-Mail сообщения, которое отсылается при новой записи на стене</h3>
<b>{%user%}</b> &nbsp;-&nbsp; имя пользователя которому предназначено оповещание<br />
<b>{%user-friend%}</b> &nbsp;-&nbsp; пользователь который оставил запись<br />
<b>{%rec-link%}</b> &nbsp;-&nbsp; ссылка на запись<br><br>
<textarea class="form-control well" rows="5" name="7">{$row7['text']}</textarea>
HTML;
		
echohtmlstart();
echo <<<HTML
<h3>8. Настройка E-Mail сообщения, которое отсылается при новом персональном сообщении</h3>
<b>{%user%}</b> &nbsp;-&nbsp; имя пользователя которому предназначено оповещание<br />
<b>{%user-friend%}</b> &nbsp;-&nbsp; пользователь который отправил сообщение<br />
<b>{%rec-link%}</b> &nbsp;-&nbsp; ссылка на сообщение<br><br>
<textarea class="form-control well" rows="5" name="8">{$row8['text']}</textarea>
</div>
HTML;
HTML;

echo <<<HTML
<input type="submit" value="Сохранить" name="save" class="inp" style="margin-top:5px" />
</form>
HTML;

echohtmlend();
?>
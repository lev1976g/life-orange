<?php
/* 
	Appointment: Главная админки
	File: main.php
	Author: f0rt1 
	Engine: Vii Engine
	Copyright: NiceWeb Group (с) 2011
	e-mail: niceweb@i.ua
	URL: http://www.niceweb.in.ua/
	ICQ: 427-825-959
	Данный код защищен авторскими правами
*/
if(!defined('MOZG'))
	die('Hacking attempt!');


$row = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_report`");
if($row['cnt']) $new_report = '<font color="red">('.$row['cnt'].')</font>';

$row_reviews = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_reviews` WHERE approve = '1'");
if($row_reviews['cnt']) $new_reviews = '<font color="red">('.$row_reviews['cnt'].')</font>';
	
echoheader();


echo <<<HTML

<script type="text/javascript" src="/system/inc/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$.post('/controlpanel.php', {act: 'send'});
});
</script>

HTML;
echoblock('Фильтр слов', 'Настройка фильтра слов, который будет удалять или заменять указанные слова при добавлении какой-то информации на сайт.', 'wordfilter', 'wordfilter');
echohtmlend();
?>
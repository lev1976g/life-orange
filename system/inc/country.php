<?php
/* 
	Appointment: Страны
	File: country.php
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

//Добавление
if(isset($_POST['add'])){
	$country = textFilter($_POST['country'], false, true);
	if(isset($country) AND !empty($country)){
		$row = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_country` WHERE name = '".$country."'");
		if(!$row['cnt']){
			$db->query("INSERT INTO `".PREFIX."_country` SET name = '".$country."'");
			system_mozg_clear_cache_file('country');
			msgbox('Информация', '<div class="alert alert-info">Страна успешно добавлена</div>', '?mod=country');
		} else
			msgbox('Ошибка', '<div class="alert alert-info">Такая страна уже добавлена</div>', 'javascript:history.go(-1)');
	} else
		msgbox('Ошибка', '<div class="alert alert-info">Введите название страницы</div>', 'javascript:history.go(-1)');
	
	die();
}

//Удаление
if($_GET['act'] == 'del'){
	$id = intval($_GET['id']);
	$row = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_country` WHERE id = '".$id."'");
	if($row['cnt']){
		$db->query("DELETE FROM `".PREFIX."_country` WHERE id = '".$id."'");
		system_mozg_clear_cache_file('country');
		header("Location: ?mod=country");
	}
	die();
}

$sql_ = $db->super_query("SELECT * FROM `".PREFIX."_country` ORDER by `name` ASC", 1);
foreach($sql_ as $row){
	$countryes .= <<<HTML
 <li class="list-group-item">{$row['name']}  [<a href="?mod=country&act=del&id={$row['id']}" style="color:#777">удалить</a>] </li>
HTML;
}

echoheader();
echohtmlstart();

echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Страны</li>
</ol>
	<h2 class="page-header">Страны</h2>
<form method="POST" action="">
<div class="col-lg-6">
<div class="form-group">
    <label>Введите название страны:</label>
	<input type="text" class="form-control form-cascade-control" name="country" />
</div>
<input type="submit" value="Добавить" name="add" class="btn btn-primary" />
</div><div class="clearfix"></div>
</form>
HTML;

echohtmlstart('Список стран');

echo <<<HTML
<div class="col-lg-6">
  <ul class="list-group">
     {$countryes}
    </ul>
	</div>

HTML;

echohtmlend();
?>
<?php
/* 
	Appointment: Статические страницы
	File: static.php
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
	//Подключаем парсер
	include_once ENGINE_DIR.'/classes/parse.php';
	$parse = new parse();
			
	$title = textFilter($_POST['title'], false, true);
	$alt_name = totranslit($_POST['alt_name']);
	$text = $parse->BBparse(textFilter($_POST['text']));
	
	if(isset($title) AND !empty($title) AND isset($text) AND !empty($text) AND isset($alt_name) AND !empty($alt_name)){
		$db->query("INSERT INTO `".PREFIX."_static` SET alt_name = '".$alt_name."', title = '".$title."', text = '".$text."'");
		header("Location: ?mod=static");
	} else
		msgbox('Ошибка', '<div class="alert alert-info">Все поля обязательны к заполнению</div>', 'javascript:history.go(-1)');
} else {
	//Удаление
	if($_GET['act'] == 'del'){
		$id = intval($_GET['id']);
		$db->query("DELETE FROM `".PREFIX."_static` WHERE id = '".$id."'");
		header("Location: ?mod=static");
	}
	
	//Редактирование
	if($_GET['act'] == 'edit'){
		$id = intval($_GET['id']);
		$row = $db->super_query("SELECT title, alt_name, text FROM `".PREFIX."_static` WHERE id = '".$id."'");
		if($row){
		
			//Сохраняем
			if(isset($_POST['save_edit'])){
				//Подключаем парсер
				include_once ENGINE_DIR.'/classes/parse.php';
				$parse = new parse();
						
				$title = textFilter($_POST['title'], false, true);
				$alt_name = totranslit($_POST['alt_name']);
				$text = $parse->BBparse(textFilter($_POST['text']));
				
				if(isset($title) AND !empty($title) AND isset($text) AND !empty($text) AND isset($alt_name) AND !empty($alt_name)){
					$db->query("UPDATE`".PREFIX."_static` SET alt_name = '".$alt_name."', title = '".$title."', text = '".$text."' WHERE id = '".$id."'");
					header("Location: ?mod=static");
				} else
					msgbox('Ошибка', '<div class="alert alert-info">Все поля обязательны к заполнению</div>', 'javascript:history.go(-1)');
					
				die();
			}
			
			echoheader();
			
			$row['title'] = stripslashes($row['title']);
			
			//Подключаем парсер
			include_once ENGINE_DIR.'/classes/parse.php';
			$parse = new parse();
	
			$row['text'] = $parse->BBdecode(myBrRn(stripslashes($row['text'])));
			
			echohtmlstart();
			echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Статические страницы</li>
</ol>	
	
<form method="POST" action="" role="form">

 <div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Редактирование страницы</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Заголовок:</h6></td>
					<td class="col-lg-4"><input type="text" name="title" class="form-control form-cascade-control" value="{$row['title']}" /></td>
				</tr>
				<tr>
					<td><h6>Адрес:</h6><div class="td_br">(например test)</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="alt_name" value="{$row['alt_name']}" /></td>
				</tr>
				<tr>
					<td><h6>Текст:</h6></td>
					<td><textarea class="form-control form-cascade-control" rows="3" name="text">{$row['text']}</textarea></td>
				</tr>
			</tbody>
         </table>
		 </div>

<div class="col-lg-12">
 <input type="submit" value="Сохранить" class="btn btn-primary" name="save" style="margin-top:0px" />
 <input type="submit" value="Назад" class="btn btn-primary" style="margin-top:0px" onClick="history.go(-1); return false" />
</div>
</form>
HTML;
			echohtmlend();
		} else
			msgbox('Информация', '<div class="alert alert-info">Страница не найдена</div>', '?mod=static');
		
		die();
	}
	
	echoheader();
	
	echohtmlstart('Создание новой страницы');
	echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Статические страницы</li>
</ol>
<form method="POST" action="" role="form">
 <div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Редактирование страницы</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Заголовок:</h6></td>
					<td class="col-lg-4"><input type="text" name="title" class="form-control form-cascade-control" value="{$row['title']}" /></td>
				</tr>
				<tr>
					<td><h6>Адрес:</h6><div class="td_br">(например test)</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="alt_name" value="{$row['alt_name']}" /></td>
				</tr>
				<tr>
					<td><h6>Текст:</h6></td>
					<td><textarea class="form-control form-cascade-control" rows="3" name="text">{$row['text']}</textarea></td>
				</tr>
			</tbody>
         </table>
		 </div>

<div class="col-lg-12">
<input type="submit" value="Создать" name="save" class="btn btn-primary" />
</div>
</form>
HTML;
	
	echohtmlstart('Список статических страниц');
	
	$sql_ = $db->super_query("SELECT id, title, alt_name FROM `".PREFIX."_static` ORDER by `id` DESC", 1);
	foreach($sql_ as $row){
		$row['title'] = stripslashes($row['title']);
		$static_list .= <<<HTML
<li class="list-group-item"><a href="?mod=static&act=edit&id={$row['id']}" style="font-size:13px"><b>{$row['title']}</b></a> &nbsp; <span style="color:#777">[ <a href="?mod=static&act=del&id={$row['id']}" style="color:#777">удалить</a> ] [ <a href="/{$row['alt_name']}.html" target="_blank" style="color:#777">просмотр</a> ]</span></li>
HTML;
	}
	
	echo '<ul class="list-group">'.$static_list.'</ul>';
	
	echohtmlend();
}
?>
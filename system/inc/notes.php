<?php
/* 
	Appointment: Заметки
	File: notes.php
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

//Редактирование
if($_GET['act'] == 'edit'){
	$note_id = intval($_GET['id']);
	
	//SQL Запрос на вывод информации о заметке
	$row = $db->super_query("SELECT title, full_text FROM `".PREFIX."_notes` WHERE id = '".$note_id."'");
	
	if($row){
		//Подключаем парсер
		include ENGINE_DIR.'/classes/parse.php';
		$parse = new parse();
		
		if(isset($_POST['save'])){
			$title = textFilter($_POST['title'], false, true);
			$text = $parse->BBparse(textFilter($_POST['full_text']));

			if(isset($title) AND !empty($title) AND isset($text) AND !empty($text)){
				$db->query("UPDATE `".PREFIX."_notes` SET title = '".$title."', full_text = '".$text."' WHERE id = '".$note_id."'");
				msgbox('Информация', '<div class="alert alert-info">Заметка успешно сохранена</div>', '?mod=notes');
			} else
				msgbox('Ошибка', '<div class="alert alert-info">Заполните все поля</div>', '?mod=notes&act=edit&id='.$note_id);
		} else {
			$row['title'] = stripslashes($row['title']);
			$row['full_text'] = $parse->BBdecode(stripslashes(myBrRn($row['full_text'])));
			
			echoheader();
			
			echohtmlstart();
			
			echo <<<HTML
<form action="" method="POST" role="form">

<input type="hidden" name="mod" value="notes" />
 <div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Редактирование заметки</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Заголовок:</h6></td>
					<td class="col-lg-4"><input type="text" name="title" class="form-control form-cascade-control" value="{$row['title']}" /></td>
				</tr>
				<tr>
					<td><h6>Содеражание:</h6></td>
					<td><textarea name="descr" class="form-control form-cascade-control" rows="3">{$row['full_text']}</textarea></td>
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
		}
	} else
		msgbox('Информация', '<div class="alert alert-info">Запрашиваемая заметка не найдена</div>', '?mod=notes');

	die();
}
	
echoheader();	

$se_uid = intval($_GET['se_uid']);
if(!$se_uid) $se_uid = '';

$se_user_id = intval($_GET['se_user_id']);
if(!$se_user_id) $se_user_id = '';

$sort = intval($_GET['sort']);
$se_name = textFilter($_GET['se_name'], false, true);

if($se_uid OR $sort OR $se_name OR $se_user_id){
	if($se_uid) $where_sql .= "AND id = '".$se_uid."' ";
	if($se_user_id) $where_sql .= "AND owner_user_id = '".$se_user_id."' ";
	$query = strtr($se_name, array(' ' => '%')); //Замеянем пробелы на проценты чтоб тоиск был точнее
	if($se_name) $where_sql .= "AND title LIKE '%".$query."%' ";
	if($sort == 1) $order_sql = "`title` ASC";
	else if($sort == 2) $order_sql = "`date` ASC";
	else if($sort == 3) $order_sql = "`comm_num` DESC";
	else $order_sql = "`date` DESC";
} else
	$order_sql = "`date` DESC";
	
$selsorlist = installationSelected($sort, '<option value="1">по алфавиту</option><option value="2">по дате добавления</option><option value="3">по количеству комментариев</option>');

//Выводим список людей
if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
$gcount = 20;
$limit_page = ($page-1)*$gcount;

$sql_ = $db->super_query("SELECT tb1.id, title, date, comm_num, owner_user_id, tb2.user_name FROM `".PREFIX."_notes` tb1, `".PREFIX."_users` tb2 WHERE tb1.owner_user_id = tb2.user_id {$where_sql} ORDER by {$order_sql} LIMIT {$limit_page}, {$gcount}", 1);

//Кол-во людей считаем
$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_notes` WHERE id != '' {$where_sql}");

echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Заметки</li>
</ol>
	
<form action="controlpanel.php" method="GET" role="form">
<input type="hidden" name="mod" value="notes" />
<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Заметки</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Поиск по ID заметки:</h6></td>
					<td class="col-lg-4"><input type="text" name="se_uid" class="form-control form-cascade-control" value="{$se_uid}" /></td>
				</tr>
				<tr>
					<td><h6>Поиск по названию:</h6></td>
					<td><input type="text" name="se_name" class="form-control form-cascade-control" value="{$se_name}" /></td>
				</tr>
				<tr>
					<td><h6>Поиск по ID автора:</h6></td>
					<td><input type="text" name="se_user_id" class="form-control form-cascade-control" value="{$se_user_id}" /></td>
				</tr>
				<tr>
					<td><h6>Бан:</h6></td>
					<td><input type="checkbox" name="ban"  {$checked_ban} /></td>
				</tr>
				<tr>
					<td><h6>Удалены:</h6></td>
					<td><input type="checkbox" name="delet" {$checked_delet} /></td>
				</tr>
				<tr>
					<td><h6>Сортировка:</h6></td>
					<td> <select name="sort" class="form-control form-cascade-control">
  <option value="0"></option>
  {$selsorlist}
 </select></td>
				</tr>
			</tbody>
         </table>
		 </div>
<div class="col-lg-12">
 <input type="submit" class="btn btn-primary" value="Найти" />
</div>

</form>
HTML;

echohtmlstart('Список заметок ('.$numRows['cnt'].')');

foreach($sql_ as $row){
	$row['title'] = stripslashes($row['title']);
	$row['date'] = langdate('j M Y в H:i', strtotime($row['date']));

	$users .= <<<HTML
<tr>
<td><a href="/u{$row['owner_user_id']}" target="_blank">{$row['user_name']}</a></td>
<td><a href="?mod=notes&act=edit&id={$row['id']}" title="Комментариев: {$row['comm_num']}">{$row['title']}</a></td>
<td>{$row['date']}</td>
<td><input type="checkbox" name="massaction_note[]" style="float:right;" value="{$row['id']}" /></td>
</tr>
HTML;
}

echo <<<HTML
<script language="text/javascript" type="text/javascript">
function ckeck_uncheck_all() {
    var frm = document.editnotes;
    for (var i=0;i<frm.elements.length;i++) {
        var elmnt = frm.elements[i];
        if (elmnt.type=='checkbox') {
            if(frm.master_box.checked == true){ elmnt.checked=false; }
            else{ elmnt.checked=true; }
        }
    }
    if(frm.master_box.checked == true){ frm.master_box.checked = false; }
    else{ frm.master_box.checked = true; }
}
</script>
<form action="?mod=massaction&act=notes" method="post" name="editnotes">
<div class="table-responsive">
	<div class="col-lg-12">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>Автор</th>
					<th>Заметка</th>
					<th>Дата добавления</th>
					<th><input type="checkbox" name="master_box" title="Выбрать все" onclick="javascript:ckeck_uncheck_all()" style="float:right;"></th>
				</tr>
				</thead>
				<tbody>
					{$users}
			</tbody>
         </table>
		 </div>
	</div>
<div class="col-lg-offset-6 col-lg-5">
<select name="mass_type" class="form-control form-cascade-control">
 <option value="0">- Действие -</option>
 <option value="1">Удалить заметки</option>
 <option value="2">Очистить комментарии</option>
</select></div><div class="col-lg-1">
<input type="submit" value="Выолнить" class="btn btn-primary" />
</div>
</form>
<div class="clr"></div>
HTML;

$query_string = preg_replace("/&page=[0-9]+/i", '', $_SERVER['QUERY_STRING']);

echo navigation($gcount, $numRows['cnt'], '?'.$query_string.'&page=');

htmlclear();

echohtmlend();
?>
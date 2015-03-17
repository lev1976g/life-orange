<?php
/* 
	Appointment: Видео
	File: videos.php
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
	$id = intval($_GET['id']);
	
	//SQL Запрос на вывод информации 
	$row = $db->super_query("SELECT owner_user_id, title, descr, video FROM `".PREFIX."_videos` WHERE id = '".$id."'");
	if($row){
		if(isset($_POST['save'])){
			$title = textFilter($_POST['title'], false, true);
			$descr = textFilter($_POST['descr']);

			if(isset($title) AND !empty($title) AND isset($descr) AND !empty($descr)){
				$db->query("UPDATE `".PREFIX."_videos` SET title = '".$title."', descr = '".$descr."' WHERE id = '".$id."'");
				
				//Чистим кеш
				mozg_mass_clear_cache_file("user_{$row['owner_user_id']}/page_videos_user|user_{$row['owner_user_id']}/page_videos_user_friends|user_{$row['owner_user_id']}/page_videos_user_all|user_{$row['owner_user_id']}/videos_num_all|user_{$row['owner_user_id']}/videos_num_friends");
					
				msgbox('Информация', 'Видеозапись успешно отредактирована', '?mod=videos');
			} else
				msgbox('Ошибка', 'Заполните все поля', '?mod=videos&act=edit&id='.$id);
		} else {
			$row['title'] = stripslashes($row['title']);
			$row['descr'] = stripslashes(myBrRn($row['descr']));
			$row['video'] = stripslashes(myBrRn($row['video']));

			echoheader();
			echohtmlstart();
			
			echo <<<HTML

<form action="" method="POST" role="form">

<input type="hidden" name="mod" value="notes" />
 <div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Редактирование видео</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Название:</h6></td>
					<td class="col-lg-4"><input type="text" name="title" class="form-control form-cascade-control" value="{$row['title']}" /></td>
				</tr>
				<tr>
					<td><h6>Описание:</h6></td>
					<td><textarea name="descr" class="form-control form-cascade-control" rows="3">{$row['descr']}</textarea></td>
				</tr>
				<tr>
					<td><h6>Комментарии включены:</h6></td>
					<td><input type="checkbox" name="comments" class="form-control form-cascade-control" {$checked} /></td>
				</tr>
				<tr>
					<td><h6>Удалить фото:</h6></td>
					<td><input type="checkbox" name="del_photo" class="form-control form-cascade-control" /></td>
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
		msgbox('Ошибка', 'Видео не найдено', '?mod=videos');
		
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
	else if($sort == 2) $order_sql = "`add_date` ASC";
	else if($sort == 3) $order_sql = "`views` DESC";
	else if($sort == 4) $order_sql = "`comm_num` DESC";
	else $order_sql = "`add_date` DESC";
} else
	$order_sql = "`add_date` DESC";
	
//Выводим список людей
if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
$gcount = 20;
$limit_page = ($page-1)*$gcount;

$sql_ = $db->super_query("SELECT tb1.id, title, comm_num, add_date, owner_user_id, views, tb2.user_name FROM `".PREFIX."_videos` tb1, `".PREFIX."_users` tb2 WHERE tb1.owner_user_id = tb2.user_id {$where_sql} ORDER by {$order_sql} LIMIT {$limit_page}, {$gcount}", 1);

//Кол-во людей считаем
$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_videos` WHERE id != '' {$where_sql}");

$selsorlist = installationSelected($sort, '<option value="1">по алфавиту</option><option value="2">по дате добавления</option><option value="3">по количеству просмотров</option><option value="4">по количеству комментариев</option>');

echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Видео</li>
</ol>

<form action="controlpanel.php" method="GET" role="form">
<input type="hidden" name="mod" value="videos" />
 <div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Видео</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Поиск по ID видео:</h6></td>
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

echohtmlstart('Список видео ('.$numRows['cnt'].')');

foreach($sql_ as $row){
	$row['title'] = stripslashes($row['title']);
	$row['add_date'] = langdate('j M Y в H:i', strtotime($row['add_date']));

	$users .= <<<HTML
		<tr>
		<td><a href="/u{$row['owner_user_id']}" target="_blank">{$row['user_name']}</a></td>
		<td><a href="?mod=videos&act=edit&id={$row['id']}" title="Комментариев: {$row['comm_num']}">{$row['title']}</a></td>
		<td>{$row['views']}</td>
		<td>{$row['add_date']}</td>
		<td><input type="checkbox" name="massaction_list[]" style="float:right;" value="{$row['id']}" /></td>
</tr>
HTML;
}

echo <<<HTML
<script language="text/javascript" type="text/javascript">
function ckeck_uncheck_all() {
    var frm = document.edit;
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
<form action="?mod=massaction&act=videos" method="post" name="edit">
	<div class="table-responsive">
	<div class="col-lg-12">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>Добавил</th>
					<th>Название</th>
					<th>Просмотров</th>
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
 <option value="1">Удалить видеозаписи</option>
 <option value="2">Очистить комментарии</option>
 <option value="3">Очистить просмотры</option>
</select></div><div class="col-lg-1">
<input type="submit" value="Выполнить" class="btn btn-primary" />
</div>
</form>
<div class="clr"></div>
HTML;

$query_string = preg_replace("/&page=[0-9]+/i", '', $_SERVER['QUERY_STRING']);
echo navigation($gcount, $numRows['cnt'], '?'.$query_string.'&page=');

htmlclear();
echohtmlend();
?>
<?php
/* 
	Appointment: Музыка
	File: musics.php
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
	$row = $db->super_query("SELECT auser_id, artist, name FROM `".PREFIX."_audio` WHERE aid = '".$id."'");
	if($row){
		if(isset($_POST['save'])){
			$artist = textFilter($_POST['artist'], false, true);
			$name = textFilter($_POST['name'], false, true);

			if(isset($artist) AND !empty($artist) AND isset($name) AND !empty($name)){
				$db->query("UPDATE `".PREFIX."_audio` SET artist = '".$artist."', name = '".$name."' WHERE aid = '".$id."'");
				
				mozg_clear_cache_file('user_'.$row['auser_id'].'/audios_profile');
				
				msgbox('Информация', 'Аудиозапись успешно отредактирована', '?mod=musics');
			} else
				msgbox('Ошибка', 'Заполните все поля', '?mod=musics&act=edit&id='.$aid);
		} else {
			$row['artist'] = stripslashes($row['artist']);
			$row['name'] = stripslashes($row['name']);

			echoheader();
			echohtmlstart();
			
			echo <<<HTML


<form action="" method="POST" role="form">

<input type="hidden" name="mod" value="notes" />
<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Редактирование аудиозаписи</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Исполнитель:</h6></td>
					<td class="col-lg-4"><input type="text" name="artist" class="form-control form-cascade-control" value="{$row['artist']}" /></td>
				</tr>
				<tr>
					<td><h6>Название:</h6></td>
					<td><input type="text" name="name" class="form-control form-cascade-control" value="{$row['name']}" /></td>
				</tr>

			</tbody>
         </table>
		 </div>

<input type="hidden" name="mod" value="notes" />

 <input type="submit" value="Сохранить" class="inp" name="save" style="margin-top:0px" />
 <input type="submit" value="Назад" class="inp" style="margin-top:0px" onClick="history.go(-1); return false" />

</form>
HTML;
			echohtmlend();
		}
	} else
		msgbox('Ошибка', 'Аудиозапись не найдена', '?mod=musics');
		
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
	if($se_uid) $where_sql .= "AND aid = '".$se_uid."' ";
	if($se_user_id) $where_sql .= "AND auser_id = '".$se_user_id."' ";
	$query = strtr($se_name, array(' ' => '%')); //Замеянем пробелы на проценты чтоб тоиск был точнее
	if($se_name) $where_sql .= "AND name LIKE '%".$query."%' ";
	if($sort == 1) $order_sql = "`artist` ASC";
	else if($sort == 2) $order_sql = "`adate` ASC";
	else $order_sql = "`adate` DESC";
} else
	$order_sql = "`adate` DESC";
	
//Выводим список людей
if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
$gcount = 20;
$limit_page = ($page-1)*$gcount;

$sql_ = $db->super_query("SELECT tb1.aid, artist, name, adate, auser_id, tb2.user_name FROM `".PREFIX."_audio` tb1, `".PREFIX."_users` tb2 WHERE tb1.auser_id = tb2.user_id {$where_sql} ORDER by {$order_sql} LIMIT {$limit_page}, {$gcount}", 1);

//Кол-во людей считаем
$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_audio` WHERE aid != '' {$where_sql}");

$selsorlist = installationSelected($sort, '<option value="1">по алфавиту</option><option value="2">по дате добавления</option>');

echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Музыка</li>
</ol>

<form action="controlpanel.php" method="GET" role="form">

<input type="hidden" name="mod" value="musics" />

<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Музыка</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Поиск по ID аудиозаписи:</h6></td>
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

echohtmlstart('Список аудиозаписей ('.$numRows['cnt'].')');

foreach($sql_ as $row){
	$row['artist'] = stripslashes($row['artist']);
	$row['name'] = stripslashes($row['name']);
	$row['adate'] = langdate('j M Y в H:i', $row['adate']);

	$users .= <<<HTML
<tr>
					<td><a href="/u{$row['auser_id']}" target="_blank">{$row['user_name']}</a></td>
					<td><a href="?mod=musics&act=edit&id={$row['aid']}">{$row['artist']} – &nbsp;{$row['name']}</a></td>
					<td>{$row['adate']}</td>
					<td><input type="checkbox" name="massaction_list[]" style="float:right;" value="{$row['aid']}" /></td>
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
<form action="?mod=massaction&act=musics" method="post" name="edit">
	<div class="table-responsive">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>Добавил</th>
					<th>Название</th>
					<th>Дата добавления</th>
					<th><input type="checkbox" name="master_box" title="Выбрать все" onclick="javascript:ckeck_uncheck_all()" style="float:right;"></th>
				</tr>
            </thead>
            <tbody>
			
			{$users}

			</tbody>
         </table>
	</div>
<div class="col-lg-offset-6 col-lg-5">
<select name="mass_type" class="form-control form-cascade-control">

 <option value="0">- Действие -</option>
 <option value="1">Удалить аудиозаписи</option>
</select></select></div><div class="col-lg-1">
<input type="submit" value="Выполнить" class="btn btn-primary" />
</div>
</form>

HTML;

$query_string = preg_replace("/&page=[0-9]+/i", '', $_SERVER['QUERY_STRING']);
echo navigation($gcount, $numRows['cnt'], '?'.$query_string.'&page=');

htmlclear();
echohtmlend();
?>
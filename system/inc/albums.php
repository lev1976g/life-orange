<?php
/* 
	Appointment: Альбомы
	File: albums.php
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

echoheader();	

$se_uid = intval($_GET['se_uid']);
if(!$se_uid) $se_uid = '';

$se_user_id = intval($_GET['se_user_id']);
if(!$se_user_id) $se_user_id = '';

$se_name = textFilter($_GET['se_name'], false, true);

if($se_uid OR $sort OR $se_name OR $se_user_id){
	if($se_uid) $where_sql .= "AND aid = '".$se_uid."' ";
	if($se_user_id) $where_sql_2 .= "AND tb1.user_id = '".$se_user_id."' ";
	$query = strtr($se_name, array(' ' => '%')); //Замеянем пробелы на проценты чтоб тоиск был точнее
	if($se_name) $where_sql .= "AND name LIKE '%".$query."%' ";
}

//Выводим список людей
if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
$gcount = 20;
$limit_page = ($page-1)*$gcount;

$sql_ = $db->super_query("SELECT tb1.user_id, name, adate, aid, photo_num, comm_num, tb2.user_name FROM `".PREFIX."_albums` tb1, `".PREFIX."_users` tb2 WHERE tb1.user_id = tb2.user_id {$where_sql} {$where_sql_2} ORDER by `adate` DESC LIMIT {$limit_page}, {$gcount}", 1);

//Кол-во людей считаем
$where_sql_2 = str_replace('tb1.', '', $where_sql_2);
$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_albums` WHERE aid != '' {$where_sql} {$where_sql_2}");

echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Альбомы</li>
</ol>
<form action="controlpanel.php" method="GET" role="form">

 <div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Альбомы</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Поиск по ID альбома:</h6></td>
					<td class="col-lg-4"><input type="text" name="se_uid" class="form-control form-cascade-control" value="{$se_uid}" /></td>
				</tr>
				<tr>
					<td><h6>Поиск по названию:</h6></td>
					<td><input type="text" name="se_name" class="form-control form-cascade-control" value="{$se_name}" /></td>
				</tr>
				<tr>
					<td><h6>Поиск по ID создателя:</h6></td>
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

echohtmlstart('Список альбомов ('.$numRows['cnt'].')');

foreach($sql_ as $row){
	$row['name'] = stripslashes($row['name']);
	$row['adate'] = langdate('j M Y в H:i', strtotime($row['adate']));
	$users .= <<<HTML
	<tr>
<td><a href="/u{$row['user_id']}" target="_blank">{$row['user_name']}</a></td>
<td title="Комментариев: {$row['comm_num']}, Фотографий: {$row['photo_num']}"><a href="/albums/view/{$row['aid']}" target="_blank">{$row['name']}</a></td>
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
<form action="?mod=massaction&act=albums" method="post" name="edit">
	<div class="table-responsive">
	<div class="col-lg-12">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>Владелец</th>
					<th>Название</th>
					<th>Дата создания</th>
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
 <option value="1">Удалить альбомы</option>
 <option value="2">Удалить фотографии из альбома</option>
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
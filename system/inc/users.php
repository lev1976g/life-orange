<?php
/* 
	Appointment: Пользователи
	File: users.php
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

$sort = intval($_GET['sort']);
$se_name = textFilter($_GET['se_name'], false, true);
$se_email = textFilter($_GET['se_email'], false, true);
$ban = $_GET['ban'];
$delet = $_GET['delet'];

if($se_uid OR $sort OR $se_name OR $se_email OR $ban OR $delet OR $_GET['regdate']){
	$where_sql .= "WHERE user_email != ''";
	if($se_uid) $where_sql .= "AND user_id = '".$se_uid."' ";
	if($se_name) $where_sql .= "AND user_search_pref LIKE '%".$se_name."%' ";
	if($se_email) $where_sql .= "AND user_email LIKE '%".$se_email."%' ";
	if($ban){$where_sql .= "AND user_ban = 1 ";$checked_ban = "checked";}
	if($delet){$where_sql .= "AND user_delet = 1 ";$checked_delet = "checked";}
	if($sort == 1) $order_sql = "`user_search_pref` ASC";
	else if($sort == 2) $order_sql = "`user_reg_date` ASC";
	else if($sort == 3) $order_sql = "`user_last_visit` DESC";
	else $order_sql = "`user_reg_date` DESC";
} else
	$order_sql = "`user_reg_date` DESC";
	
$selsorlist = installationSelected($sort, '<option value="1">по алфавиту</option><option value="2">по дате регистрации</option><option value="3">по дате посещения</option>');

//Выводим список людей
if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
$gcount = 20;
$limit_page = ($page-1)*$gcount;

$sql_ = $db->super_query("SELECT user_group, user_search_pref, user_id, user_reg_date, user_last_visit, user_email, user_delet, user_ban, user_balance FROM `".PREFIX."_users`  {$where_sql} ORDER by {$order_sql} LIMIT {$limit_page}, {$gcount}", 1);

//Кол-во людей считаем
$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users` {$where_sql}");

echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Пользователи</li>
</ol>
<form action="controlpanel.php" method="GET">

<input type="hidden" name="mod" value="users" />
<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Пользователи</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Поиск по ID:</h6></td>
					<td class="col-lg-4"><input type="text" name="se_uid" class="form-control form-cascade-control" value="{$se_uid}" /></td>
				</tr>
				<tr>
					<td><h6>Поиск по имени:</h6></td>
					<td><input type="text" name="se_name" class="form-control form-cascade-control" value="{$se_name}" /></td>
				</tr>
				<tr>
					<td><h6>Поиск по email:</h6></td>
					<td><input type="text" name="se_email" class="form-control form-cascade-control" value="{$se_email}" /></td>
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
</form>
HTML;

echohtmlstart('Список пользователей ('.$numRows['cnt'].')');

foreach($sql_ as $row){
	$format_reg_date = date('Y-m-d', $row['user_reg_date']);
	$lastvisit = date('Y-m-d', $row['user_last_visit']);
	
	$row['user_reg_date'] = langdate('j M Y в H:i', $row['user_reg_date']);
	$row['user_last_visit'] = langdate('j M Y в H:i', $row['user_last_visit']);

	if($row['user_delet']) 
		$color = 'color:red';
	else if($row['user_ban'])
		$color = 'color:blue';
	else if($row['user_group'] == 4)
		$color = 'color:green';
	else
		$color = '';
	
	$users .= <<<HTML
	<tr>
<td title="Баланс: {$row['user_balance']} голосов"><a href="/u{$row['user_id']}" target="_blank" style="{$color}">{$row['user_search_pref']}</a></td>
<td>{$row['user_reg_date']}</td>
<td>{$row['user_last_visit']}</td>
<td>{$row['user_email']}</td>
<td><input type="checkbox" name="massaction_users[]" style="float:right;" value="{$row['user_id']}" /></td>

HTML;
}

echo <<<HTML
<script language="text/javascript" type="text/javascript">
function ckeck_uncheck_all() {
    var frm = document.editusers;
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
<form action="?mod=massaction&act=users" method="post" name="editusers">
	<div class="table-responsive">
	<div class="col-lg-12">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>Пользователь</th>
					<th>Дата регистрации</th>
					<th>Дата посещения</th>
					<th>E-mail</th>
					<th><input type="checkbox" name="master_box" title="Выбрать все" onclick="javascript:ckeck_uncheck_all()" style="float:right;"></th>
				</tr>
				</thead>
				<tbody>
					{$users}
			</tbody>
         </table>
		 </div>
	</div>
<div class="col-lg-4">
<div class="alert alert-danger">Удаленные пользователи помечены красным цветом</div>
</div><div class="col-lg-4">
<div class="alert alert-info">Забаненые пользователи помечены синим цветом</div></div>
 <div class="col-lg-4">
 <div class="alert alert-success">
Агенты поддержки помечены зеленым цветом
</div></div>
<div class="col-lg-offset-6 col-lg-5">
<select name="mass_type" class="form-control">
 <option value="0">- Действие -</option>
 <option value="1">Удалить пользователей</option>
 <option value="2">Заблокировать пользователей</option>
 <option value="3">Удалить отправленные сообщения</option>
 <option value="4">Удалить оставленные комментарии к фото</option>
 <option value="5">Удалить оставленные комментарии к видео</option>
 <option value="11">Удалить оставленные комментарии к заметкам</option>
 <option value="6">Удалить оставленные записи на стенах</option>
 <option value="18">Удалить заметки пользователя</option>
 <option value="19">Удалить видеозаписи пользователя</option>
 <option value="20">Удалить аудиозаписи пользователя</option>
 <option value="21">Удалить сообщества пользователя</option>
 <option value="22">Удалить документы пользователя</option>
 <option value="7">Воостановить пользователей</option>
 <option value="9">Разблокировать пользователей</option>
 <option value="12">Начислить голосов</option>
 <option value="13">Забрать голоса</option>
 <option value="16">Перевести в группу "Техподдержка"</option>
 <option value="17">Перевести в группу "Пользователи"</option>
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
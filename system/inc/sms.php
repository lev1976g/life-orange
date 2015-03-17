<?php
/* 
	Appointment: Отчеты по SMS
	File: sms.php
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

$uid = intval($_GET['id']);
if($uid <= 0) $uid = '';

if($uid){
	$sql_where = "AND tb1.user_id = '{$uid}'";
	$sql_where_a = "WHERE  user_id = '{$uid}'";
}

if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
$gcount = 20;
$limit_page = ($page-1)*$gcount;

$sql_ = $db->super_query("SELECT tb1.user_id, from_u, abonent_cost, date, tb2.user_search_pref, balance_rub FROM `".PREFIX."_sms_log` tb1, `".PREFIX."_users` tb2 WHERE tb1.user_id = tb2.user_id {$sql_where} ORDER by `date` LIMIT {$limit_page}, {$gcount}", 1);
	
$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_sms_log` {$sql_where_a}");

if($sql_){

	foreach($sql_ as $row){
		
		$row['date'] = langdate('j F Y', strtotime($row['date']));
		
		$res .= <<<HTML
<tr>
<td><a href="/u{$row['user_id']}" target="_blank">{$row['user_search_pref']}</a></td>
<td>{$row['from_u']}</td>
<td>{$row['abonent_cost']}</td>
<td>{$row['balance_rub']}</td>
<td>{$row['date']}</td>
</tr>
HTML;

	}

} else
	$res = '<div class="alert alert-info">Пока что нет смс</div>';

	
echoheader();

echo <<<HTML
<div class="row">
<div class="col-lg-6">
<h2>Поиск по ID пользователя:</h2> <input type="text" id="uid" class="form-control form-cascade-control" value="{$uid}" />
<br>
<input type="submit" class="btn btn-primary" onClick="window.location.href = '?mod=sms&id='+document.getElementById('uid').value" />
</div>
</div>
HTML;

echohtmlstart('Отчеты по SMS ('.$numRows['cnt'].')');

echo <<<HTML
<div class="table-responsive">
	<div class="col-lg-12">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>Пользователь</th>
					<th>Номер</th>
					<th>Сумма</th>
					<th>Общий баланс</th>
					<th>Дата</th>
				</tr>
				</thead>
				<tbody>
					{$res}
			</tbody>
         </table>
		 </div>
	</div>

HTML;

$query_string = preg_replace("/&page=[0-9]+/i", '', $_SERVER['QUERY_STRING']);
echo navigation($gcount, $numRows['cnt'], '?'.$query_string.'&page=');

echohtmlend();
?>
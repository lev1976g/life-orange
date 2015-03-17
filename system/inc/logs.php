<?php
/* 
	Appointment: Логи посещений
	File: logs.php
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

echoheader();

$ip = $db->safesql(strip_tags($_GET['ip']));
$browser_get = $db->safesql(strip_tags($_GET['browser']));
$uid = intval($_GET['id']);
if(!$uid) $uid = '';

if($ip){
	$where_sql .= "AND tb1.ip = '".$ip."' ";
	$pref .= 'IP '.$ip;
}

if($uid){
	$where_sql .= "AND tb1.uid = '".$uid."' ";
}

if($browser_get){
	$where_sql .= "AND tb1.browser LIKE '%".$browser_get."%' ";
	$pref .= ', Браузер: '.$browser_get;
}

if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
$gcount = 20;
$limit_page = ($page-1)*$gcount;

$sql_ = $db->super_query("SELECT tb1.*, tb2.user_search_pref, user_last_visit FROM `".PREFIX."_log` tb1, `".PREFIX."_users` tb2 WHERE tb1.uid = tb2.user_id {$where_sql} ORDER by `uid` DESC LIMIT {$limit_page}, {$gcount}", 1);

$where_sql = str_replace('tb1.', '', $where_sql);
$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_log` WHERE ip != '' {$where_sql}");

foreach($sql_ as $row){
	$row['user_last_visit'] = langdate('j F Y в H:i', $row['user_last_visit']);
	
	//Chrome
	if(stripos($row['browser'], 'Chrome') !== false){
		$browser = explode('Chrom', $row['browser']);
		$browser2 = explode(' ', 'Chrom'.str_replace('/', ' ', $browser[1]));
		$browser[0] = $browser2[0].' '.$browser2[1];
	//Opera
	} elseif(stripos($row['browser'], 'Opera') !== false){
		$browser2 = explode('/', $row['browser']);
		$browser3 = end(explode('/', $row['browser']));
		$browser[0] = $browser2[0].' '.$browser3;
	//Firefox
	} elseif(stripos($row['browser'], 'Firefox') !== false){
		$browser3 = end(explode('/', $row['browser']));
		$browser[0] = 'Firefox '.$browser3;
	//Safari
	} elseif(stripos($row['browser'], 'Safari') !== false){
		$browser3 = end(explode('Version/', $row['browser']));
		$browser4 = explode(' ', $browser3);
		$browser[0] = 'Safari '.$browser4[0];
	}
	
	$users .= <<<HTML
	<tr>
		<td><a href="/u{$row['uid']}" target="_blank">{$row['user_search_pref']}</a></td>
		<td><a href="?mod=logs&ip={$row['ip']}">{$row['ip']}</a></td>
		<td>{$row['user_last_visit']}</td>
		<td><a href="?mod=logs&browser={$row['browser']}" title="{$row['browser']}">{$browser[0]}</a></td>
	</tr>
HTML;

}

echohtmlstart();

echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Логи посещений</li>
</ol>
	<h2 class="page-header">Логи посещений</h2>
<div class="form-group">
    <label>Поиск по ID пользователя:</label>
       <input type="text" id="uid" class="form-control form-cascade-control" value="{$uid}" />
</div>

<input type="submit" class="btn btn-primary" onClick="window.location.href = '?mod=logs&id='+document.getElementById('uid').value" />
<div class="table-responsive">
	<div class="col-lg-12">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>Пользователь</th>
					<th>IP</th>
					<th>Дата посещения</th>
					<th>Дата Браузер</th>
				</tr>
				</thead>
				<tbody>
					{$users}
			</tbody>
         </table>
		 </div>
	</div>

HTML;

$query_string = preg_replace("/&page=[0-9]+/i", '', $_SERVER['QUERY_STRING']);

echo navigation($gcount, $numRows['cnt'], '?'.$query_string.'&page=');

echohtmlend();
?>
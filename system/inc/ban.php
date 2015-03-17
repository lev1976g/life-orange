<?php
/* 
	Appointment: Фильтр по: IP, E-Mail
	File: ban.php
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

//Если добавляем
if(isset($_POST['save'])){
	$ban_date = intval($_POST['days']);
	$this_time = $ban_date ? $server_time + ($ban_date * 60 * 60 * 24) : 0;
	if($this_time) $always = 1; else $always = 0;
	if(isset($_POST['ip'])) $ip = $db->safesql(htmlspecialchars(strip_tags(trim($_POST['ip'])))); else $ip = "";
	$descr = textFilter($_POST['descr']);
	
	if($ip){
		$row = $db->super_query("SELECT id FROM `".PREFIX."_banned` WHERE ip ='".$ip."'");
		if($row){
			msgbox('Ошибка', '<div class="alert alert-info">Этот IP уже добавлен под фильтр</div>', '?mod=ban');
		} else {
			$db->query("INSERT INTO `".PREFIX."_banned` SET descr = '".$descr."', date = '".$this_time."', always = '".$always."', ip = '".$ip."'");
			@unlink(ENGINE_DIR.'/cache/system/banned.php');
			header("Location: ?mod=ban");
		}
	} else
		msgbox('Ошибка', '<div class="alert alert-info">Укажите IP который нужно добавить под фильтр</div>', 'javascript:history.go(-1)');
} else {
	echoheader();
	
	//Разблокировка
	if($_GET['act'] == 'unban'){
		$id = intval($_GET['id']);
		$db->query("DELETE FROM `".PREFIX."_banned` WHERE id = '".$id."'");
		@unlink(ENGINE_DIR.'/cache/system/banned.php');
		header("Location: ?mod=ban");
	}
	
	echohtmlstart();
	echo <<<HTML
	<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Фильтр по IP</li>
</ol>
	<h2 class="page-header">Фильтр по IP</h2>
<div class="alert alert-info">
 Вы можете воспользоваться данным разделом, чтобы заблокировать определенные IP адреса. При входе IP адреса, то доступ на сайт данному IP или подсети закрывается полностью, а не только для регистрации.
               
</div>
<div class="alert alert-warning">
<strong>Примечание:</strong>вы можете воспользоваться в фильтре символом звездочки * для подстановки в IP адрес или электронный адрес (например: 127.0.*.*).
</div>

<form method="POST" action="" role="form">
<div class="form-group">
    <label>IP:</label>
       <input type="text" name="ip" class="form-control form-cascade-control" value="{$row['user_email']}" />
</div>
<div class="form-group">
    <label>Количество дней блокировки:<br /><small><b>0</b> неограничен по времени.</small></label>
       <input type="text" name="days" class="form-control form-cascade-control" value="{$row['user_name']}" />
</div>
<div class="form-group">
    <label>Причина блокировки:</label>
       <textarea class="form-control form-cascade-control" rows="3" name="descr"></textarea>
</div>
<input type="submit" value="Сохранить" name="save" class="btn btn-primary" />

</form>
HTML;

	echohtmlstart('Список заблокированных IP адресов');
	
	$sql_ = $db->super_query("SELECT id, descr, date, ip FROM `".PREFIX."_banned` ORDER by `id` DESC", 1);
	if($sql_){
		foreach($sql_ as $row){
			if($row['date'])
				$row['date'] = langdate('j F Y в H:i', $row['date']);
			else
				$row['date'] = 'Неограниченно';
				
			$row['descr'] = stripslashes($row['descr']);
			$short = substr(strip_tags($row['descr']), 0, 50).'..';
			$row['descr'] = myBrRn($row['descr']);
			
			$banList .= <<<HTML
<tr>
	<td>{$row['ip']}</td>
	<td>{$row['date']}</td>
	<td title="{$row['descr']}">{$short}</td>
	<td><a href="?mod=ban&act=unban&id={$row['id']}">Разблокировать</a></td>
</tr>
HTML;
		}
	} else
		$banList = '<div class="alert alert-warning"><strong>Список пуст</strong></div>';
		
	echo <<<HTML
<div class="table-responsive">
	<div class="col-lg-12">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>IP</th>
					<th>Срок окончания бана</th>
					<th>Причина бана</th>
					<th>Действие</th>
					</tr>
				</thead>
				<tbody>
					{$banList}
			</tbody>
         </table>
		 </div>
	</div>

HTML;

	echohtmlend();
}
?>
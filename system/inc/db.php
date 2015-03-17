<?php
/* 
	Appointment: Управление БД
	File: db.php
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

if(isset($_POST['action']) AND count($_REQUEST['ta'])){
	$arr = $_REQUEST['ta'];
	reset($arr);
	
	$tables = "";
	
	while(list($key, $val) = each($arr)){
		$tables .= ", `" . $db->safesql( $val ) . "`";
	}
	
	$tables = substr($tables, 1);
	
	if($_REQUEST['whattodo'] == "optimize"){
		$query = "OPTIMIZE TABLE  ";
	} else {
		$query = "REPAIR TABLE ";
	}
	$query .= $tables;
	
	$db->query($query);
	
	msgbox('Информация', '<div class="alert alert-info">Выбранное действие успешно выполнено</div>', '?mod=db');
		
	exit;
}

echoheader();
echohtmlstart();

echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">База Данных</li>
</ol>
<script type="text/javascript" src="/system/inc/js/jquery.js"></script>
<script type="text/javascript">
function save(){
	var rndval = new Date().getTime(); 
	$("#progress").html("<iframe width='99%' height='220' src='/controlpanel.php?mod=dumper&action=backup&comp_method=" + $("#comp_method").val() + "&rndval=" + rndval + "' frameborder='0' marginwidth='0' marginheight='0' scrolling='no'></iframe>");
}
function dbload(){
	var rndval = new Date().getTime(); 
	$("#progress2").html("<iframe width='99%' height='220' src='/controlpanel.php?mod=dumper&action=restore&file=" + $("#file").val() + "&rndval=" + rndval + "' frameborder='0' marginwidth='0' marginheight='0' scrolling='no'></iframe>");
}
</script>
<h1>Сохранение резервной копии</h1>
<div class="row">
<div class="col-lg-6">
Выберете метод сжатия базы данных: <select name="comp_method" id="comp_method" class="form-control form-cascade-control"><OPTION VALUE='1'>GZip<OPTION VALUE='0' SELECTED>Без сжатия</select>
<br>
<input type="submit" value="Сохранить" name="saveconf" class="btn btn-primary" onClick="save(); return false;" />
<div id="progress"></div></div></div>
HTML;

echohtmlstart('Загрузка резервной копии с диска');

function fn_select($items, $selected){
	$select = '';
	foreach ($items as $key => $value){
		$select .= $key == $selected ? "<OPTION VALUE='{$key}' SELECTED>{$value}" : "<OPTION VALUE='{$key}'>{$value}";
	}
	return $select;
}

define('PATH', 'backup/');

function file_select(){
	$files = array('');
	if(is_dir(PATH) AND $handle = opendir(PATH)){
		while(false !== ($file = readdir($handle))){
			if(preg_match("/^.+?\.sql(\.(gz|bz2))?$/", $file)){
				$files[$file] = $file;
			}
		}
		closedir($handle);
	}
	return $files;
}

$files = fn_select(file_select(), '');

echo <<<HTML
<div class="row">
<div class="col-lg-6">
Выберите резервную копию базы данных: <select name="file" id="file" class="form-control form-cascade-control">{$files}</select>
<br>
<input type="submit" value="Воостановить БД" name="saveconf" class="btn btn-primary" onClick="dbload(); return false;" />
<div id="progress2"></div></div></div>
HTML;

echohtmlstart('Настройка и оптимизация базы данных');

$tabellen = "";
$db->query("SHOW TABLES");
while($row = $db->get_array()){

	$titel = $row[0];
	
	if(substr($titel, 0, strlen(PREFIX)) == PREFIX){
		$tabellen .= "<option value=\"$titel\" selected>$titel</option>\n";
	}

}
$db->free();

echo <<<HTML
<form method="POST" action="">
<div class="col-lg-4">
<select name="ta[]" class="form-control form-cascade-control" size="8" multiple="multiple">{$tabellen}</select> 
</div>
<div class="col-lg-8">
<div class="radio">
                      
<input type="radio" name="whattodo" id="optionsRadios1" value="optimize" checked /><b>Оптимизация базы данных</b><br />
Вы можете произвести оптимизацию базы данных, тем самым будет сэкономлено немного места на диске, а также ускорена работа базы данных. Рекомендуется использовать данную функцию минимум один раз в неделю.
<br />
<input type="radio" name="whattodo" style="margin-right:5px" /><b>Ремонт базы данных</b><br />
При неожиданной остановке MySQL сервера, во время выполнения каких-либо действий, может произойти повреждение структуры таблиц, использование этой функции поможет решить вам эту проблему.
</div>
        
		  </div>
<input type="submit" value="Выолнить действие" name="action" class="btn btn-primary" />
</form>
HTML;

echohtmlend();
?>
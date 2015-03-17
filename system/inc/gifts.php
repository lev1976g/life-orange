<?php
/* 
	Appointment: Подарки
	File: gifts.php
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

//Если нажали "Добавить"
if(isset($_POST['save'])){
	$price = intval($_POST['price']);
	
	//Разришенные форматы
	$allowed_files = array('jpg', 'png');
	
	//Получаем данные о фотографии ОРИГИНАЛ
	$image_tmp = $_FILES['original']['tmp_name'];
	$image_name = totranslit($_FILES['original']['name']); // оригинальное название для оприделения формата
	$image_size = $_FILES['original']['size']; // размер файла
	$type = end(explode(".", $image_name)); // формат файла

	//Получаем данные о фотографии КОПИЯ
	$image_tmp_2 = $_FILES['thumbnail']['tmp_name'];
	$image_name_2 = totranslit($_FILES['thumbnail']['name']); // оригинальное название для оприделения формата
	$image_size_2 = $_FILES['thumbnail']['size']; // размер файла
	$type_2 = end(explode(".", $image_name_2)); // формат файла

	//Проверям если, формат верный то пропускаем
	if($price){
		if(in_array(strtolower($type), $allowed_files) AND in_array(strtolower($type_2), $allowed_files)){
			if($image_size < 200000){
				if($image_size_2 < 100000){
					$rand_name = $server_time;
					move_uploaded_file($image_tmp, ROOT_DIR.'/uploads/gifts/'.$rand_name.'.'.$type);
					move_uploaded_file($image_tmp_2, ROOT_DIR.'/uploads/gifts/'.$rand_name.'.'.$type_2);
					$db->query("INSERT INTO `".PREFIX."_gifts_list` SET img = '".$rand_name."', price = '".$price."'");
					msgbox('Информация', '<div class="alert alert-info">Подарок успешно добавлен</div>', '?mod=gifts');
				} else
					msgbox('Ошибка', '<div class="alert alert-info">Уменьшеная копия привышает допустимый размер 100 кб</div>', 'javascript:history.go(-1)');
			} else
				msgbox('Ошибка', '<div class="alert alert-info">Оригинал привышает допустимый размер 200 кб</div>', 'javascript:history.go(-1)');
		} else
			msgbox('Ошибка', '<div class="alert alert-info">Неправильный формат</div>', 'javascript:history.go(-1)');
	} else
		msgbox('Ошибка', '<div class="alert alert-info">Укажите цену подарка</div>', 'javascript:history.go(-1)');
	
	die();
}

//Удаление
if($_GET['act'] == 'del'){
	$id = intval($_GET['id']);
	$row = $db->super_query("SELECT img FROM `".PREFIX."_gifts_list` WHERE gid = '".$id."'");
	if($row){
		$db->query("DELETE FROM `".PREFIX."_gifts_list` WHERE gid = '".$id."'");
		@unlink(ROOT_DIR."/uploads/gifts/".$row['img'].'.jpg');
		@unlink(ROOT_DIR."/uploads/gifts/".$row['img'].'.png');
		header('Location: ?mod=gifts');
	}
}

//Сохраняем
if($_GET['act'] == 'edit'){
	$id = intval($_GET['id']);
	$price = intval($_GET['price']);
	if($price <= 0) $price = 1;
	$db->query("UPDATE`".PREFIX."_gifts_list` SET price = '".$price."' WHERE gid = '".$id."'");
	header('Location: ?mod=gifts');
}

echoheader();

$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_gifts_list`");

$sql_ = $db->super_query("SELECT * FROM `".PREFIX."_gifts_list` ORDER by `gid` DESC", 1);
foreach($sql_ as $row){
	$gifts .= <<<HTML
	<tr>
<td>
<center><img src="/uploads/gifts/{$row['img']}.png" style="margin-bottom:15px" /></center></td>
	<td>Цена: <input type="text" id="price{$row['gid']}" class="inpu" value="{$row['price']}" /><br /></td>
	<td>[ <a href="?mod=gifts" onClick="window.location.href='?mod=gifts&act=edit&id={$row['gid']}&price='+document.getElementById('price{$row['gid']}').value; return false">сохранить</a> ] [ <a href="?mod=gifts&act=del&id={$row['gid']}">удалить</a> ]
</td>
</tr>
HTML;
}

echohtmlstart();
			
echo <<<HTML
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Подарки</li>
</ol>
	<h2 class="page-header">Подарки</h2>
<form action="" enctype="multipart/form-data" method="POST">
<div class="col-lg-12">
                              <input type="hidden" name="mod" value="notes" />
<div class="form-group">
    <label>Цена:</label>
       <input type="text" name="price"  class="form-control form-cascade-control" />
</div>
<div class="form-group">
 <label>Оригинал .JPG, 256x256:</label>
 <input type="file" name="original"/>
</div>
<div class="form-group">
 <label>Уменьшеная копия .PNG, 96x96:</label>
 <input type="file" name="thumbnail"/>
</div>
 <input type="submit" value="Добавить" class="btn btn-primary" name="save" />
                     
</div>

</form>


HTML;

echohtmlstart('Список подарков ('.$numRows['cnt'].')');

echo <<<HTML
<div class="table-responsive">
	<div class="col-lg-12">
 <table class="table table-bordered table-hover table-striped">
			<tbody>
				{$gifts}	
			</tbody>
         </table>
		 </div>
	</div>
<div class="clr"></div>
HTML;

echohtmlend();
?>
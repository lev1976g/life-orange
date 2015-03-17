<?php
/* 
	Appointment: Фильтр слов
	File: wordfilter.php
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

//Добавление слова
if(isset($_POST['send'])){

	$word_find = trim(strip_tags(stripslashes($_POST['word_find'])));
	
	if($word_find == ""){
	
		msgbox('Информация', 'Введите слово', '?mod=wordfilter');
		
	}
	
	$word_replace = textFilter($_POST['word_replace']);
	
	$word_id = $server_time;
	
	$all_items = file(ENGINE_DIR.'/data/wordfilter.db.php');
	foreach($all_items as $item_line){
		$item_arr = explode("|", $item_line);
		if($item_arr[0] == $word_id){
		
			$word_id ++;
			
		}
	}
	
	foreach($all_items as $word_line){
		$word_arr = explode( "|", $word_line);
		if($word_arr[1] == $word_find){
			msgbox('Информация', 'Такое слово уже есть', '?mod=wordfilter');
			exit;
		}
	}
	
	$new_words = fopen(ENGINE_DIR.'/data/wordfilter.db.php', "a");
	$word_find = str_replace("|", "&#124", $word_find);
	$word_replace = str_replace("|", "&#124", $word_replace);

	$word_find = str_replace("$", "&#036;", $word_find);
	$word_find = str_replace("{", "&#123;", $word_find);
	$word_find = str_replace("}", "&#125;", $word_find);

	$word_replace = str_replace("$", "&#036;", $word_replace);
	$word_replace = str_replace("{", "&#123;", $word_replace);
	$word_replace = str_replace("}", "&#125;", $word_replace);
	
	fwrite($new_words, "$word_id|$word_find|$word_replace|".intval($_POST['type'])."|".intval($_POST['register'])."|".intval($_POST['filter_search'])."|".intval( $_POST['filter_action'])."||\n");
	fclose($new_words);
	
	header("Location: ?mod=wordfilter");
	
	exit;
	
}

//Удаление слова
if($_GET['act'] == 'del'){
	
	$word_id = intval($_REQUEST['wid']);
	
	if(!$word_id){
	
		msgbox('Информация', 'Такого слово нет', '?mod=wordfilter');
		
		exit;
	}
	
	$old_words = file(ENGINE_DIR.'/data/wordfilter.db.php');
	$new_words = fopen(ENGINE_DIR.'/data/wordfilter.db.php', "w");
	
	foreach($old_words as $old_words_line){
		$word_arr = explode("|", $old_words_line);
		if($word_arr[0] != $word_id){
			fwrite($new_words, $old_words_line);
		}
	}
	
	fclose($new_words);
	
	header("Location: ?mod=wordfilter");
	
}

echoheader();

echohtmlstart();

echo <<<HTML
<style type="text/css" media="all">
.inpu{width:300px;}
textarea{width:300px;height:100px;}
</style>

<form action="" method="POST">
<div class="row">
<div class="col-lg-12">
<h2>Добавление нового слова в фильтр</h2>
 
 
  <div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Редактирование сообщества</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Введите слово:</h6></td>
					<td class="col-lg-4"> <input type="text" name="word_find" class="form-control form-cascade-control" /></tr>
				<tr>
					<td><h6>Заменить на:</h6><div class="td_br">Если Вы хотите, чтобы слово удалялось оставьте поле "заменить" пустым.</div></td>
					<td> <input type="text" name="word_replace" class="form-control form-cascade-control" /></td>
				</tr>
				<tr>
					<td><h6>Тип замены:</h6></td>
					<td> <select name="type" class="form-control form-cascade-control">
  <option value="0">Любое вхождение</option><option value="1">Точное совпадение слова</option>
 </select></td>
				</tr>
				<tr>
					<td><h6>С учетом регистра:</h6></td>
					<td> <select name="register" class="form-control form-cascade-control">
  <option value="0">Нет</option><option value="1">Да</option>
 </select></td>
				</tr>
			</tbody>
         </table>
		 </div>
  
</div>
</div>
<div class="col-lg-12">
 <input type="submit" value="Сохранить" name="send" class="btn btn-primary" />
</div>

</form>
HTML;

//Список слов
$all_words = file(ENGINE_DIR.'/data/wordfilter.db.php');

$count_words = 0;

usort($all_words, "compare_filter");

foreach($all_words as $word_line){
	
	$word_arr = explode("|", $word_line);
	
	$register = $word_arr[4] ? 'да' : 'нет';
	$type = $word_arr[3] ? 'Точное совпадение' : 'Любое вхождение';
	
	if(!$word_arr[2]) $word_arr[2] = '<font color="red">удалить</font>';
	
	$words .= <<<HTML
<tr>
<td>{$word_arr[1]}</td>
<td>{$word_arr[2]}</td>
<td>{$register}</td>
<td>{$type}</td>
<td>
[ <a href="?mod=wordfilter&act=del&wid={$word_arr[0]}" title="Удалить">удалить</a> ]
</td>
</tr>
HTML;
	
	$count_words++;
	
}

if(!$count_words) $words = '<br /><center><b>Список слов для фильтрации пуст</b></center><br />';

echohtmlstart('Слова');

echo <<<HTML
<div class="table-responsive">
	<div class="col-lg-12">
	    <table class="table table-bordered table-hover table-striped">
            <thead>
				<tr>
					<th>Слово</th>
					<th>Заменить на</th>
					<th>Регистр</th>
					<th>Тип замены</th>
					<th>Управление</th>
				</tr>
				</thead>
				<tbody>
					{$words}
			</tbody>
         </table>
		 </div>
	</div>

HTML;

$query_string = preg_replace("/&page=[0-9]+/i", '', $_SERVER['QUERY_STRING']);
echo navigation($gcount, $numRows['cnt'], '?'.$query_string.'&page=');

htmlclear();
echohtmlend();
?>
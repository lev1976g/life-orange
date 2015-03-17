<?php
/* 
	Appointment: Шаблоны
	File: tpl.php
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
	
header('Content-type: text/html; charset=utf-8');

$act = $_GET['act'];
$allowed_extensions = array("tpl", "css", "js");

switch($act){
	
	//################### Загрузка TPL файла ###################//
	case "loadTpl":
		$temp = strip_data($_POST['temp']);
		$file_include = $_POST['tpl'];
		$file_include = str_replace(array('..', '...', '/../', '//', './', '\..', '\.'), '', $file_include);		
		$temp_dir = ROOT_DIR.'/templates/'.$temp;
		$content = @file_get_contents($temp_dir.'/'.$file_include);
		$format_file = strtolower(end(explode('.', $file_include)));

		if(is_writable($temp_dir.'/'.$file_include) && in_array($format_file, $allowed_extensions) && file_exists($temp_dir.'/'.$file_include))
			echo $content;
		else
			echo '<div class="alert alert-info">Файл шаблона не найден</div>';
			
		die();
	break;

	//################### Открытие папки ###################//
	case "opneFolder":
		$template = strip_data($_POST['template']);
		$folder = strip_data($_POST['folder']);
		
		$files = scandir(ROOT_DIR.'/templates/'.$template.'/'.$folder);
		
		if(is_dir(ROOT_DIR.'/templates/'.$template.'/'.$folder)){
			foreach($files as $file){
				$format_file = strtolower(end(explode('.', $file)));

				if($file != '...' && $file != '..' && $file != '.' && $file != '.htaccess' && in_array($format_file, $allowed_extensions)){
					if($format_file == 'tpl')
						$class = 'tetpl';
					elseif($format_file == 'css')
						$class = 'tecss';
					else
						$class = 'tejs';

					$check_file = count(explode('.', $file))-1;
					
					if($check_file)
						$tpls .= '<div class="'.$class.'" onClick="temp.loadTpl(\''.$template.'\', \''.$folder.'/'.$file.'\'); return false">'.$file.'</div>';
				}
			}
		}

		echo $tpls;
		
		die();
	break;
	
	//################### Сохранение файла ###################//
	case "save":
		$content = convert_unicode($_POST['content'], 'utf-8');
		if(function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()) $content = stripslashes($content);
		$folder = strip_data($_POST['folder']);
		$file_include = $_POST['tpl'];
		$file_include = str_replace(array('..', '...', '/../', '//', './', '\..', '\.'), '', $file_include);
		$temp_dir = ROOT_DIR.'/templates/'.$folder;
		$file_open = $temp_dir.'/'.$file_include;
		$format_file = strtolower(end(explode('.', $file_open)));

		if(is_writable($file_open) && in_array($format_file, $allowed_extensions) && file_exists($file_open)){
			$file = fopen($file_open, "r+");
			file_put_contents($file_open, '');
			fputs($file, $content);
			fclose($file);
			echo '<div class="alert alert-info">Файл шаблона был успешно сохранён!</div>';
		} else
			echo '<div class="alert alert-info">Файл шаблона не найден</div>';
		
		die();
	break;
	
	//################### Главная ###################//
	default:
		echoheader(900);
		
		//Если загружаем другой шаблон
		if(isset($_POST['chahe_skin']))
			$config['temp'] = strip_data($_POST['newtemp']);
		
		echohtmlstart();
		//Чтение всех шаблон в папке "templates"
		$root = ROOT_DIR.'/templates/';
		$root_dir = scandir($root);
		foreach($root_dir as $templates)
			if($templates != '.' && $templates != '..' && $templates != '.htaccess')
				$for_select .= str_replace('value="'.$config['temp'].'"', 'value="'.$config['temp'].'" selected', '<option value="'.$templates.'">'.$templates.'</option>');
	
		echo "
		<ol class=\"breadcrumb\">
    <li class=\"active\">
        <i class=\"fa fa-dashboard\"></i> Панель Управление
    </li>
	<li class=\"active\">Шаблон сайта</li>
</ol>
	<h2 class=\"page-header\">Шаблон сайта</h2>
		<form method=\"POST\" action=\"\">
		<div class=\"row\"><div class=\"col-lg-6\"><label>Выбранный шаблон для редактирования:</label>
		<select name=\"newtemp\" class=\"form-control form-cascade-control\">{$for_select}</select><br>
		<button name=\"chahe_skin\" class=\"btn btn-primary\" >Выполнить</button>
		</div>
		</div>
		</form>";
		htmlclear();
		
		echohtmlstart("Редактирование разделов шаблона: <u>{$config['temp']}</u>");
		$temp_dir = ROOT_DIR.'/templates/'.$config['temp'];
		
		if(is_dir($temp_dir)){

			$files = scandir(ROOT_DIR.'/templates/'.$config['temp']);

			foreach($files as $file){
				$format_file = strtolower(end(explode('.', $file)));

				if($file != '...' && $file != '..' && $file != '.' && $file != '.htaccess' && !str_replace($format_file, '', $file))
					$folders .= ' <a href="#" class="list-group-item" ><i class="fa fa-folder"></i> <div style="posititon:relative;margin-left:20px;margin-top:-20px" onClick="temp.openFolder(\''.$config['temp'].'\', \''.$file.'\'); return false">'.$file.'</div><div id="folder_'.$file.'" style="margin-left:15px;display:none"></div></a>';
					
				if($file != '...' && $file != '..' && $file != '.' && $file != '.htaccess' && in_array($format_file, $allowed_extensions)){
					if($format_file == 'tpl')
						$class = 'tetpl';
					elseif($format_file == 'css')
						$class = 'tecss';
					else
						$class = 'tejs';

					$check_file = count(explode('.', $file))-1;
					
					if($check_file)
						$tpls .= '<a href="#" class="list-group-item"><div class="'.$class.'" onClick="temp.loadTpl(\''.$config['temp'].'\', \''.$file.'\'); return false">'.$file.'</div></a>
						';
				}
			}
			
			echo "<div class=\"row\"><div class=\"col-sm-3\"><div class=\"list-group\">{$folders}{$tpls}</div></div>";
			
			echo <<<HTML
			<style>.list-group-item{padding:7px 15px}</style>
<script type="text/javascript" src="/system/inc/js/jquery.js"></script>
<script type="text/javascript">
var temp = {
	loadTpl: function(folder, tpl){
		$('#loading').fadeIn('fast');
		$.post('/controlpanel.php?mod=tpl&act=loadTpl', {temp: folder, tpl: tpl}, function(data){
			$('#editable').show();
			$('#loadedtpl').text(folder+'/'+tpl);
			$('#result').val(data).scrollTop(0);
			$('#loading').fadeOut('fast');
			
			$('#folder').val(folder);
			$('#tplname').val(tpl);
		});
	},
	save: function(){
		content = $('#result').val();
		folder = $('#folder').val();
		tplname = $('#tplname').val();
		$('#loading').fadeIn('fast');
		$.post('/controlpanel.php?mod=tpl&act=save', {folder: folder, tpl: tplname, content: content}, function(data){
			$('#loading_text').text(data);
			setTimeout('$("#loading").hide();$("#loading_text").text("Загрузка. Пожалуйста, подождите...")', 2000);
		});
	},
	openFolder: function(template, folder){
		$('#loading').fadeIn('fast');
		$.post('/controlpanel.php?mod=tpl&act=opneFolder', {template: template, folder: folder}, function(data){
			$('#loading').fadeOut('fast');
			$('#folder_'+folder).html(data).slideToggle('fast');
		});
	}
}
</script>
HTML;
			
			echo "<div id=\"loading\" style=\"display:none\"><div class=\"col-lg-9\" ><div class=\"alert alert-info\"><div id=\"loading_text\">Загрузка. Пожалуйста, подождите...</div></div></div></div>
			<div class=\"edittable\">
			<div id=\"editable\"  style=\"display:none\">
			<div class=\"col-lg-9\" >
			 <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h3 class=\"panel-title\">Редактирование файла: <b><span id=\"loadedtpl\"></span></b></h3>
                            </div>
                            <div class=\"panel-body\">
                               	<textarea class=\"form-control well\" style=\"posititon:fixed\" rows=\"20\" id=\"result\"></textarea>
			<br><div class=\"button_div fl_l\" style=\"margin-top:-2px\" onClick=\"temp.save(); return false\"><button class=\"btn btn-primary\">Сохранить</button></div>
			<input type=\"hidden\" id=\"folder\" />
			<input type=\"hidden\" id=\"tplname\" />
			</div></div>
                            </div>
           </div> </div>
			</div>
			
			
		";
		
		} else
			echo '<div class="alert alert-info">Шаблон не найден</div>';

		echohtmlend();
}
?>
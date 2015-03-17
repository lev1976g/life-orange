<?php
/* 
	Appointment: Основные функции админ панели
	File: functions.php
	Author: f0rt1 
	Engine: Vii CMS (Social version)
	Copyright: NiceWeb Group (с) 2014
	e-mail: niceweb@i.ua
	URL: http://www.niceweb.in.ua/
	ICQ: 427-825-959
	Данный код защищен авторскими правами
*/
if(!defined('MOZG'))
	die('Hacking attempt!');
	
if(isset($_GET['save'])){
	$notice = $_GET['notice'];
		$db->query("UPDATE `".PREFIX."_notice` SET notice = '".$notice."'");
	}


$user_info= $db->super_query( "SELECT * FROM `".PREFIX."_users`");
$weq= $db->super_query( "SELECT notice FROM " . PREFIX . "_notice" );

	if( $weq['notice'] == "" ) {
		
		$weq['notice'] ="Здесь вы можете сохранять собственные заметки и памятки.";

	} else {
		
		$weq['notice'] = htmlspecialchars( stripslashes( $weq['notice'] ), ENT_QUOTES, $config['charset'] );

	}


function totranslit($var, $lower = true, $punkt = true) {
	global $langtranslit;
	
	if ( is_array($var) ) return "";

	if (!is_array ( $langtranslit ) OR !count( $langtranslit ) ) {

		$langtranslit = array(
		'а' => 'a', 'б' => 'b', 'в' => 'v',
		'г' => 'g', 'д' => 'd', 'е' => 'e',
		'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
		'и' => 'i', 'й' => 'y', 'к' => 'k',
		'л' => 'l', 'м' => 'm', 'н' => 'n',
		'о' => 'o', 'п' => 'p', 'р' => 'r',
		'с' => 's', 'т' => 't', 'у' => 'u',
		'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
		'ь' => '', 'ы' => 'y', 'ъ' => '',
		'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
		"ї" => "yi", "є" => "ye",
		
		'А' => 'A', 'Б' => 'B', 'В' => 'V',
		'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
		'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
		'И' => 'I', 'Й' => 'Y', 'К' => 'K',
		'Л' => 'L', 'М' => 'M', 'Н' => 'N',
		'О' => 'O', 'П' => 'P', 'Р' => 'R',
		'С' => 'S', 'Т' => 'T', 'У' => 'U',
		'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
		'Ь' => '', 'Ы' => 'Y', 'Ъ' => '',
		'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
		"Ї" => "yi", "Є" => "ye",
		);

	}
	
	$var = str_replace( ".php", "", $var );
	$var = trim( strip_tags( $var ) );
	$var = preg_replace( "/\s+/ms", "-", $var );

	$var = strtr($var, $langtranslit);
	
	if ( $punkt ) $var = preg_replace( "/[^a-z0-9\_\-.]+/mi", "", $var );
	else $var = preg_replace( "/[^a-z0-9\_\-]+/mi", "", $var );

	$var = preg_replace( '#[\-]+#i', '-', $var );

	if ( $lower ) $var = strtolower( $var );
	
	if( strlen( $var ) > 200 ) {
		
		$var = substr( $var, 0, 200 );
		
		if( ($temp_max = strrpos( $var, '-' )) ) $var = substr( $var, 0, $temp_max );
	
	}
	
	return $var;
}
function GetVar($v) {
	if(ini_get('magic_quotes_gpc'))
		return stripslashes($v) ;
	return $v;
} 
function strip_data($text) {
	$quotes = array ("\x27", "\x22", "\x60", "\t", "\n", "\r", "'", ",", "/", ";", ":", "@", "[", "]", "{", "}", "=", ")", "(", "*", "&", "^", "%", "$", "<", ">", "?", "!", '"' );
	$goodquotes = array ("-", "+", "#" );
	$repquotes = array ("\-", "\+", "\#" );
	$text = stripslashes( $text );
	$text = trim( strip_tags( $text ) );
	$text = str_replace( $quotes, '', $text );
	$text = str_replace( $goodquotes, $repquotes, $text );
	return $text;
}
function clean_url($url) {
	if( $url == '' ) return;
	
	$url = str_replace( "http://", "", strtolower( $url ) );
	$url = str_replace( "https://", "", $url );
	if( substr( $url, 0, 4 ) == 'www.' ) $url = substr( $url, 4 );
	$url = explode( '/', $url );
	$url = reset( $url );
	$url = explode( ':', $url );
	$url = reset( $url );
	
	return $url;
}

$domain_cookie = explode (".", clean_url( $_SERVER['HTTP_HOST'] ));
$domain_cookie_count = count($domain_cookie);
$domain_allow_count = -2;

if($domain_cookie_count > 2){

	if(in_array($domain_cookie[$domain_cookie_count-2], array('com', 'net', 'org') )) 
		$domain_allow_count = -3;
		
	if($domain_cookie[$domain_cookie_count-1] == 'ua' ) 
		$domain_allow_count = -3;
		
	$domain_cookie = array_slice($domain_cookie, $domain_allow_count);
}

$domain_cookie = ".".implode(".", $domain_cookie);

define('DOMAIN', $domain_cookie);

function set_cookie($name, $value, $expires) {
	
	if( $expires ) {
		
		$expires = time() + ($expires * 86400);
	
	} else {
		
		$expires = FALSE;
	
	}
	
	if( PHP_VERSION < 5.2 ) {
		
		setcookie($name, $value, $expires, "/", DOMAIN . "; HttpOnly");
	
	} else {
		
		setcookie($name, $value, $expires, "/", DOMAIN, NULL, TRUE);
	
	}
}
function check_xss() {
	
	$url = html_entity_decode( urldecode( $_SERVER['QUERY_STRING'] ) );
	
	if( $url ) {
		
		if( (strpos( $url, '<' ) !== false) || (strpos( $url, '>' ) !== false) || (strpos( $url, '"' ) !== false) || (strpos( $url, './' ) !== false) || (strpos( $url, '../' ) !== false) || (strpos( $url, '\'' ) !== false) || (strpos( $url, '.php' ) !== false) ) {
			die('Hacking attempt!');
		}
	
	}
	
	$url = html_entity_decode( urldecode( $_SERVER['REQUEST_URI'] ) );
	
	if( $url ) {
		
		if( (strpos( $url, '<' ) !== false) || (strpos( $url, '>' ) !== false) || (strpos( $url, '"' ) !== false) || (strpos( $url, '\'' ) !== false) ) {
			die('Hacking attempt!');
		}
	
	}

}
function langdate($format, $stamp){
	global $langdate;
	return strtr(@date($format, $stamp), $langdate);
}
function navigation($gc, $num, $type){
	$page = ( isset( $_GET['page'] )&& !empty( $_GET['page'] ) ) ? intval( $_GET['page'] ) : 1;
	$gcount = $gc;
	$cnt = $num;
	$items_count = $cnt;
	$items_per_page = $gcount;
	$page_refers_per_page = 5;
	$pages = '';		
	$pages_count = ( ( $items_count % $items_per_page != 0 ) ) ? floor( $items_count / $items_per_page ) + 1 : floor( $items_count / $items_per_page );
	$start_page = ( $page - $page_refers_per_page <= 0  ) ? 1 : $page - $page_refers_per_page + 1;
	$page_refers_per_page_count = ( ( $page - $page_refers_per_page < 0 ) ? $page : $page_refers_per_page ) + ( ( $page + $page_refers_per_page > $pages_count ) ? ( $pages_count - $page )  :  $page_refers_per_page - 1 );
			
	if($page > 1)
		$pages .= '<a href="'.$type.($page-1).'">&laquo;</a>';
	else
		$pages .= '';
				
	if ( $start_page > 1 ) {
		$pages .= '<a href="'.$type.'1">1</a>';
		$pages .= '<a href="'.$type.( $start_page - 1 ).'">...</a>';
			
	}
					
	for ( $index = -1; ++$index <= $page_refers_per_page_count-1; ) {
		if ( $index + $start_page == $page )
			$pages .= '<span>' . ( $start_page + $index ) . '</span>';
		else 
			$pages .= '<a href="'.$type.($start_page+$index).'">'.($start_page+$index).'</a>';
	} 
			
	if ( $page + $page_refers_per_page <= $pages_count ) { 
		$pages .= '<a href="'.$type.( $start_page + $page_refers_per_page_count ).'">...</a>';
		$pages .= '<a href="'.$type.$pages_count.'">'.$pages_count.'</a>';	
	} 
				
	$resif = $cnt/$gcount;
	if(ceil($resif) == $page)
		$pages .= '';
	else
		$pages .= '<a href="'.$type.($page+1).'">&raquo;</a>';

	if ( $pages_count <= 1 )
		$pages = '';
		
		if($pages)
			return '<div class="nav">'.$pages.'</div>';
}

function echoheader($box_width = false){
	global $config, $logged, $admin_link, $user_info;
     
	 if($user_info['user_photo'] !== " ")

			$photo=$user_info['user_photo'];
			 $ava = $config['home_url'].'uploads/users/'.$user_info['user_id'].'/'.$photo;
     $myphoto_header.='<img src="'.$ava.'" width="30" class="img-circle" />'."\n";
	 
	 
	if($logged AND $user_info['user_group'] == 1)
		$exit_link = '<a href="'.$admin_link.'?act=logout">Выход</a>';
	else
		$exit_link = '';
	
	if(!$box_width) $box_width = 600;
$name2=$user_info['user_name'];
$name3=$user_info['user_lastname'];

	echo <<<HTML

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Панель управления</title>
    <link href="system/inc/style/bootstrap.min.css" rel="stylesheet">
    <link href="system/inc/style/sb-admin.min.css" rel="stylesheet">
    <link href="system/inc/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{$admin_link}">Vii Engine Admin v0.2</a>
            </div>
            <!-- Top Menu Items -->

      <ul class="nav navbar-right top-nav">
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {$myphoto_header}{$name2} {$name3} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                           <a href="/" target="_blank"><i class="fa fa-fw fa-user"></i> Профиль</a>
                        </li>
                        <li>
                            <a href="?mod=mysettings"><i class="fa fa-fw fa-gear"></i> Настройки</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{$admin_link}?act=logout"><i class="fa fa-fw fa-power-off"></i> Выйти</a>
                        </li>
                    </ul>
                </li>
            </ul>	
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{$admin_link}"><i class="fa fa-fw fa-dashboard"></i> Панель управления</a>
                    </li>
					<li>
                        <a href="?mod=system"><i class="fa fa-fw fa-cogs"></i> Настройки системы</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-desktop"></i> Мультимедиа <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="?mod=musics">Музыка</a>
                            </li>
                            <li>
                                <a href="?mod=videos">Видео</a>
                            </li>
							<li>
                                <a href="?mod=albums">Альбомы</a>
                            </li>
                            <li>
                                <a href="?mod=gifts">Подарки</a>
                            </li>
							<li>
                                <a href="?mod=groups">Сообщества</a>
                            </li>
                            <li>
                                <a href="?mod=notes">Заметки</a>
                            </li>
							<li>
                                <a href="?mod=users">Пользователи</a>
                            </li>	
							<li>
                                <a href="?mod=apps">Игры</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-edit"></i> Управ. шаблонами <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="?mod=tpl">Шаблон сайта</a>
                            </li>
                            <li>
                                <a href="?mod=mail_tpl">Шаблон сообщений</a>
                            </li>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-leaf"></i> Утилиты <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                           <li>
							<a href="?mod=antivirus"> Антивирус</a>
							</li>
							  <li>
							<a href="?mod=db"> Управление БД</a>
							</li>
							<li>
							<a href="?mod=ban"> Фильт по IP</a>
							</li>
							<li>
							<a href="?mod=wordfilter"> Фильтр слов</a>
							</li>
							<li>
							<a href="?mod=search"> Поиск и замена</a>
							</li>
							  <li>
                                <a href="?mod=report"> Список жалоб</a>
                            </li>
							<li>
								<a href="?mod=mail"> Рассылка сообщений</a>
							</li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-link"></i> Другие разделы <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                           <li>
							<a href="?mod=country"> Страны</a>
							</li>
							<li>
							<a href="?mod=city"> Города</a>
							</li>
							 <li>
								<a href="?mod=logs"> Логи посещений</a>
							</li>	
							<li>
								<a href="?mod=static"> Статические страницы</a>
							</li>
							<li>
								<a href="?mod=xfields">Доп. поля профиля</a>
							</li>
							<li>
								<a href="?mod=reviews">Отзывы</a>
							</li>
							<li>
								<a href="?mod=sms">Отчеты по смс</a>
							</li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
  </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

              
            
HTML;

}
function echohtmlstart($title){
	echo <<<HTML
<div class="h1" style="margin-top:10px">{$title}</div>
HTML;
}
function echohtmlend(){
	global $admin_link, $logged;
	
	if($logged){
		$stat_lnk = "<a href=\"{$admin_link}?mod=stats\" style=\"margin-right:10px\">статистика</a>";
		$exit_lnk = "<a href=\"{$admin_link}?act=logout \">выйти</a>";
	}
	
	echo <<<HTML

               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script src="system/inc/js/jquery.js"></script>
<script src="system/inc/js/bic_calendar.min.js"></script>
<script src="system/inc/js/bootstrap.min.js"></script>


</body>

</html>	

HTML;
}
function msgbox($title, $text, $link = false){
	echoheader();
	echohtmlstart($title);
	echo '<center>'.$text.'<br /><a href="'.$link.'" class="btn btn-primary">Вернуться назад</a></center>';
	echohtmlend();
}

$users = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users`");
$albums = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_albums`");
$attach = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_attach`");
$audio = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_audio`");
$groups = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_communities`");
$groups_wall = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_communities_wall`");
$invites = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_invites`");
$notes = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_notes`");
$videos = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_videos`");
$messages = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_messages`");

function echoblock(){
global $audio,$users,$albums,$groups,$videos,$notes,$messages,$attach,$weq;
$stat_albums=$albums['cnt'];
$stat_groups=$groups['cnt'];
$stat_video=$videos['cnt'];
$stat_users=$users['cnt'];
$stat_notes=$notes['cnt'];
$stat_messages=$messages['cnt']/2;
$stat_attach=$attach['cnt'];
$stat_audio =$audio['cnt'];
$notice=$weq['notice'];
	echo <<<HTML
    <!-- /.row -->
             <ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
</ol>
	<h2 class="page-header">Панель Управление</h2>                        
				            <div class="row">
							<div class="col-lg-3 col-md-6">
                   <div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-music fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Аудиозаписей   <span class="pull-right">{$stat_audio}</span></h4>
  										<a href="?mod=musics"><p>Подробнее <i class="fa fa-arrow-circle-right"></i></p></a>
  									</div>
  								</div></div>
							
							<div class="col-lg-3 col-md-6">
                   <div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-youtube-play fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Видеозаписей   <span class="pull-right">{$stat_video}</span></h4>
  										<a href="?mod=videos"><p>Подробнее <i class="fa fa-arrow-circle-right"></i></p></a>
  									</div>
  								</div></div>
								
									<div class="col-lg-3 col-md-6">
                   <div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-book fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Альбомов   <span class="pull-right">{$stat_albums}</span></h4>
  										<a href="?mod=albums"><p>Подробнее <i class="fa fa-arrow-circle-right"></i></p></a>
  									</div>
  								</div></div>
								
									<div class="col-lg-3 col-md-6">
                   <div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-group fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Сообществ   <span class="pull-right">{$stat_groups}</span></h4>
  										<a href="?mod=groups"><p>Подробнее <i class="fa fa-arrow-circle-right"></i></p></a>
  									</div>
  								</div></div>
								
									<div class="col-lg-3 col-md-6">
                   <div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-user fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Пользователей   <span class="pull-right">{$stat_users}</span></h4>
  										<a href="?mod=users"><p>Подробнее <i class="fa fa-arrow-circle-right"></i></p></a>
  									</div>
  								</div></div>
								
										<div class="col-lg-3 col-md-6">
                   <div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-pencil fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Заметок   <span class="pull-right">{$stat_notes}</span></h4>
  										<a href="?mod=notes"><p>Подробнее <i class="fa fa-arrow-circle-right"></i></p></a>
  									</div>
  								</div></div>
								
										<div class="col-lg-3 col-md-6">
                   <div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-envelope fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Сообщений   <span class="pull-right">{$stat_messages}</span></h4>
  										<a href=""><p>Подробнее <i class="fa fa-arrow-circle-right"></i></p></a>
  									</div>
  								</div></div>
								
									<div class="col-lg-3 col-md-6">
                   <div class="info-box  bg-info  text-white">
  									<div class="info-icon bg-info-dark">
  										<i class="fa fa-camera-retro fa-4x"></i>
  									</div>
  									<div class="info-details">
  										<h4>Прикпрепл. фото   <span class="pull-right">{$stat_attach}</span></h4>
  										<a href=""><p>Подробнее <i class="fa fa-arrow-circle-right"></i></p></a>
  									</div>
  								</div></div>
								
								
								
						</div> 		
		
            <div class="row">   
             <div class="col-md-8">
			<div class="panel panel-cascade">
								<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-pencil"></i>
  											Заметки
  										
  										</h3>
  									</div>
  									<div class="panel-body nopadding">
								<form method="GET" action="" class="form-horizontal">		
	<div class="form-group col-md-12">
					
							<textarea id="notice" class="well col-md-12" style="height:155px;margin:14px;" name="notice">{$notice}</textarea>							
			</div>
			<div class="col-md-offset-10">
 <input type="submit" value="Сохранить" class="btn btn-primary" name="save" style="margin:-20px 0 10px 0;" /></div>
</div></form> 								
								</div>
								</div>

								<div class="col-md-4">
								<div class="panel panel-cascade">
								<div class="panel-heading">
  										<h3 class="panel-title">
  											<i class="fa fa-calendar-o"></i>
  											Календарь

  										</h3>
  									</div>
  									<div class="panel-body nopadding">
								<div id="bic_calendar_right" class="bg-white"></div>
								</div>
								</div>
								</div>
								
  							</div>		
							

<br>
<br>
<br>


			
                <!-- /.row -->
HTML;
}

function htmlclear(){
	echo '<div class="clr"></div>';
}
function myBr($source){
	$find[] = "'\r'";
	$replace[] = "<br />";
	
	//$find[] = "'\n'";
	//$replace[] = "<br />";

	$source = preg_replace($find, $replace, $source);
	
	return $source;
}
function myBrRn($source){

	$find[] = "<br />";
	$replace[] = "\r";
	$find[] = "<br />";
	$replace[] = "\n";
	
	$source = str_replace($find, $replace, $source);
	
	return $source;
}
function textFilter($source, $substr_num = false, $strip_tags = false){
	global $db;
	
	if(function_exists("get_magic_quotes_gpc") AND get_magic_quotes_gpc())
		$source = stripslashes($source);  
	
	$find = array('/data:/i', '/about:/i', '/vbscript:/i', '/onclick/i', '/onload/i', '/onunload/i', '/onabort/i', '/onerror/i', '/onblur/i', '/onchange/i', '/onfocus/i', '/onreset/i', '/onsubmit/i', '/ondblclick/i', '/onkeydown/i', '/onkeypress/i', '/onkeyup/i', '/onmousedown/i', '/onmouseup/i', '/onmouseover/i', '/onmouseout/i', '/onselect/i', '/javascript/i');
		
	$replace = array("d&#097;ta:", "&#097;bout:", "vbscript<b></b>:", "&#111;nclick", "&#111;nload", "&#111;nunload", "&#111;nabort", "&#111;nerror", "&#111;nblur", "&#111;nchange", "&#111;nfocus", "&#111;nreset", "&#111;nsubmit", "&#111;ndblclick", "&#111;nkeydown", "&#111;nkeypress", "&#111;nkeyup", "&#111;nmousedown", "&#111;nmouseup", "&#111;nmouseover", "&#111;nmouseout", "&#111;nselect", "j&#097;vascript");

	$source = preg_replace("#<iframe#i", "&lt;iframe", $source);
	$source = preg_replace("#<script#i", "&lt;script", $source);
		
	if(!$substr_num)
		$substr_num = 25000;

	$source = $db->safesql(myBr(htmlspecialchars(substr(trim($source), 0, $substr_num))));
	
	$source = str_ireplace("{", "&#123;", $source);
	$source = str_ireplace("`", "&#96;", $source);
	$source = str_ireplace("{theme}", "&#123;theme}", $source);
	
	$source = preg_replace($find, $replace, $source);
	
	if($strip_tags)
		$source = strip_tags($source);

	return $source;
}
function ajax_utf8($source){
	return iconv('utf-8', 'windows-1251', $source);
}
function installationSelected($id, $options){
	$source = str_replace('value="'.$id.'"', 'value="'.$id.'" selected', $options);
	return $source;
}
function mozg_clear_cache_file($prefix) {
	@unlink(ENGINE_DIR.'/cache/'.$prefix.'.tmp');
}
function mozg_clear_cache(){
	$fdir = opendir(ENGINE_DIR.'/cache/');
	
	while($file = readdir($fdir))
		if($file != '.' and $file != '..' and $file != '.htaccess' and $file != 'system')
			@unlink(ENGINE_DIR.'/cache/'.$file);
}
function mozg_mass_clear_cache_file($prefix){
	$arr_prefix = explode('|', $prefix);
	foreach($arr_prefix as $file)
		@unlink(ENGINE_DIR.'/cache/'.$file.'.tmp');
}
function convert_unicode($t, $to = 'windows-1251') {
	$to = strtolower($to);
	if($to == 'utf-8'){
		return $t;
	} else {
		if(function_exists('iconv')) $t = iconv("UTF-8", $to . "//IGNORE", $t);
		else $t = "The library iconv is not supported by your server";
	}
	return $t;
}
function formatsize($file_size){
	if($file_size >= 1073741824){
		$file_size = round($file_size / 1073741824 * 100 ) / 100 ." Gb";
	} elseif($file_size >= 1048576){
		$file_size = round($file_size / 1048576 * 100 ) / 100 ." Mb";
	} elseif($file_size >= 1024){
		$file_size = round($file_size / 1024 * 100 ) / 100 ." Kb";
	} else {
		$file_size = $file_size." b";
	}
	return $file_size;
}
function system_mozg_clear_cache_file($prefix) {
	@unlink(ENGINE_DIR.'/cache/system/'.$prefix.'.php');
}
?>
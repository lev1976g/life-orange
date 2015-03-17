<?php
/* 
	Appointment: Настройки системы
	File: system.php
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

//Если сохраянем
if(isset($_POST['saveconf'])){
	$saves = $_POST['save'];

	$find[] = "'\r'";
	$replace[] = "";
	$find[] = "'\n'";
	$replace[] = "";
	
	$handler = fopen(ENGINE_DIR.'/data/config.php', "w");
	fwrite($handler, "<?php \n\n//System Configurations\n\n\$config = array (\n\n");

	foreach($saves as $name => $value ) {
	
		if($name != "offline_msg" AND $name != "lang_list"){
			$value = trim(stripslashes($value));
			$value = htmlspecialchars($value, ENT_QUOTES);
			$value = preg_replace($find, $replace, $value);
			
			$name = trim(stripslashes($name));
			$name = htmlspecialchars($name, ENT_QUOTES);
			$name = preg_replace($find, $replace, $name);
		}
		
		$value = str_replace("$", "&#036;", $value);
		$value = str_replace("{", "&#123;", $value);
		$value = str_replace("}", "&#125;", $value);
		
		$name = str_replace("$", "&#036;", $name);
		$name = str_replace("{", "&#123;", $name);
		$name = str_replace("}", "&#125;", $name);
		
		$value = $db->safesql($value);
		
		fwrite($handler, "'{$name}' => \"{$value}\",\n\n");
	}
	fwrite($handler, ");\n\n?>" );
	fclose($handler);
	
	msgbox('Настройки сохранены', '<div class="alert alert-info">Настройки системы были успешно сохранены!</div>', '?mod=system');
} else {
	echoheader();


	//Чтение всех шаблон в папке "templates"
	$root = './templates/';
	$root_dir = scandir($root);
	foreach($root_dir as $templates){
		if($templates != '.' AND $templates != '..' AND $templates != '.htaccess')
			$for_select .= str_replace('value="'.$config['temp'].'"', 'value="'.$config['temp'].'" selected', '<option value="'.$templates.'">'.$templates.'</option>');
	}
	
	//Чтение всех языков
	$root_dir2 = scandir('./lang/');
	foreach($root_dir2 as $lang){
		if($lang != '.' AND $lang != '..' AND $lang != '.htaccess')
			$for_select_lang .= str_replace('value="'.$config['lang'].'"', 'value="'.$config['lang'].'" selected', '<option value="'.$lang.'">'.$lang.'</option>');
	}
	
	//GZIP
	$for_select_gzip = installationSelected($config['gzip'], '<option value="yes">Да</option><option value="no">Нет</option>');
	
	//GZIP JS
	$for_select_gzip_js = installationSelected($config['gzip_js'], '<option value="yes">Да</option><option value="no">Нет</option>');
	
	//Offline
	$for_select_offline = installationSelected($config['offline'], '<option value="yes">Да</option><option value="no">Нет</option>');
	
	$config['offline_msg'] = stripslashes($config['offline_msg']);
	
	$for_select_video_mod = installationSelected($config['video_mod'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_comm = installationSelected($config['video_mod_comm'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_add = installationSelected($config['video_mod_add'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_add_my = installationSelected($config['video_mod_add_my'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_privat = installationSelected($config['video_mod_privat'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_del = installationSelected($config['video_mod_del'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_search = installationSelected($config['video_mod_search'], '<option value="yes">Да</option><option value="no">Нет</option>');
	echo <<<HTML

                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Панель Управление
                            </li>
							<li class="active">Основные настройки</li>
                        </ol>

	<form role="form" method="POST" action="">
		<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small><i class="fa fa-cog"></i>  Основные настройки</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Название сайта:</h6><div class="td_br">Например: "Моя домашняя страница"</div></td>
					<td class="col-lg-4"><input class="form-control form-cascade-control"  type="text" name="save[home]" value="{$config['home']}" /></td>
				</tr>
				<tr>
					<td><h6>Используемая кодировка на сайте:</h6><div class="td_br">Укажите кодировку, которую использует ваш сайт</div></td>
					<td><input class="form-control form-cascade-control"  type="text" name="save[charset]" value="{$config['charset']}"" /></td>
				</tr>
				<tr>
					<td><h6>Адрес сайта:</h6><div class="td_br">Укажите имя основного домена на котором располагается ваш сайт.</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[home_url]"  value="{$config['home_url']}" /></td>
				</tr>
				<tr>
					<td><h6>Шаблон сайта по умолчанию:</h6><div class="td_br">Выберите шаблон, который будет использоваться на сайте</div></td>
					<td><select name="save[temp]"  class="form-control form-cascade-control" >{$for_select}</select></td>
				</tr>
				<tr>
					<td><h6>Время онлайна людей в секундах:</h6><div class="td_br">Выберите время, после истечения которого, человек не будет отображаться онлайн</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[online_time]"  value="{$config['online_time']}" /></td>
				</tr>
				<tr>
					<td><h6>Используемый язык:</h6><div class="td_br">Выберите язык, который будет использоваться при работе с системой</div></td>
					<td><select name="save[lang]"  class="form-control form-cascade-control" >{$for_select_lang}</select></td>
				</tr>
				<tr>
					<td><h6>Включить Gzip сжатие HTML страниц:</h6><div class="td_br">Браузер будет получать HTML-странички в сжатом виде</div></td>
					<td><select name="save[gzip]"  class="form-control form-cascade-control" >{$for_select_gzip}</select></td>
				</tr>
				<tr>
					<td><h6>Включить Gzip сжатие JS файлов:</h6><div class="td_br">Браузер будет получать JS файлы в сжатом виде</div></td>
					<td><select name="save[gzip_js]"  class="form-control form-cascade-control" >{$for_select_gzip_js}</select></td>
				</tr>
				<tr>
					<td><h6>Выключить сайт:</h6><div class="td_br">Перевести сайт в состояние offline, для проведения технических работ</div></td>
					<td><select name="save[offline]"  class="form-control form-cascade-control" >{$for_select_offline}</select></td>
				</tr>
				<tr>
					<td><h6>Причина отключения сайта:</h6><div class="td_br">Сообщение для отображения в режиме отключенного сайта</div></td>
					<td><textarea class="form-control form-cascade-control"  rows="4" name="save[offline_msg]">{$config['offline_msg']}</textarea></td>
				</tr>
				<tr>
					<td><h6>Список используемых языков (название папок): </h6><div class="td_br">Пример: Русский | Russian</div></td>
					<td><textarea class="form-control form-cascade-control"  rows="2" name="save[lang_list]">{$config['lang_list']}</textarea></td>
				</tr>
				<tr>
					<td><h6>Бонусный рейтинг за подарок :</h6><div class="td_br">Цена подарка</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[bonus_rate]"  value="{$config['bonus_rate']}" /></td>
				</tr>
				<tr>
					<td><h6>Стоимость 1 голоса:</h6><div class="td_br">Стоимость покупки 1 голоса</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[cost_balance]"  value="{$config['cost_balance']}" /></td>
				</tr>
			</tbody>
         </table>
		 </div>
	</div>
		
		
HTML;

	//Video mod

	$for_select_video_mod = installationSelected($config['video_mod'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_comm = installationSelected($config['video_mod_comm'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_add = installationSelected($config['video_mod_add'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_add_my = installationSelected($config['video_mod_add_my'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_privat = installationSelected($config['video_mod_privat'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_del = installationSelected($config['video_mod_del'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_video_mod_search = installationSelected($config['video_mod_search'], '<option value="yes">Да</option><option value="no">Нет</option>');
	
	echo <<<HTML
		<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small><i class="fa fa-video-camera"></i>  Настройки видео</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Включить модуль:</h6><div class="td_br">После отключения пользователи не смогут просматривать видеозаписи</div></td>
					<td class="col-lg-4"><select name="save[video_mod]"  class="form-control form-cascade-control" >{$for_select_video_mod}</select></td>
				</tr>
				<tr>
					<td><h6>Разрешить комментирование видео:</h6><div class="td_br">После отключения пользователи не смогут оставлять комментарии под видеозаписью</div></td>
					<td><select name="save[video_mod_comm]"  class="form-control form-cascade-control" >{$for_select_video_mod_comm}</select></td>
				</tr>
				<tr>
					<td><h6>Разрешить добавление видео:</h6><div class="td_br">После отключения пользователи не смогут добавлять свои видеозаписи</div></td>
					<td><select name="save[video_mod_add]"  class="form-control form-cascade-control" >{$for_select_video_mod_add}</select></td>
				</tr>
				<tr>
					<td><h6>Включить функцию "Добавить в Мои Видеозаписи":</h6><div class="td_br">После отключения пользователи не смогут добавлять чужие видеозаписи в "Мои Видеозаписи"</div></td>
					<td><select name="save[video_mod_add_my]" class="form-control form-cascade-control" >{$for_select_video_mod_add_my}</select></td>
				</tr>
				<tr>
					<td><h6>Разрешить поиск по видео:</h6><div class="td_br">После отключения пользователи не смогут осуществлять поиск видеозаписей на сайте</div></td>
					<td><select name="save[video_mod_search]"  class="form-control form-cascade-control" >{$for_select_video_mod_search}</select></td>
				</tr>
			</tbody>
         </table>
		 </div>
	</div>

HTML;



	//Photo mod
	
	$for_select_album_mod = installationSelected($config['album_mod'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_albums_drag = installationSelected($config['albums_drag'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_photos_drag = installationSelected($config['photos_drag'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_photos_comm = installationSelected($config['photos_comm'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_photos_load = installationSelected($config['photos_load'], '<option value="yes">Да</option><option value="no">Нет</option>');

	echo <<<HTML
	
			<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small><i class="fa fa-picture-o"></i>  Настройки фото</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Включить модуль "Альбомы":</h6><div class="td_br">После отключения пользователи не смогут создавать и смотреть альбомы</div></td>
					<td class="col-lg-4"><select name="save[album_mod]"  class="form-control form-cascade-control" >{$for_select_album_mod}</select></td>
				</tr>
				<tr>
					<td><h6>Максимальное количество альбомов:</h6><div class="td_br">Максимальное количество созданных альбомов одним пользователем</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[max_albums]"  value="{$config['max_albums']}" /></td>
				</tr>
				<tr>
					<td><h6>Максимальное количество фото в один альбом:</h6><div class="td_br">Максимальное количество загруженных фотографий в альбом одним пользователем</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[max_album_photos]"  value="{$config['max_album_photos']}" /></td>
				</tr>
				<tr>
					<td><h6>Максимальный размер загужаемой фотографии:</h6><div class="td_br">Размер фотографии в килобайтах</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[max_album_photos]"  value="{$config['max_album_photos']}" /></td>
				</tr>
				<tr>
					<td><h6>Расширение фотографий, допустимых к загрузке:</h6><div class="td_br">Например: jpg, jpeg, png</div></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[photo_format]"  value="{$config['photo_format']}" /></td>
				</tr>
				<tr>
					<td><h6>Разрешить менять порядок альбомов:</h6></td>
					<td><select name="save[albums_drag]"  class="form-control form-cascade-control" >{$for_select_albums_drag}</select></td>
				</tr>
				<tr>
					<td><h6>Разрешить менять порядок фотографий:</h6></td>
					<td><select name="save[photos_drag]"  class="form-control form-cascade-control" >{$for_select_photos_drag}</select></td>
				</tr>
				<tr>
					<td><h6>Стоимость оценки <b>5+</b>:</h6></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[rate_price]"  value="{$config['rate_price']}" /></td>
				</tr>
			</tbody>
         </table>
		 </div>
	</div>

HTML;
	//Audio mod

	$for_select_audio_mod = installationSelected($config['audio_mod'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_audio_mod_add = installationSelected($config['audio_mod_add'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_audio_mod_add_my = installationSelected($config['audio_mod_add_my'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_audio_mod_search = installationSelected($config['audio_mod_search'], '<option value="yes">Да</option><option value="no">Нет</option>');

	echo <<<HTML
			<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small><i class="fa fa-music"></i>  Настройки аудио</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Включить модуль:</h6><div class="td_br">После отключения пользователи не смогут слушать аудизаписи</div></td>
					<td class="col-lg-4"><select name="save[audio_mod]"  class="form-control form-cascade-control" >{$for_select_audio_mod}</select></td>
				</tr>
				<tr>
					<td><h6>Разрешить добавление музыки:</h6><div class="td_br">После отключения пользователи не смогут добавлять свои аудизаписи</div></td>
					<td><select name="save[audio_mod_add]"  class="form-control form-cascade-control" >{$for_select_audio_mod_add}</select></td>
				</tr>
				<tr>
					<td><h6>Разрешить поиск по музыке:</h6><div class="td_br">После отключения пользователи не смогут осуществлять поиск аудизаписей на сайте</div></td>
					<td><select name="save[audio_mod_search]"  class="form-control form-cascade-control" >{$for_select_audio_mod_search}</select></td>
				</tr>
			</tbody>
         </table>
		 </div>
	</div>
HTML;
	//E-mail
	
	$for_select_mail_metod = installationSelected($config['mail_metod'], '<option value="php">PHP Mail()</option><option value="smtp">SMTP</option>');
	echo <<<HTML
				<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small><i class="fa fa-envelope"/></i>  Настройки E-Mail</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>E-Mail адрес администратора:</h6></td>
					<td class="col-lg-4"><input class="form-control form-cascade-control" type="text" name="save[admin_mail]"  value="{$config['admin_mail']}" /></td>
				</tr>
				<tr>
					<td><h6>Метод отправки почты:</h6></td>
					<td><select name="save[mail_metod]"  class="form-control form-cascade-control" >{$for_select_mail_metod}</select></td>
				</tr>
				<tr>
					<td><h6>SMTP хост:</h6></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[smtp_host]"  value="{$config['smtp_host']}" /></td>
				</tr>
				<tr>
					<td><h6>SMTP порт:</h6></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[smtp_port]"  value="{$config['smtp_port']}" /></td>
				</tr>
				<tr>
					<td><h6>SMTP Имя Пользователя:</h6></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[smtp_user]"  value="{$config['smtp_user']}" /></td>
				</tr>
				<tr>
					<td><h6>SMTP Пароль:</h6></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[smtp_pass]"  value="{$config['smtp_pass']}" /></td>
				</tr>
			</tbody>
         </table>
		 </div>
	</div>

HTML;

	//Настройки E-mail оповещаний
	
	
	$for_select_news_mail_1 = installationSelected($config['news_mail_1'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_news_mail_2 = installationSelected($config['news_mail_2'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_news_mail_3 = installationSelected($config['news_mail_3'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_news_mail_4 = installationSelected($config['news_mail_4'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_news_mail_5 = installationSelected($config['news_mail_5'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_news_mail_6 = installationSelected($config['news_mail_6'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_news_mail_7 = installationSelected($config['news_mail_7'], '<option value="yes">Да</option><option value="no">Нет</option>');
	$for_select_news_mail_8 = installationSelected($config['news_mail_8'], '<option value="yes">Да</option><option value="no">Нет</option>');

	echo <<<HTML

	<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small><i class="fa fa-bell-o"></i>  Настройки E-Mail оповещаний</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Включить уведомление при новой заявки в друзья:</h6></td>
					<td class="col-lg-4"><select name="save[news_mail_1]"  class="form-control form-cascade-control" >{$for_select_news_mail_1}</select></td>
				</tr>
				<tr>
					<td><h6>Включить уведомление при ответе на запись:</h6></td>
					<td><select name="save[news_mail_2]"  class="form-control form-cascade-control" >{$for_select_news_mail_2}</select></td>
				</tr>
				<tr>
					<td><h6>Включить уведомление при комментировании видео:</h6></td>
					<td><select name="save[news_mail_3]"  class="form-control form-cascade-control" >{$for_select_news_mail_3}</select></td>
				</tr>
				<tr>
					<td><h6>Включить уведомление при комментировании фото:</h6></td>
					<td><select name="save[news_mail_4]"  class="form-control form-cascade-control" >{$for_select_news_mail_4}</select></td>
				</tr>
				<tr>
					<td><h6>Включить уведомление при комментировании заметки:</h6></td>
					<td><select name="save[news_mail_5]"  class="form-control form-cascade-control" >{$for_select_news_mail_5}</select></td>
				</tr>
				<tr>
					<td><h6>Включить уведомление при новом подарке:</h6></td>
					<td><select name="save[news_mail_6]"  class="form-control form-cascade-control" >{$for_select_news_mail_6}</select></td>
				</tr>
				<tr>
					<td><h6>Включить уведомление при новой записи на стене:</h6></td>
					<td><select name="save[news_mail_7]"  class="form-control form-cascade-control" >{$for_select_news_mail_7}</select></td>
				</tr>
				<tr>
					<td><h6>Включить уведомление при новом персональном сообщении:</h6></td>
					<td><select name="save[news_mail_8]"  class="form-control form-cascade-control" >{$for_select_news_mail_8}</select></td>
				</tr>
			</tbody>
         </table>
		 </div>
	</div>

HTML;


	
	echo <<<HTML
<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small><i class="fa fa-money"></i>  Настройки пополнения через SMS (smsbill.ru)</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Кодовое слово:</h6></td>
					<td class="col-lg-4"><input class="form-control form-cascade-control" type="text" name="save[code_word]"  value="{$config['code_word']}" /></td>
				</tr>
				<tr>
					<td><h6>Короткий номер для оплаты:</h6></td>
					<td><input class="form-control form-cascade-control" type="text" name="save[sms_number]"  value="{$config['sms_number']}" /></td>
				</tr>

			</tbody>
         </table>
		 </div>
HTML;

	echo <<<HTML
	<div class="col-lg-12">
<div class="form-group"> <input type="submit" value="Сохранить" name="saveconf" class="btn btn-primary" /></div>
</div></div>
</form>



HTML;

	htmlclear();
	echohtmlend();
}
?>
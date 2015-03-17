<link href="{theme}/dev/dev.css" rel="stylesheet" type="text/css"></link>
<div id="wrap3"><div id="wrap2">
  <div id="wrap1">
    <div id="content"><div class="dev_main_col" valign="top">
  <div id="dev_page" class="dev_page wk_text">
  <div class="dev_header"><span id="dev_page_acts"></span><div id="dev_header_name" class="dev_header_name"><a href="/dev">Главная</a> » Документация</div><span id="dev_page_sections"></span></div>
  <div id="dev_page_cont" class="dev_page_cont fl_l">
    <!--4-->
<a name="Создание приложения"></a><div class="wk_header">Создание приложения</div> На базе платформы ВКонтакте можно <a class="wk_vk_link" href="http://vk.com/editapp?act=create">создавать</a> приложения, относящиеся к одной из следующих групп: <br><br>

<ul class="listing">
<li><span class="l"><b><a href="/dev/native">Игры и приложения</a></b> для ВКонтакте. Доступны для запуска внутри социальной сети и интегрируются внутри сайта при помощи <a href="/dev/Flash_apps">Flash</a> или <a href="/dev/IFrame_apps">IFrame</a>-элемента. Этим приложениям доступно большинство <a href="/dev/methods">методов API</a>, а также методы <a href="/dev/payments">Payments API</a> для приема платежей. </span></li>
</ul><br>

<ul class="listing">
<li><span class="l"><b><a href="/dev/standalone">Standalone/Mobile-приложения</a></b>. Клиентские приложения для различных платформ (для Desktop и мобильных устройств). Требуют <a href="/dev/auth_mobile">авторизации по протоколу OAuth</a>. Взаимодействие с API происходит <a href="/dev/api_requests">стандартным способом</a>. </span></li>
</ul><br>

<ul class="listing">
<li><span class="l"><b><a href="/dev/sites">Сторонние сайты и виджеты</a></b>. Внешние веб-сервисы или установленные на сайтах виджеты. Сайты используют для авторизации и вызова методов либо <a href="/dev/auth_sites">серверную авторизацию OAuth</a>, либо <a href="/dev/openapi">клиентскую авторизацию Open API</a>. Доступно большинство <a href="/dev/methods">методов API</a>. </span></li>
</ul><br>

<a name="Авторизация"></a><div class="wk_header">Авторизация</div> В Standalone/Mobile-приложениях и сайтах, а также серверных частях любых типов приложений перед вызовом большинства методов API необходимо проводить авторизацию пользователя (или приложения). 
<ul class="listing">
<li><span class="l"><a href="/dev/authentication">Авторизация OAuth</a> (клиентская и серверная). Механизмы авторизации хотя и схожи для Standalone/Mobile-приложений и для сайтов, но имеют и отличия, которые делают их не взаимозаменяемыми. </span></li>
<li><span class="l"><a href="/dev/openapi">Авторизация Open API</a> (только клиентская). Доступна только для сайтов. </span></li>
</ul><br>

<a name="Взаимодействие с API"></a><div class="wk_header">Взаимодействие с API</div> 
<ul class="listing">
<li><span class="l"><a href="/dev/api_requests">Выполнение запросов к API</a>. </span></li>
<li><span class="l"><a href="/dev/upload_files">Процесс загрузки файлов на сервер ВКонтакте</a> </span></li>
</ul><br>

<a name="Методы API"></a><div class="wk_header">Методы API</div> 
<ul class="listing">
<li><span class="l"><a href="/dev/methods">Описание методов API</a> – Список всех доступных методов API. </span></li>
<li><span class="l"><a href="/dev/payments">Payments API</a>  – Платёжный API для приложений. </span></li>
<li><span class="l"><a href="/dev/ads">Ads API</a> – Методы для работы с рекламным кабинетом. </span></li>
<li><span class="l"><a href="/dev/datatypes">Типы данных</a> – описание типов данных, возвращаемых разными методами API. </span></li>
</ul><br>

<a name="Виджеты для сайтов"></a><div class="wk_header">Виджеты для сайтов</div> Список виджетов: 
<ul class="listing">
<li><span class="l"><a href="/dev/Comments">Комментарии</a>. Встраивание универсального блока комментариев на стороннем сайте. </span></li>
<li><span class="l"><a href="/dev/Community">Сообщества</a>. Встраивание блока сообщества на стороннем сайте. </span></li>
<li><span class="l"><a href="/dev/Like">«Мне нравится»</a>. Возможность выразить своё отношение к статье и поделиться ссылкой с друзьями. </span></li>
<li><span class="l"><a href="/dev/Recommended">Рекомендации</a>. Возможность быстро найти самые популярные материалы на сайте. Используются данные виджета <a href="/dev/Like">«Мне нравится»</a>. </span></li>
<li><span class="l"><a href="/dev/Poll">Опросы</a>. Возможность проголосовать в опросе и опросить своих друзей. </span></li>
<li><span class="l"><a href="/dev/Auth">Авторизация</a>. Возможность максимально просто авторизоваться на сайте. </span></li>
<li><span class="l"><a href="/dev/Share">Публикация ссылок</a>. Возможность быстро делиться ссылкой на статью пользователям ВКонтакте. </span></li>
<li><span class="l"><a href="/dev/Subscribe">Подписаться на автора</a>. Возможность в один клик подписаться на заданного пользователя или группу. </span></li>
</ul><br>

<a name="Другие разделы "></a><div class="wk_header">Другие разделы </div> 
<ul class="listing">
<li><span class="l"><a class="wk_vk_link" href="http://vk.com/api_updates">API Change Log</a> – Страница с новостями о последних изменениях в API. </span></li>
<li><span class="l"><a href="/dev/health">Статус API</a> – Страница с информацией о состоянии платформы. <br><br><div class="dev_report_bug"><a onclick="Dev.reportError('main', 'Документация');">Сообщить об ошибке</a></div>
  </span></li></ul></div>
  <div id="dev_sidebar" class="dev_sidebar fl_r">
    <div class="input_back_wrap no_select"><div class="input_back" style="margin: 1px; padding: 6px 40px 6px 20px;"><div class="input_back_content" style="color: rgb(119, 119, 119);">Поиск</div></div></div><input id="dev_search" class="text dev_section_search" type="text" onkeydown="return Dev.onSearchChange(this, event);" onblur="Dev.onSearchBlur()" onfocus="return Dev.onSearchChange(this, event);" value="">
<div id="dev_mlist_cont">
  <div id="dev_search_suggest" style="display: none;">
    <div class="fc_scrollbar_cont" style="height: 0px; right: 0px; left: auto; pointer-events: none;"><div class="fc_scrollbar_inner" style="display: none;"></div></div><div id="dev_search_suggest_list" style="overflow: hidden;">
    </div>
  </div>
  <div id="dev_method_narrow" style="display: none;">
    <div class="dev_section_menu_cont"><a id="dev_section_menu" class=" dd_menu_target">main</a></div>
    <div id="dev_mlist_list" class="dev_mlist_list"></div>
  </div>
  <div id="dev_page_narrow" style=""><a id="dev_mlist_main" href="/dev/main" class="dev_section_menu dev_mlist_sel">Документация</a><a id="dev_mlist_native" href="/dev/native" class="dev_section_submenu">Приложения и игры</a><a id="dev_mlist_standalone" href="/dev/standalone" class="dev_section_submenu">Standalone/Mobile</a><a id="dev_mlist_sites" href="/dev/sites" class="dev_section_submenu">Сайты и виджеты</a><a id="dev_mlist_apiusage" href="/dev/apiusage" class="dev_section_menu">Работа с API</a><a id="dev_mlist_authentication" href="/dev/authentication" class="dev_section_submenu">Авторизация</a><a id="dev_mlist_api_requests" href="/dev/api_requests" class="dev_section_submenu">Запросы к API</a><a id="dev_mlist_clientapi" href="/dev/clientapi" class="dev_section_submenu">Взаимодействие Flash/IFrame</a><a id="dev_mlist_upload_files" href="/dev/upload_files" class="dev_section_submenu">Загрузка файлов</a><a id="dev_mlist_openapi" href="/dev/openapi" class="dev_section_submenu">Open API для сайтов</a><a id="dev_mlist_methods" href="/dev/methods" class="dev_section_menu">Список методов</a><a id="dev_mlist_secure" href="/dev/secure" class="dev_section_submenu">Серверные методы API</a><a id="dev_mlist_payments" href="/dev/payments" class="dev_section_submenu">Платежный API</a><a id="dev_mlist_ads" href="/dev/ads" class="dev_section_submenu">Рекламный API</a><a id="dev_mlist_database" href="/dev/database" class="dev_section_submenu">База учебных заведений ВКонтакте</a><a id="dev_mlist_datatypes" href="/dev/datatypes" class="dev_section_submenu">Типы данных</a><a id="dev_mlist_help" href="/dev/help" class="dev_section_menu">Поддержка</a><a id="dev_mlist_rules" href="/dev/rules" class="dev_section_submenu">Правила платформы</a><a id="dev_mlist_partnership" href="/dev/partnership" class="dev_section_submenu">Партнерская модель</a><a id="dev_mlist_health" href="/dev/health" class="dev_section_submenu">Состояние платформы</a></div>
</div>
  </div>
  <br class="clear">
</div>
</div></div>
  </div>
</div></div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>

{header}
<noscript><meta http-equiv="refresh" content="0; URL=/badbrowser.php"></noscript>
<link media="screen" href="{theme}/style/style.css" type="text/css" rel="stylesheet" /> 
<link media="screen" href="{theme}/im_chat/im_chat.css" type="text/css" rel="stylesheet" /> 
<link media="screen" href="{theme}/style/ppages.css" type="text/css" rel="stylesheet" /> 
<script type="text/javascript" src="{theme}/js/chat.js"></script>
{js}[not-logged]<script type="text/javascript" src="{theme}/js/reg.js"></script>[/not-logged]

<style>
.footer_menu {
color:white;
}


</style>

</head>
<body onResize="onBodyResize()" class="no_display">
<div class="scroll_fix_bg no_display" onMouseDown="myhtml.scrollTop()"><div class="scroll_fix_page_top">Наверх</div></div>
<div id="doLoad"></div>
<div class="head">
 <div class="autowr">




[logged]<a href="/u{my-id}" class="udinsMy" onClick="Page.Go(this.href); return false;"  style="
    text-decoration: none;
    font-family: cursive;
    /* font-family: tahoma, arial, verdana, sans-serif, Lucida Sans; */
">LifeOrange</a>[/logged]
  [not-logged]<a href="/" class="udins" style="
    text-decoration: none;
    font-family: cursive;
    color:white;
    /* font-family: tahoma, arial, verdana, sans-serif, Lucida Sans; */
">LifeOrange</a>[/not-logged]
  <div class="headmenu">
   [logged]<a href="/messages" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic">
	<div id="new_msg">{msg}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_mess" /><br />
	 Сообщения
    </div>
   </a>
   <a href="/friends{requests-link}" onClick="Page.Go(this.href); return false;" id="requests_link">
    <div class="headm_posic">
	<div id="new_requests">{demands}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_friend" /><br />
	 Друзья
    </div>
   </a>
   <a href="/albums/{my-id}" onClick="Page.Go(this.href); return false;" id="requests_link_new_photos">
    <div class="headm_posic">
	<div id="new_photos">{new_photos}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_photo" /><br />
	 Фото
    </div>
   </a>
   <a href="/index.php?go=guests" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic">
	<img src="{theme}/images/spacer.gif" class="headm_ic_support" /><br />
	 Гости
    </div>
   </a>
   <a href="/fave" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic"><img src="{theme}/images/spacer.gif" class="headm_ic_fave" /><br />
	 Закладки
    </div>
   </a>
   <a href="/apps" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic"><img src="/templates/Default/images/spacer.gif" class="headm_ic_games" /><br />
	 Игры
    </div>
   </a>
   <a href="/videos" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic"><img src="{theme}/images/spacer.gif" class="headm_ic_videos" /><br />
	 Видео
    </div>
   </a>
   <a href="/audio" onClick="doLoad.js(0); player.open(); return false;">
    <div class="headm_posic"><img src="/templates/Default/images/spacer.gif" class="headm_ic_music" id="fplayer_pos" /><br />
	 Музыка
    </div>
   </a>
   <a href="{groups-link}" onClick="Page.Go(this.href); return false;" id="new_groups_lnk">
    <div class="headm_posic">
	<div id="new_groups">{new_groups}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_groups" /><br />
	 Группы
    </div>
   </a>
   <a href="/news{news-link}" onClick="Page.Go(this.href); return false;" id="news_link">
    <div class="headm_posic">
	<div id="new_news">{new-news}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_news" /><br />
	 Лента
    </div>
   </a>
   <a href="/notes" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic"><img src="{theme}/images/spacer.gif" class="headm_ic_notes" /><br />
	 Заметки
    </div>
   </a>
   <a href="/" onClick="gSearch.open_tab(); return false;" id="se_link">
    <div class="headm_posic"><img src="{theme}/images/spacer.gif" class="headm_ic_se" /><br />
	 Поиск
    </div>
   </a>
   <a href="/settings" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic"><img src="{theme}/images/spacer.gif" class="headm_ic_settings" /><br />
	 Настройки
    </div>
   </a>
   <a href="/support" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic">
	<div id="new_support">{new-support}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_support" /><br />
	 Помощь
    </div>
   </a>
   <a href="{ubm-link}" onClick="Page.Go(this.href); return false;" id="ubm_link">
    <div class="headm_posic">
	<div id="new_ubm">{new-ubm}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_ubm" /><br />
	 Баланс
    </div>
   </a>
   <a href="/?act=logout">
    <div class="headm_posic">
	<img src="{theme}/images/spacer.gif" class="headm_ic_logout" /><br />
	 Выйти
    </div>
   </a>
  [/logged]

  </div>

  
   <!--search-->
   <div class="search_tab no_display" id="search_tab">
    <input type="text" value="Поиск" class="fave_input search_input" 
		onBlur="if(this.value=='') this.value='Поиск';this.style.color = '#c1cad0';" 
		onFocus="if(this.value=='Поиск')this.value='';this.style.color = '#000'" 
		onKeyPress="if(event.keyCode == 13) gSearch.go();"
		onKeyUp="FSE.Txt()"
	id="query" maxlength="65" />
	<div id="search_types">
	 <input type="hidden" value="1" id="se_type" />
	 <div class="search_type" id="search_selected_text" onClick="gSearch.open_types('#sel_types'); return false">по людям</div>
	 <div class="search_alltype_sel no_display" id="sel_types">
	  <div id="1" onClick="gSearch.select_type(this.id, 'по людям'); FSE.GoSe($('#query').val()); return false" class="search_type_selected">по людям</div>
	  <div id="2" onClick="gSearch.select_type(this.id, 'по видеозаписям'); FSE.GoSe($('#query').val()); return false">по видеозаписям</div>
	  <div id="3" onClick="gSearch.select_type(this.id, 'по заметкам');  FSE.GoSe($('#query').val()); return false">по заметкам</div>
	  <div id="4" onClick="gSearch.select_type(this.id, 'по сообществам'); FSE.GoSe($('#query').val()); return false">по сообществам</div>
	  <div id="5" onClick="gSearch.select_type(this.id, 'по аудиозаписям');  FSE.GoSe($('#query').val()); return false">по аудиозаписям</div>
	 </div>
	</div>
	<div class="button_div fl_l margin_left"><button onClick="gSearch.go(); return false" id="se_but">Найти</button></div>
   </div>
   <div class="fast_search_bg no_display">
   <a href="/" style="padding:12px;background:#eef3f5" onClick="gSearch.go(); return false" onMouseOver="FSE.ClrHovered(this.id)" id="all_fast_res_clr1"><text>Искать</text> <b id="fast_search_txt"></b><div class="fl_r fast_search_ic"></div></a>
   <span id="reFastSearch"></span>
   </div>
   <!--/search-->
   
 </div>
</div>

<div class="clear"></div>
<div style="margin-top:44px;"></div>

<div class="autowr">
 [not-logged]<div class="leftpanel">
  <form method="POST" action="">
   <div class="flLg">Электронный адрес</div><input type="text" name="email" id="log_email" class="inplog" maxlength="50" />
   <div class="flLg">Пароль</div><input type="password" name="password" id="log_password" class="inplog" maxlength="50" />
   <div class="logpos">
    <div class="button_div"><button name="log_in" id="login_but" style="width:138px">Войти</button></div>
	<div style="margin-top:5px"><a href="/restore" onClick="Page.Go(this.href); return false"  style="color:white;">Не можете войти?</a></div>
   </div>
  </form>
 </div>[/not-logged]

<!--
<div style="position:fixed;width:112px;text-align:center;margin-left:-120px;margin-top:20px">
  <div style="padding:10px 4px 3px 4px;font-size:13px;font-weight:bold;background:#2CA31C;color:#fff;text-shadow:0px 1px 0px #4577a7;margin-left:-125px;height:20px;border-top-left-radius:5px;border-top-right-radius:5px"><b>Радио онлайн</b></div>
  <div style="background:#fff;padding:10px;margin-left:-125px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;" class="border_radius1_5 margin_bottom1_10">
  <span style="color:#000;font-size:10px"><object width="150" height="150" id="mju"><param name="allowScriptAccess" value="sameDomain" /><param name="swLiveConnect" value="true" /><param name="movie" value="http://lifeorange.esy.es/radio/mju.swf" /><param name="flashvars" value="playlist=http://lifeorange.esy.es/radio/playlist.mpl&auto_run=1&repeat=1&shuffle=0&anti_cache=1&l=41F200&m=00A33C&d=006127&b=FF0000&p=0036C9&tt=000000" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><embed src="http://lifeorange.esy.es/radio/mju.swf" flashvars="playlist=http://lifeorange.esy.es/radio/playlist.mpl&auto_run=1&repeat=1&shuffle=0&anti_cache=1&l=41F200&m=00A33C&d=006127&b=FF0000&p=0036C9&tt=000000" loop="false" menu="false" quality="high" wmode="transparent" bgcolor="#000000" width="150" height="150" name="mju" allowScriptAccess="sameDomain" swLiveConnect="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object></span>
  </div></div>
-->

 <div class="content" [logged]style="width:auto;"[/logged]>
  <div class="shadow">
  <div class="speedbar no_display" id="">{speedbar}</div>
  <div class="padcont">
   <div id="audioPlayer"></div>
   <div id="page">{info}{content}</div>
   <div class="clear"></div>
  </div>
  </div>
  <div class="footer">
[logged]
<b>
  <table style="font-size:17px; background-color: rgb(239, 135, 48); width: 805px;height: 150px;margin-top: -10px;margin-left: -10px;padding: 10px;font-family: normal, Tahoma;">
    <tbody>
      <tr>
        <td>
          О сайте
          </td>
        <td>
          Поиск
          </td>
        <td>
          Приложения
          </td>
        </tr>
      <tr>
            <td>
          <a href="/engine" style="color:white">Официальная группа</a>
          </td>
        <td>
          <a href="/?go=search&amp;query=&amp;type=1" style="color:white">Люди</a>
          </td>
        <td>
          <a href="/chat" style="color:white">Общий чат</a>
          </td>
        </tr>
      
            <tr>
            <td>
          <a href="/reviews" style="color:white">Отзывы</a>
          </td>
        <td>
          <a href="/?go=search&amp;type=4" style="color:white">Сообщества</a>
          </td>
        <td>
          <a href="/miss" style="color:white">Мисс сайта</a>
          </td>
        </tr>
      
            <tr>
            <td>
          <a href="/m" style="color:white">Мобильная версия</a>
          </td>
        <td>
          <a href="/?go=search&amp;type=5" style="color:white">Музыка</a>
          </td>
        <td>
          <a href="/webtomat" class="footer_menu">Игры WebTomat</a>
          </td>
        </tr>

            <tr>
            <td>
          <a href="/blog" style="color:white">Блог</a>
          </td>
        <td>
          <a href="/?go=search&amp;type=2" style="color:white">Видео</a>
          </td>
        <td>
          <a href="/app2" style="color:white">ВидеоЧат</a>
          </td>
        </tr>

            <tr>
            <td>
          <a href="/developers" style="color:white">Разработчикам</a>
          </td>
        <td>
          <a href="/?go=search&amp;type=3" style="color:white">Заметки</a>
          </td>
        <td>
          <a href="/youtubevideo" style="color:white">YouTube Видео <font color="red">NEW</font></a>

          </td>
        </tr>
        



      </tbody>
    </table></b>
[/logged]
<br>
[logged]
<b>
    <a href="/chat" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">Общий чат</a>
    <a href="/miss" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">Мисс сайта</a>
    <a href="/?act=change_mobile" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">мобильная версия</a>
    <a href="/?go=search&online=1" onClick="Page.Go(this.href); return false" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">люди</a>
    <a href="/?go=search&type=2" onClick="Page.Go(this.href); return false" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">видео</a>
    <a href="/?go=search&type=5" onClick="Page.Go(this.href); return false" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">музыка</a>
    <a href="/support?act=new" onClick="Page.Go(this.href); return false" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">помощь</a>
    <a href="/reviews" onClick="Page.Go(this.href); return false" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">отзывы</a>
   <a href="/blog" onClick="Page.Go(this.href); return false" style="border:1px solid white; background-color:white; color:orange; border-radius:5px;">блог</a><br>
</b>
<br>








[/logged]

</div>
  </div>
 </div>
</div>


[logged]


<div class="im_chat_block ui-draggable" id="im_chat_block">

<div class="im_chathead fl_l" onmousedown="drag_object(event, this.parentNode, 2000, 300)">Чат с друзьями</div>
<div class="im_chathead2 fl_l"></div>
<div class="im_chatclose fl_r" onclick="im_chat.close();"><div></div></div>
<div class="clear"></div>
<div class="fc_clist_online_wrap fl_r" onmouseover="myhtml.title('', 'Показать только диалоги', 'fc_clist_online_active')" onclick="im_chat.mail();"><div id="fc_clist_online_active" class="fc_clist_online fc_clist_online_active"></div></div>
<div class="im_chatSearch">
<input type="text" id="im_chatSearch" placeholder="Начните вводить имя..." onkeydown="im_chat.search();" class="im_chatsearchtext" value="">
</div>
<span id="updateDialogs"></span>
<div class="im_chatserch"></div>
<div class="im_chatbody">

{chat}
</div>
<div class="im_chatbody2" style="display:none;">
</div>
<div class="clear"></div>
</div>




<script type="text/javascript" src="{theme}/js/push.js"></script>
<div class="no_display"><audio id="beep-three" controls preload="auto"><source src="{theme}/images/soundact.ogg"></source></audio></div>
<div id="updates"></div>[/logged]
<div class="clear"></div>
</body>
</html>
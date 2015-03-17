<?php
/* 
	Appointment: Отправка массовых сообщений
	File: mail.php
	Author: f0rt1 
	Engine: Vii CMS (Social version)
	Copyright: NiceWeb Group (с) 2011
	e-mail: niceweb@i.ua
	URL: http://www.niceweb.in.ua/
	ICQ: 427-825-959
	Данный код защищен авторскими правами
*/
if(!defined('MOZG'))
	die('Hacking attempt!');
	
$act = $_GET['act'];

switch($act){

	//################### Начало рассылки ###################//
	case "send":
		$limit = intval($_POST['limit']);
		$lastid = intval($_POST['lastid']);
		$title = textFilter($_POST['title'], false, true);
		$_POST['text'] = $_POST['text'];
		
		$sql_ = $db->super_query("SELECT user_search_pref, user_email FROM `".PREFIX."_users` ORDER by `user_id` ASC LIMIT ".$lastid.", ".$limit, 1);
		
		if($sql_){
			include_once ENGINE_DIR.'/classes/mail.php';
			$mail = new dle_mail($config, true);
			
			foreach($sql_ as $row){
				$find = array ('/data:/i', '/about:/i', '/vbscript:/i', '/onclick/i', '/onload/i', '/onunload/i', '/onabort/i', '/onerror/i', '/onblur/i', '/onchange/i', '/onfocus/i', '/onreset/i', '/onsubmit/i', '/ondblclick/i', '/onkeydown/i', '/onkeypress/i', '/onkeyup/i', '/onmousedown/i', '/onmouseup/i', '/onmouseover/i', '/onmouseout/i', '/onselect/i', '/javascript/i', '/javascript/i' );
				$replace = array ("d&#097;ta:", "&#097;bout:", "vbscript<b></b>:", "&#111;nclick", "&#111;nload", "&#111;nunload", "&#111;nabort", "&#111;nerror", "&#111;nblur", "&#111;nchange", "&#111;nfocus", "&#111;nreset", "&#111;nsubmit", "&#111;ndblclick", "&#111;nkeydown", "&#111;nkeypress", "&#111;nkeyup", "&#111;nmousedown", "&#111;nmouseup", "&#111;nmouseover", "&#111;nmouseout", "&#111;nselect", "j&#097;vascript" );

				$message_send = preg_replace($find, $replace, $_POST['text']);
				$message_send = preg_replace("#<iframe#i", "&lt;iframe", $message_send);
				$message_send = preg_replace("#<script#i", "&lt;script", $message_send);
				$message_send = str_replace("<?", "&lt;?", $message_send);
				$message_send = str_replace("?>", "?&gt;", $message_send);
				$message_send = $db->safesql($message_send);
				$message_send = str_replace("{%user-name%}", $row['user_search_pref'], $_POST['text']);
				
				$mail->send($row['user_email'], $title, $message_send);
				
				echo 'ok';
			}
		}

		die();
	break;
	
	default:
		$users = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users`"); 
		if($users['cnt'] < 20)
			$max_users = $users['cnt'];
		else
			$max_users = 20;

		echoheader();
		
		echo '<div id="form">';
		echohtmlstart();
	
		echo <<<HTML

<script type="text/javascript" src="/system/inc/js/jquery.js"></script>
<script type="text/javascript">
function mailSend(){
	var limit = $('#limit').val();
	var title = $('#title').val();
	var text = $('#text').val();
	var interval = parseInt($('#interval').val())*1000;
	var lastid = $('#lastlimit').val();
	if(lastid != 'finish'){
		if(title != 0){
			if(text != 0){
				$('#form').hide();
				document.getElementById('limit').disabled = true;
				document.getElementById('interval').disabled = true;
				document.getElementById('text').disabled = true;
				document.getElementById('button').disabled = true;
				document.getElementById('title').disabled = true;
				$('#sendingbox').show();
				$.post('/controlpanel.php?mod=mail&act=send', {limit: limit, title: title, text: text, lastid: lastid}, function(data){
					if(data){
						setTimeout('mailSend()', interval);
						$('#lastlimit').val(parseInt(lastid)+parseInt(limit));
						$('#ok_users').text(parseInt(lastid)+parseInt(limit));
						if($('#ok_users').text() == $('#user_cnt').text())
							$('#status').html('<font color="green">отправка завершена</font>');
					} else {
						$('#status').html('<font color="green">отправка завершена</font>');
						$('#lastlimit').val('finish');
						$('#ok_users').text($('#user_cnt').text());
					}
				});
			} else
				alert('Введите текст сообщения');
		} else
			alert('Введите заголовок сообщения');
	} else
		alert('Перезагрузите страницу, для новой рассылки');
}
</script>
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Панель Управление
    </li>
	<li class="active">Рассылка сообщений</li>
</ol>
<form method="POST" action="" role="form">
<div class="table-responsive">
	<div class="col-lg-12">
		<div class="box-header"><small>Рассылка сообщений</small></div>
	    <table class="table table-bordered table-hover table-striped">
			<tbody>
				<tr>
					<td style="height:30px;"><h6>Количество писем за один проход:</h6></td>
					<td class="col-lg-4"><input type="text" id="limit" class="form-control form-cascade-control" value="{$max_users}" /></td>
				</tr>
				<tr>
					<td><h6>Интервал между отправкой писем:</h6><div class="td_br">(секунд)</div> </td>
					<td><input type="text" id="interval" class="form-control form-cascade-control" value="1" /></td>
				</tr>
				<tr>
					<td><h6>Заголовок:</h6></td>
					<td><input type="text" id="title" class="form-control form-cascade-control" /></td>
				</tr>
				<tr>
					<td><h6>Текст сообщения:</h6></td>
					<td><textarea class="form-control form-cascade-control" row="3" id="text"></textarea></td>
				</tr>
				<tr>
					<td><h6>Удалены:</h6></td>
					<td><input type="checkbox" name="delet" {$checked_delet} /></td>
				</tr>
				<tr>
					<td><h6>Сортировка:</h6></td>
					<td> <select name="sort" class="form-control form-cascade-control">
  <option value="0"></option>
  {$selsorlist}
 </select></td>
				</tr>
			</tbody>
         </table>
		 </div>

<div class="col-lg-12">

 <div class="alert alert-info">
                   В своем сообщении вы можете использовать тег <br /><b>{%user-name%}</b>, который означает имя получателя.
</div>

<div class="button_div fl_l"><button onClick="mailSend(); return false" id="button" class="btn btn-primary">Начать отправку</button></div>
<input type="hidden" id="lastlimit" class="inpu" value="0" />

</div>
</form>
HTML;

		echo '</div><div id="sendingbox" style="display:none">';
		echohtmlstart('Отправка сообщений');
		echo <<<HTML
<div id="result"></div>
Отправлено сообщений: <span style="color:red;" id="ok_users">0</span> из <span style="color:blue;" id="user_cnt">{$users['cnt']}</span> Статус: <span id="status">отправка...</span><br /><br />
<span style="color:#777">Внимание идет отсылка сообщений пользователям, не закрывайте данное окно до тех пор, пока не будут отосланы все письма</span>
</div>
HTML;
		echohtmlend();
}
?>
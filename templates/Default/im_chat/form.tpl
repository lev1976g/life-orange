<script type="text/javascript">
$( init );
function init() {

  $('.im_chats').draggable({
   containment: 'body',
    cursor: 'move',
    snap: 'body'
  
  });
}
</script>
<script type="text/javascript">
$(document).ready(function(){
	chat_interval_im = setInterval('im_chat.update(\'{for_user_id}\')', 10000);
	$('#im_chats{for_user_id}').resizable();
});			
</script>

<textarea 
	class="im_chatforntext" 
	id="msg_text{for_user_id}" 
	placeholder="Введите Ваше сообщение.."
	onKeyUp="im.typograf('{for_user_id}')"
	onKeyPress="if(event.keyCode == 13) im_chat.send('{for_user_id}', '{my-name}', '{my-ava}')">

</textarea>






<div class="clear"></div></div>



<input type="hidden" id="status_sending{for_user_id}" value="1" />
<input type="hidden" id="for_user_id{for_user_id}" value="{for_user_id}" />



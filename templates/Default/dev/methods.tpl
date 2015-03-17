<link href="{theme}/dev/dev.css" rel="stylesheet" type="text/css"></link>
<div id="wrap3"><div id="wrap2">
  <div id="wrap1">
    <div id="content"><div class="dev_main_col" valign="top">
  <div id="dev_page" class="dev_page wk_text">
  <div class="dev_header"><span id="dev_page_acts"></span><div id="dev_header_name" class="dev_header_name"><a href="/dev">Главная</a> » Список методов</div><span id="dev_page_sections"></span></div>
  <div id="dev_page_cont" class="dev_page_cont fl_l"><!--4-->
<a name="Описание методов API "></a><div class="wk_header">Описание методов API </div> Ниже приводятся все методы для работы с данными <b>ВКонтакте</b>. <div class="dev_methods_sect_rows "><div class="wk_sub_header">Пользователи</div><a href="/dev/users.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">users.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает расширенную информацию о пользователях.</div>
  <br class="clear">
</a><a href="/dev/users.search" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">users.search</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список пользователей в соответствии с заданным критерием поиска.</div>
  <br class="clear">
</a><a href="/dev/users.isAppUser" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">users.isAppUser</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о том, установил ли пользователь приложение.</div>
  <br class="clear">
</a><a href="/dev/users.getSubscriptions" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">users.getSubscriptions</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список идентификаторов пользователей и групп, которые входят в список подписок пользователя.</div>
  <br class="clear">
</a><a href="/dev/users.getFollowers" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">users.getFollowers</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список идентификаторов пользователей, которые являются подписчиками пользователя. Идентификаторы пользователей в списке отсортированы в порядке убывания времени их добавления.</div>
  <br class="clear">
</a><a href="/dev/users.report" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">users.report</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет пожаловаться на пользователя.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Авторизация</div><a href="/dev/auth.checkPhone" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">auth.checkPhone</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Проверяет правильность введённого номера.</div>
  <br class="clear">
</a><a href="/dev/auth.signup" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">auth.signup</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Регистрирует нового пользователя по номеру телефона.</div>
  <br class="clear">
</a><a href="/dev/auth.confirm" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">auth.confirm</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Завершает регистрацию нового пользователя, начатую методом auth.signup, по коду, полученному через SMS.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Стена</div><a href="/dev/wall.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список записей со стены пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/wall.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список записей со стен пользователей или сообществ по их идентификаторам.</div>
  <br class="clear">
</a><a href="/dev/wall.savePost" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.savePost</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет запись на стене пользователя. Запись может содержать фотографию, ранее загруженную на сервер ВКонтакте, или любую доступную фотографию из альбома пользователя.</div>
  <br class="clear">
</a><a href="/dev/wall.post" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.post</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Публикует новую запись на своей или чужой стене.</div>
  <br class="clear">
</a><a href="/dev/wall.repost" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.repost</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Копирует объект на стену пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/wall.getReposts" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.getReposts</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет получать список репостов заданной записи.</div>
  <br class="clear">
</a><a href="/dev/wall.edit" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.edit</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует запись на стене.</div>
  <br class="clear">
</a><a href="/dev/wall.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет запись со стены.</div>
  <br class="clear">
</a><a href="/dev/wall.restore" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.restore</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает удаленную запись на стене пользователя.</div>
  <br class="clear">
</a><a href="/dev/wall.getComments" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.getComments</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список комментариев к записи на стене пользователя.</div>
  <br class="clear">
</a><a href="/dev/wall.addComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.addComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет комментарий к записи на стене пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/wall.editComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.editComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует комментарий на стене пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/wall.deleteComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.deleteComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет комментарий текущего пользователя к записи на своей или чужой стене.</div>
  <br class="clear">
</a><a href="/dev/wall.restoreComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">wall.restoreComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает комментарий текущего пользователя к записи на своей или чужой стене.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Фотографии</div><a href="/dev/photos.createAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.createAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Создает пустой альбом для фотографий.</div>
  <br class="clear">
</a><a href="/dev/photos.editAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.editAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует данные альбома для фотографий пользователя.</div>
  <br class="clear">
</a><a href="/dev/photos.getAlbums" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getAlbums</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список альбомов пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/photos.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список фотографий в альбоме.</div>
  <br class="clear">
</a><a href="/dev/photos.getAlbumsCount" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getAlbumsCount</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает количество доступных альбомов пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/photos.getProfile" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getProfile</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список фотографий со страницы пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/photos.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о фотографиях по их идентификаторам.</div>
  <br class="clear">
</a><a href="/dev/photos.getUploadServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getUploadServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает адрес сервера для загрузки фотографий.</div>
  <br class="clear">
</a><a href="/dev/photos.getProfileUploadServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getProfileUploadServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает адрес сервера для загрузки фотографии на страницу пользователя.</div>
  <br class="clear">
</a><a href="/dev/photos.getChatUploadServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getChatUploadServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет получить адрес для загрузки фотографий мультидиалогов.</div>
  <br class="clear">
</a><a href="/dev/photos.saveProfilePhoto" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.saveProfilePhoto</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет фотографию пользователя после успешной загрузки.</div>
  <br class="clear">
</a><a href="/dev/photos.saveWallPhoto" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.saveWallPhoto</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет фотографии после успешной загрузки на URI, полученный методом photos.getWallUploadServer.</div>
  <br class="clear">
</a><a href="/dev/photos.getWallUploadServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getWallUploadServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает адрес сервера для загрузки фотографии на стену пользователя.</div>
  <br class="clear">
</a><a href="/dev/photos.getMessagesUploadServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getMessagesUploadServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает адрес сервера для загрузки фотографии в личное сообщение пользователю.</div>
  <br class="clear">
</a><a href="/dev/photos.saveMessagesPhoto" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.saveMessagesPhoto</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет фотографию после успешной загрузки на URI, полученный методом photos.getMessagesUploadServer.</div>
  <br class="clear">
</a><a href="/dev/photos.search" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.search</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Осуществляет поиск изображений по местоположению или описанию.</div>
  <br class="clear">
</a><a href="/dev/photos.save" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.save</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет фотографии после успешной загрузки.</div>
  <br class="clear">
</a><a href="/dev/photos.copy" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.copy</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет скопировать фотографию в альбом "Сохраненные фотографии"</div>
  <br class="clear">
</a><a href="/dev/photos.edit" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.edit</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Изменяет описание у выбранной фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.move" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.move</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Переносит фотографию из одного альбома в другой.</div>
  <br class="clear">
</a><a href="/dev/photos.makeCover" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.makeCover</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Делает фотографию обложкой альбома.</div>
  <br class="clear">
</a><a href="/dev/photos.reorderAlbums" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.reorderAlbums</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Меняет порядок альбома в списке альбомов пользователя.</div>
  <br class="clear">
</a><a href="/dev/photos.reorderPhotos" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.reorderPhotos</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Меняет порядок фотографии в списке фотографий альбома пользователя.</div>
  <br class="clear">
</a><a href="/dev/photos.getAll" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getAll</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает все фотографии пользователя или сообщества в антихронологическом порядке.</div>
  <br class="clear">
</a><a href="/dev/photos.getUserPhotos" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getUserPhotos</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список фотографий, на которых отмечен пользователь</div>
  <br class="clear">
</a><a href="/dev/photos.deleteAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.deleteAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет указанный альбом для фотографий у текущего пользователя</div>
  <br class="clear">
</a><a href="/dev/photos.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаление фотографии на сайте.</div>
  <br class="clear">
</a><a href="/dev/photos.confirmTag" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.confirmTag</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Подтверждает отметку на фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.getComments" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getComments</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список комментариев к фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.getAllComments" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getAllComments</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает отсортированный в антихронологическом порядке список всех комментариев к конкретному альбому или ко всем альбомам пользователя.</div>
  <br class="clear">
</a><a href="/dev/photos.createComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.createComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Создает новый комментарий к фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.deleteComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.deleteComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет комментарий к фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.restoreComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.restoreComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает удаленный комментарий к фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.editComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.editComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Изменяет текст комментария к фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.getTags" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getTags</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список отметок на фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.putTag" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.putTag</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет отметку на фотографию.</div>
  <br class="clear">
</a><a href="/dev/photos.removeTag" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.removeTag</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет отметку с фотографии.</div>
  <br class="clear">
</a><a href="/dev/photos.getNewTags" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">photos.getNewTags</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список фотографий, на которых есть непросмотренные отметки.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Друзья</div><a href="/dev/friends.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список идентификаторов друзей пользователя или расширенную информацию о друзьях пользователя (при использовании параметра <b>fields</b>).</div>
  <br class="clear">
</a><a href="/dev/friends.getOnline" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.getOnline</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список идентификаторов друзей пользователя, находящихся на сайте.</div>
  <br class="clear">
</a><a href="/dev/friends.getMutual" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.getMutual</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список идентификаторов общих друзей между парой пользователей.</div>
  <br class="clear">
</a><a href="/dev/friends.getRecent" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.getRecent</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список идентификаторов недавно добавленных друзей текущего пользователя</div>
  <br class="clear">
</a><a href="/dev/friends.getRequests" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.getRequests</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о полученных или отправленных заявках на добавление в друзья для текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/friends.add" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.add</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Одобряет или создает заявку на добавление в друзья.</div>
  <br class="clear">
</a><a href="/dev/friends.edit" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.edit</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует списки друзей для выбранного друга.</div>
  <br class="clear">
</a><a href="/dev/friends.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет пользователя из списка друзей или отклоняет заявку в друзья.</div>
  <br class="clear">
</a><a href="/dev/friends.getLists" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.getLists</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список меток друзей текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/friends.addList" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.addList</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Создает новый список друзей у текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/friends.editList" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.editList</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует существующий список друзей текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/friends.deleteList" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.deleteList</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет существующий список друзей текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/friends.getAppUsers" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.getAppUsers</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список идентификаторов друзей текущего пользователя, которые установили данное приложение.</div>
  <br class="clear">
</a><a href="/dev/friends.getByPhones" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.getByPhones</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список друзей пользователя, у которых завалидированные или указанные в профиле телефонные номера входят в заданный список.</div>
  <br class="clear">
</a><a href="/dev/friends.deleteAllRequests" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.deleteAllRequests</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Отмечает все входящие заявки на добавление в друзья как просмотренные.</div>
  <br class="clear">
</a><a href="/dev/friends.getSuggestions" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.getSuggestions</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список профилей пользователей, которые могут быть друзьями текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/friends.areFriends" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">friends.areFriends</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о том, добавлен ли текущий пользователь в друзья у указанных пользователей.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Виджеты</div><a href="/dev/widgets.getComments" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">widgets.getComments</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Получает список комментариев к странице, оставленных через Виджет комментариев.</div>
  <br class="clear">
</a><a href="/dev/widgets.getPages" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">widgets.getPages</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Получает список страниц приложения/сайта, на которых установлен Виджет комментариев или «Мне нравится».</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Работа с данными</div><a href="/dev/storage.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">storage.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает значение переменной, название которой передано в параметре <b>key</b>.</div>
  <br class="clear">
</a><a href="/dev/storage.set" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">storage.set</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет значение переменной, название которой передано в параметре <b>key</b>.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Статус</div><a href="/dev/status.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">status.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Получает текст статуса пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/status.set" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">status.set</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Устанавливает новый статус текущему пользователю.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Аудиозаписи</div><a href="/dev/audio.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список аудиозаписей пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/audio.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию об аудиозаписях.</div>
  <br class="clear">
</a><a href="/dev/audio.getLyrics" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.getLyrics</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает текст аудиозаписи.</div>
  <br class="clear">
</a><a href="/dev/audio.search" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.search</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список аудиозаписей в соответствии с заданным критерием поиска.</div>
  <br class="clear">
</a><a href="/dev/audio.getUploadServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.getUploadServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает адрес сервера для загрузки аудиозаписей.</div>
  <br class="clear">
</a><a href="/dev/audio.save" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.save</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет аудиозаписи после успешной загрузки.</div>
  <br class="clear">
</a><a href="/dev/audio.add" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.add</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Копирует аудиозапись на страницу пользователя или группы.</div>
  <br class="clear">
</a><a href="/dev/audio.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет аудиозапись со страницы пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/audio.edit" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.edit</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует данные аудиозаписи на странице пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/audio.reorder" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.reorder</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Изменяет порядок аудиозаписи, перенося ее между аудиозаписями, идентификаторы которых переданы параметрами <b>after</b> и <b>before</b>.</div>
  <br class="clear">
</a><a href="/dev/audio.restore" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.restore</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает аудиозапись после удаления.</div>
  <br class="clear">
</a><a href="/dev/audio.getAlbums" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.getAlbums</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список альбомов аудиозаписей пользователя или группы.</div>
  <br class="clear">
</a><a href="/dev/audio.addAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.addAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Создает пустой альбом аудиозаписей.</div>
  <br class="clear">
</a><a href="/dev/audio.editAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.editAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует название альбома аудиозаписей.</div>
  <br class="clear">
</a><a href="/dev/audio.deleteAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.deleteAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет альбом аудиозаписей.</div>
  <br class="clear">
</a><a href="/dev/audio.moveToAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.moveToAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Перемещает аудиозаписи в альбом.</div>
  <br class="clear">
</a><a href="/dev/audio.setBroadcast" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.setBroadcast</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Транслирует аудиозапись в статус пользователю или сообществу.</div>
  <br class="clear">
</a><a href="/dev/audio.getBroadcastList" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.getBroadcastList</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список друзей и сообществ пользователя, которые транслируют музыку в статус.</div>
  <br class="clear">
</a><a href="/dev/audio.getRecommendations" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.getRecommendations</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список рекомендуемых аудиозаписей на основе списка воспроизведения заданного пользователя или на основе одной выбранной аудиозаписи.</div>
  <br class="clear">
</a><a href="/dev/audio.getPopular" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.getPopular</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список аудиозаписей из раздела "Популярное".</div>
  <br class="clear">
</a><a href="/dev/audio.getCount" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">audio.getCount</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает количество аудиозаписей пользователя или сообщества.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Страницы</div><a href="/dev/pages.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">pages.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о вики-странице.</div>
  <br class="clear">
</a><a href="/dev/pages.save" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">pages.save</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет текст вики-страницы.</div>
  <br class="clear">
</a><a href="/dev/pages.saveAccess" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">pages.saveAccess</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет новые настройки доступа на чтение и редактирование вики-страницы.</div>
  <br class="clear">
</a><a href="/dev/pages.getHistory" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">pages.getHistory</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список всех старых версий вики-страницы.</div>
  <br class="clear">
</a><a href="/dev/pages.getTitles" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">pages.getTitles</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список вики-страниц в группе.</div>
  <br class="clear">
</a><a href="/dev/pages.getVersion" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">pages.getVersion</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает текст одной из старых версий страницы.</div>
  <br class="clear">
</a><a href="/dev/pages.parseWiki" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">pages.parseWiki</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает html-представление вики-разметки.</div>
  <br class="clear">
</a><a href="/dev/pages.clearCache" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">pages.clearCache</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет очистить кеш отдельных <b>внешних</b> страниц, которые могут быть прикреплены к записям ВКонтакте. После очистки кеша при последующем прикреплении ссылки к записи, данные о странице будут обновлены.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Группы</div><a href="/dev/groups.isMember" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.isMember</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о том, является ли пользователь участником сообщества.</div>
  <br class="clear">
</a><a href="/dev/groups.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о заданном сообществе или о нескольких сообществах.</div>
  <br class="clear">
</a><a href="/dev/groups.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список сообществ указанного пользователя.</div>
  <br class="clear">
</a><a href="/dev/groups.getMembers" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.getMembers</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список участников сообщества.</div>
  <br class="clear">
</a><a href="/dev/groups.join" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.join</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Данный метод позволяет вступить в группу, публичную страницу, а также подтвердить участие во встрече.</div>
  <br class="clear">
</a><a href="/dev/groups.leave" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.leave</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Данный метод позволяет выходить из группы, публичной страницы, или встречи.</div>
  <br class="clear">
</a><a href="/dev/groups.search" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.search</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Осуществляет поиск сообществ по заданной подстроке.</div>
  <br class="clear">
</a><a href="/dev/groups.getInvites" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.getInvites</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Данный метод возвращает список приглашений в сообщества и встречи.</div>
  <br class="clear">
</a><a href="/dev/groups.banUser" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.banUser</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет пользователя в черный список группы.</div>
  <br class="clear">
</a><a href="/dev/groups.unbanUser" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.unbanUser</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Убирает пользователя из черного списка сообщества.</div>
  <br class="clear">
</a><a href="/dev/groups.getBanned" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">groups.getBanned</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список забаненных пользователей в сообществе.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Обсуждения</div><a href="/dev/board.getTopics" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.getTopics</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список тем в обсуждениях указанной группы.</div>
  <br class="clear">
</a><a href="/dev/board.getComments" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.getComments</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список сообщений в указанной теме.</div>
  <br class="clear">
</a><a href="/dev/board.addTopic" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.addTopic</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Создает новую тему в списке обсуждений группы.</div>
  <br class="clear">
</a><a href="/dev/board.addComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.addComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет новое сообщение в теме сообщества.</div>
  <br class="clear">
</a><a href="/dev/board.deleteTopic" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.deleteTopic</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет тему в обсуждениях группы.</div>
  <br class="clear">
</a><a href="/dev/board.editTopic" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.editTopic</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Изменяет заголовок темы в списке обсуждений группы.</div>
  <br class="clear">
</a><a href="/dev/board.editComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.editComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует одно из сообщений в теме группы.</div>
  <br class="clear">
</a><a href="/dev/board.restoreComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.restoreComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает удаленное сообщение темы в обсуждениях группы.</div>
  <br class="clear">
</a><a href="/dev/board.deleteComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.deleteComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет сообщение темы в обсуждениях сообщества.</div>
  <br class="clear">
</a><a href="/dev/board.openTopic" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.openTopic</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Открывает ранее закрытую тему (в ней станет возможно оставлять новые сообщения).</div>
  <br class="clear">
</a><a href="/dev/board.closeTopic" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.closeTopic</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Закрывает тему в списке обсуждений группы (в такой теме невозможно оставлять новые сообщения).</div>
  <br class="clear">
</a><a href="/dev/board.fixTopic" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.fixTopic</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Закрепляет тему в списке обсуждений группы (такая тема при любой сортировке выводится выше остальных).</div>
  <br class="clear">
</a><a href="/dev/board.unfixTopic" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">board.unfixTopic</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Отменяет прикрепление темы в списке обсуждений группы (тема будет выводиться согласно выбранной сортировке).</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Видеозаписи</div><a href="/dev/video.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о видеозаписях.</div>
  <br class="clear">
</a><a href="/dev/video.edit" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.edit</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует данные видеозаписи на странице пользователя.</div>
  <br class="clear">
</a><a href="/dev/video.add" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.add</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет видеозапись в список пользователя.</div>
  <br class="clear">
</a><a href="/dev/video.save" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.save</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает адрес сервера (необходимый для загрузки) и данные видеозаписи.</div>
  <br class="clear">
</a><a href="/dev/video.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет видеозапись со страницы пользователя.</div>
  <br class="clear">
</a><a href="/dev/video.restore" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.restore</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает удаленную видеозапись.</div>
  <br class="clear">
</a><a href="/dev/video.search" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.search</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список видеозаписей в соответствии с заданным критерием поиска.</div>
  <br class="clear">
</a><a href="/dev/video.getUserVideos" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.getUserVideos</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список видеозаписей, на которых отмечен пользователь.</div>
  <br class="clear">
</a><a href="/dev/video.getAlbums" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.getAlbums</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список альбомов видеозаписей пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/video.addAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.addAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Создает пустой альбом видеозаписей.</div>
  <br class="clear">
</a><a href="/dev/video.editAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.editAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует название альбома видеозаписей.</div>
  <br class="clear">
</a><a href="/dev/video.deleteAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.deleteAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет альбом видеозаписей.</div>
  <br class="clear">
</a><a href="/dev/video.moveToAlbum" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.moveToAlbum</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Перемещает видеозаписи в альбом.</div>
  <br class="clear">
</a><a href="/dev/video.getComments" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.getComments</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список комментариев к видеозаписи.</div>
  <br class="clear">
</a><a href="/dev/video.createComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.createComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Cоздает новый комментарий к видеозаписи</div>
  <br class="clear">
</a><a href="/dev/video.deleteComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.deleteComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет комментарий к видеозаписи.</div>
  <br class="clear">
</a><a href="/dev/video.restoreComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.restoreComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает удаленный комментарий к видеозаписи.</div>
  <br class="clear">
</a><a href="/dev/video.editComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.editComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Изменяет текст комментария к видеозаписи.</div>
  <br class="clear">
</a><a href="/dev/video.getTags" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.getTags</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список отметок на видеозаписи.</div>
  <br class="clear">
</a><a href="/dev/video.putTag" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.putTag</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет отметку на видеозапись.</div>
  <br class="clear">
</a><a href="/dev/video.removeTag" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.removeTag</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет отметку с видеозаписи.</div>
  <br class="clear">
</a><a href="/dev/video.getNewTags" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.getNewTags</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список видеозаписей, на которых есть непросмотренные отметки.</div>
  <br class="clear">
</a><a href="/dev/video.report" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">video.report</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет пожаловаться на видеозапись.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Заметки</div><a href="/dev/notes.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список заметок, созданных пользователем.</div>
  <br class="clear">
</a><a href="/dev/notes.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает заметку по её <b>id</b>.</div>
  <br class="clear">
</a><a href="/dev/notes.getFriendsNotes" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.getFriendsNotes</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список заметок друзей пользователя.</div>
  <br class="clear">
</a><a href="/dev/notes.add" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.add</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Создает новую заметку у текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/notes.edit" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.edit</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует заметку текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/notes.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет заметку текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/notes.getComments" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.getComments</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список комментариев к заметке.</div>
  <br class="clear">
</a><a href="/dev/notes.createComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.createComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет новый комментарий к заметке.</div>
  <br class="clear">
</a><a href="/dev/notes.editComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.editComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Редактирует указанный комментарий у заметки.</div>
  <br class="clear">
</a><a href="/dev/notes.deleteComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.deleteComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет комментарий к заметке.</div>
  <br class="clear">
</a><a href="/dev/notes.restoreComment" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notes.restoreComment</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает удалённый комментарий.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Места</div><a href="/dev/places.add" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">places.add</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет новое место в базу географических мест.</div>
  <br class="clear">
</a><a href="/dev/places.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">places.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о местах по их идентификаторам.</div>
  <br class="clear">
</a><a href="/dev/places.search" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">places.search</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список мест, найденных по заданным условиям поиска.</div>
  <br class="clear">
</a><a href="/dev/places.checkin" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">places.checkin</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Отмечает пользователя в указанном месте.</div>
  <br class="clear">
</a><a href="/dev/places.getCheckins" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">places.getCheckins</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список отметок пользователей в местах согласно заданным параметрам.</div>
  <br class="clear">
</a><a href="/dev/places.getTypes" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">places.getTypes</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список всех возможных типов мест.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Аккаунт</div><a href="/dev/account.getCounters" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.getCounters</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает ненулевые значения счетчиков пользователя.</div>
  <br class="clear">
</a><a href="/dev/account.setNameInMenu" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.setNameInMenu</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Устанавливает короткое название приложения (до 17 символов), которое выводится пользователю в левом меню.</div>
  <br class="clear">
</a><a href="/dev/account.setOnline" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.setOnline</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Помечает текущего пользователя как online на 15 минут.</div>
  <br class="clear">
</a><a href="/dev/account.setOffline" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.setOffline</span></div>
  <div class="dev_methods_list_desc fl_l"></div>
  <br class="clear">
</a><a href="/dev/account.lookupContacts" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.lookupContacts</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет искать пользователей <b>ВКонтакте</b>, используя телефонные номера, email-адреса, и идентификаторы пользователей в других сервисах. Найденные пользователи могут быть также в дальнейшем получены методом friends.getSuggestions.</div>
  <br class="clear">
</a><a href="/dev/account.registerDevice" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.registerDevice</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Подписывает устройство на базе iOS, Android или Windows Phone на получение Push-уведомлений.</div>
  <br class="clear">
</a><a href="/dev/account.unregisterDevice" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.unregisterDevice</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Отписывает устройство от Push уведомлений.</div>
  <br class="clear">
</a><a href="/dev/account.setSilenceMode" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.setSilenceMode</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Отключает push-уведомления на заданный промежуток времени.</div>
  <br class="clear">
</a><a href="/dev/account.getPushSettings" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.getPushSettings</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет получать настройки Push уведомлений.</div>
  <br class="clear">
</a><a href="/dev/account.getAppPermissions" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.getAppPermissions</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Получает настройки текущего пользователя в данном приложении.</div>
  <br class="clear">
</a><a href="/dev/account.getActiveOffers" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.getActiveOffers</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список активных рекламных предложений (офферов), выполнив которые пользователь сможет получить соответствующее количество голосов на свой счёт внутри приложения.</div>
  <br class="clear">
</a><a href="/dev/account.banUser" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.banUser</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет пользователя в черный список.</div>
  <br class="clear">
</a><a href="/dev/account.unbanUser" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.unbanUser</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Убирает пользователя из черного списка.</div>
  <br class="clear">
</a><a href="/dev/account.getBanned" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.getBanned</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список пользователей, находящихся в черном списке.</div>
  <br class="clear">
</a><a href="/dev/account.getInfo" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.getInfo</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о текущем аккаунте.</div>
  <br class="clear">
</a><a href="/dev/account.setInfo" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">account.setInfo</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет редактировать информацию о текущем аккаунте.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Сообщения</div><a href="/dev/messages.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список входящих либо исходящих личных сообщений текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/messages.getDialogs" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.getDialogs</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список диалогов текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/messages.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает сообщения по их <b>id</b>.</div>
  <br class="clear">
</a><a href="/dev/messages.search" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.search</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список найденных личных сообщений текущего пользователя по введенной строке поиска.</div>
  <br class="clear">
</a><a href="/dev/messages.getHistory" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.getHistory</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает историю сообщений для указанного пользователя.</div>
  <br class="clear">
</a><a href="/dev/messages.send" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.send</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Отправляет сообщение.</div>
  <br class="clear">
</a><a href="/dev/messages.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет сообщение.</div>
  <br class="clear">
</a><a href="/dev/messages.deleteDialog" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.deleteDialog</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет все личные сообщения в диалоге.</div>
  <br class="clear">
</a><a href="/dev/messages.restore" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.restore</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Восстанавливает удаленное сообщение.</div>
  <br class="clear">
</a><a href="/dev/messages.markAsNew" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.markAsNew</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Помечает сообщения как непрочитанные.</div>
  <br class="clear">
</a><a href="/dev/messages.markAsRead" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.markAsRead</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Помечает сообщения как прочитанные.</div>
  <br class="clear">
</a><a href="/dev/messages.markAsImportant" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.markAsImportant</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Помечает сообщения как важные либо снимает отметку.</div>
  <br class="clear">
</a><a href="/dev/messages.getLongPollServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.getLongPollServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает данные, необходимые для подключения к Long Poll серверу.</div>
  <br class="clear">
</a><a href="/dev/messages.getLongPollHistory" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.getLongPollHistory</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает обновления в личных сообщениях пользователя.</div>
  <br class="clear">
</a><a href="/dev/messages.getChat" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.getChat</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о беседе.</div>
  <br class="clear">
</a><a href="/dev/messages.createChat" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.createChat</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Создаёт беседу с несколькими участниками.</div>
  <br class="clear">
</a><a href="/dev/messages.editChat" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.editChat</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Изменяет название беседы.</div>
  <br class="clear">
</a><a href="/dev/messages.getChatUsers" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.getChatUsers</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет получить список пользователей мультидиалога по его <b>id</b>.</div>
  <br class="clear">
</a><a href="/dev/messages.setActivity" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.setActivity</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Изменяет статус набора текста пользователем в диалоге.</div>
  <br class="clear">
</a><a href="/dev/messages.searchDialogs" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.searchDialogs</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список найденных диалогов текущего пользователя по введенной строке поиска.</div>
  <br class="clear">
</a><a href="/dev/messages.addChatUser" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.addChatUser</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет в мультидиалог нового пользователя.</div>
  <br class="clear">
</a><a href="/dev/messages.removeChatUser" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.removeChatUser</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Исключает из мультидиалога пользователя, если текущий пользователь был создателем беседы либо пригласил исключаемого пользователя.</div>
  <br class="clear">
</a><a href="/dev/messages.getLastActivity" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.getLastActivity</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает текущий статус и дату последней активности указанного пользователя.</div>
  <br class="clear">
</a><a href="/dev/messages.setChatPhoto" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.setChatPhoto</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет установить фотографию мультидиалога, загруженную с помощью метода photos.getChatUploadServer.</div>
  <br class="clear">
</a><a href="/dev/messages.deleteChatPhoto" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">messages.deleteChatPhoto</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Позволяет удалить фотографию мультидиалога.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Новости</div><a href="/dev/newsfeed.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает данные, необходимые для показа списка новостей для текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.getRecommended" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.getRecommended</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Получает список новостей, рекомендованных пользователю.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.getComments" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.getComments</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает данные, необходимые для показа раздела комментариев в новостях пользователя.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.getMentions" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.getMentions</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список записей пользователей на своих стенах, в которых упоминается указанный пользователь.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.getBanned" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.getBanned</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список пользователей и групп, которые текущий пользователь скрыл из ленты новостей.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.addBan" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.addBan</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Запрещает показывать новости от заданных пользователей и групп в ленте новостей текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.deleteBan" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.deleteBan</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Разрешает показывать новости от заданных пользователей и групп в ленте новостей текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.search" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.search</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает результаты поиска по статусам.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.getLists" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.getLists</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает пользовательские списки новостей.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.unsubscribe" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.unsubscribe</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Отписывает текущего пользователя от комментариев к заданному объекту.</div>
  <br class="clear">
</a><a href="/dev/newsfeed.getSuggestedSources" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">newsfeed.getSuggestedSources</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает сообщества, на которые пользователю рекомендуется подписаться.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Мне нравится</div><a href="/dev/likes.getList" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">likes.getList</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Получает список идентификаторов пользователей, которые добавили заданный объект в свой список <b>Мне нравится</b>.</div>
  <br class="clear">
</a><a href="/dev/likes.add" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">likes.add</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Добавляет указанный объект в список <b>Мне нравится</b> текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/likes.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">likes.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет указанный объект из списка <b>Мне нравится</b> текущего пользователя</div>
  <br class="clear">
</a><a href="/dev/likes.isLiked" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">likes.isLiked</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Проверяет, находится ли объект в списке <b>Мне нравится</b> заданного пользователя.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Опросы</div><a href="/dev/polls.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">polls.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает детальную информацию об опросе по его идентификатору.</div>
  <br class="clear">
</a><a href="/dev/polls.addVote" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">polls.addVote</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Отдает голос текущего пользователя за выбранный вариант ответа в указанном опросе.</div>
  <br class="clear">
</a><a href="/dev/polls.deleteVote" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">polls.deleteVote</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Снимает голос текущего пользователя с выбранного варианта ответа в указанном опросе.</div>
  <br class="clear">
</a><a href="/dev/polls.getVoters" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">polls.getVoters</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Получает список идентификаторов пользователей, которые выбрали определенные варианты ответа в опросе.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Документы</div><a href="/dev/docs.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">docs.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает расширенную информацию о документах пользователя или сообщества.</div>
  <br class="clear">
</a><a href="/dev/docs.getById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">docs.getById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о документах по их идентификаторам.</div>
  <br class="clear">
</a><a href="/dev/docs.getUploadServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">docs.getUploadServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает адрес сервера для загрузки документов.</div>
  <br class="clear">
</a><a href="/dev/docs.getWallUploadServer" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">docs.getWallUploadServer</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает адрес сервера для загрузки документов в папку <b>Отправленные</b>, для последующей отправки документа на стену или личным сообщением.</div>
  <br class="clear">
</a><a href="/dev/docs.save" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">docs.save</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сохраняет документ после его успешной загрузки на сервер.</div>
  <br class="clear">
</a><a href="/dev/docs.delete" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">docs.delete</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Удаляет документ пользователя или группы.</div>
  <br class="clear">
</a><a href="/dev/docs.add" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">docs.add</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Копирует документ в документы текущего пользователя.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Закладки</div><a href="/dev/fave.getUsers" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">fave.getUsers</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список пользователей, добавленных текущим пользователем в закладки.</div>
  <br class="clear">
</a><a href="/dev/fave.getPhotos" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">fave.getPhotos</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает фотографии, на которых текущий пользователь поставил отметку "Мне нравится".</div>
  <br class="clear">
</a><a href="/dev/fave.getPosts" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">fave.getPosts</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает записи, на которых текущий пользователь поставил отметку <b>«Мне нравится»</b>.</div>
  <br class="clear">
</a><a href="/dev/fave.getVideos" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">fave.getVideos</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список видеозаписей, на которых текущий пользователь поставил отметку <b>«Мне нравится»</b>.</div>
  <br class="clear">
</a><a href="/dev/fave.getLinks" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">fave.getLinks</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает ссылки, добавленные в закладки текущим пользователем.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Уведомления</div><a href="/dev/notifications.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notifications.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список оповещений об ответах других пользователей на записи текущего пользователя.</div>
  <br class="clear">
</a><a href="/dev/notifications.markAsViewed" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">notifications.markAsViewed</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Сбрасывает счетчик непросмотренных оповещений об ответах других пользователей на записи текущего пользователя.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Статистика</div><a href="/dev/stats.get" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">stats.get</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает статистику сообщества или приложения.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Поиск</div><a href="/dev/search.getHints" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">search.getHints</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Метод позволяет получить результаты быстрого поиска по произвольной подстроке</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Приложения</div><a href="/dev/apps.getCatalog" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">apps.getCatalog</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список приложений, доступных для пользователей сайта через каталог приложений.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Служебные</div><a href="/dev/utils.checkLink" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">utils.checkLink</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о том, является ли ссылка заблокированной на сайте ВКонтакте.</div>
  <br class="clear">
</a><a href="/dev/utils.resolveScreenName" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">utils.resolveScreenName</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Определяет тип объекта (пользователь, сообщество, приложение) и его идентификатор по короткому имени <b>screen_name</b>.</div>
  <br class="clear">
</a><a href="/dev/utils.getServerTime" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">utils.getServerTime</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает текущее время на сервере <b>ВКонтакте</b> в <b>unixtime</b>.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">Данные ВК</div><a href="/dev/database.getCountries" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getCountries</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список стран.</div>
  <br class="clear">
</a><a href="/dev/database.getRegions" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getRegions</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список регионов.</div>
  <br class="clear">
</a><a href="/dev/database.getStreetsById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getStreetsById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию об улицах по их идентификаторам (<b>id</b>).</div>
  <br class="clear">
</a><a href="/dev/database.getCountriesById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getCountriesById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о странах по их идентификаторам</div>
  <br class="clear">
</a><a href="/dev/database.getCities" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getCities</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список городов.</div>
  <br class="clear">
</a><a href="/dev/database.getCitiesById" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getCitiesById</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает информацию о городах по их идентификаторам.</div>
  <br class="clear">
</a><a href="/dev/database.getUniversities" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getUniversities</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список высших учебных заведений.</div>
  <br class="clear">
</a><a href="/dev/database.getSchools" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getSchools</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список школ.</div>
  <br class="clear">
</a><a href="/dev/database.getFaculties" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">database.getFaculties</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Возвращает список факультетов.</div>
  <br class="clear">
</a></div><div class="dev_methods_sect_rows "><div class="wk_sub_header">other</div><a href="/dev/execute" class="dev_methods_list_row">
  <div class="dev_methods_list_name fl_l"><span class="dev_methods_list_span">execute</span></div>
  <div class="dev_methods_list_desc fl_l"><!--4-->Универсальный метод, который позволяет запускать последовательность других методов, сохраняя и фильтруя промежуточные результаты.</div>
  <br class="clear">
</a></div><br><br><div class="dev_report_bug"><a onclick="Dev.reportError('methods', 'Список методов');">Сообщить об ошибке</a></div></div>
  <div id="dev_sidebar" class="dev_sidebar fl_r">
    <div class="input_back_wrap no_select"><div class="input_back" style="margin: 1px; padding: 6px 40px 6px 20px;"><div class="input_back_content" style="color: rgb(119, 119, 119);">Поиск</div></div></div><input id="dev_search" class="text dev_section_search" type="text" onkeydown="return Dev.onSearchChange(this, event);" onblur="Dev.onSearchBlur()" onfocus="return Dev.onSearchChange(this, event);" value="">
<div id="dev_mlist_cont">
  <div id="dev_search_suggest" style="display: none;">
    <div class="fc_scrollbar_cont" style="height: 0px; right: 0px; left: auto; pointer-events: none;"><div class="fc_scrollbar_inner" style="display: none;"></div></div><div id="dev_search_suggest_list" style="overflow: hidden;">
    </div>
  </div>
  <div id="dev_method_narrow" style="display: none;">
    <div class="dev_section_menu_cont"><a id="dev_section_menu" class=" dd_menu_target">native</a></div>
    <div id="dev_mlist_list" class="dev_mlist_list"></div>
  </div>
  <div id="dev_page_narrow" style=""><a id="dev_mlist_main" href="/dev/main" class="dev_section_menu">Документация</a><a id="dev_mlist_native" href="/dev/native" class="dev_section_submenu">Приложения и игры</a><a id="dev_mlist_standalone" href="/dev/standalone" class="dev_section_submenu">Standalone/Mobile</a><a id="dev_mlist_sites" href="/dev/sites" class="dev_section_submenu">Сайты и виджеты</a><a id="dev_mlist_apiusage" href="/dev/apiusage" class="dev_section_menu">Работа с API</a><a id="dev_mlist_authentication" href="/dev/authentication" class="dev_section_submenu">Авторизация</a><a id="dev_mlist_api_requests" href="/dev/api_requests" class="dev_section_submenu">Запросы к API</a><a id="dev_mlist_clientapi" href="/dev/clientapi" class="dev_section_submenu">Взаимодействие Flash/IFrame</a><a id="dev_mlist_upload_files" href="/dev/upload_files" class="dev_section_submenu">Загрузка файлов</a><a id="dev_mlist_openapi" href="/dev/openapi" class="dev_section_submenu">Open API для сайтов</a><a id="dev_mlist_methods" href="/dev/methods" class="dev_section_menu dev_mlist_sel">Список методов</a><a id="dev_mlist_secure" href="/dev/secure" class="dev_section_submenu">Серверные методы API</a><a id="dev_mlist_payments" href="/dev/payments" class="dev_section_submenu">Платежный API</a><a id="dev_mlist_ads" href="/dev/ads" class="dev_section_submenu">Рекламный API</a><a id="dev_mlist_database" href="/dev/database" class="dev_section_submenu">База учебных заведений ВКонтакте</a><a id="dev_mlist_datatypes" href="/dev/datatypes" class="dev_section_submenu">Типы данных</a><a id="dev_mlist_help" href="/dev/help" class="dev_section_menu">Поддержка</a><a id="dev_mlist_rules" href="/dev/rules" class="dev_section_submenu">Правила платформы</a><a id="dev_mlist_partnership" href="/dev/partnership" class="dev_section_submenu">Партнерская модель</a><a id="dev_mlist_health" href="/dev/health" class="dev_section_submenu">Состояние платформы</a></div>
</div>
  </div>
  <br class="clear">
</div>
</div></div>
  </div>
</div></div>
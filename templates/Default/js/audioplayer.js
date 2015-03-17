var cur = {};
var
audio_title='Аудиозаписи',
aud_1='Загрузка аудиозаписи',
aud_2='Вы можете загрузить только mp3 файл.',
aud_3='Аудиофайл не должен превышать 200мб.',
aud_4='Аудиозапись успешно загружена',
aud_5='Ждите, идет загрузка..',
aud_6='Показать больше аудиозаписей',
aud_7='Редактирование аудиозаписи',
aud_8='Удаление аудиозаписи',
aud_9='Вы действительно хотите удалить аудиозапись?',
aud_10='Да, удалить',
aud_11='Ошибка',
aud_12='Успешно',
aud_13='Отмена',
aud_14='Сейчас играют результаты поиска',
aud_15='В поиске найдено',
aud_16='аудиозапись',
aud_17='аудиозаписи',
aud_18='аудиозаписей',
aud_19='Исполнитель',
aud_20='Жанр',
aud_21='Вы действительно хотите удалить эту аудиозапись?',
aud_22='Да, удалить',
aud_23='Загруженно {cur} из {len}',
aud_24='При загрузке аудиозаписи произошла ошибка, обновите страницу и попробуйте снова.',
aud_25='Идет загрузка плейлиста, попробуйте чуть позже..',
aud_26='Добавить в мой список',
aud_27='Повторять эту композицию',
aud_28='Случайный порядок',
aud_29='Добавить аудиозапись';

function set_cookie( name, value, exp_y, exp_m, exp_d){
	var cookie_string = name + "=" + escape ( value );
	if (exp_y){
		var expires = new Date ( exp_y, exp_m, exp_d );
		cookie_string += "; expires=" + expires.toGMTString();
	}
	document.cookie = cookie_string;
}
function get_cookie(cookie_name){
	var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
	if(results) return (unescape(results[2]));
	else return false;
}
function delete_cookie(cookie_name){
	var cookie_date = new Date (); 
	cookie_date.setTime ( cookie_date.getTime() - 1 );
	document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}
function ini_cl (){
	$(window).click(function(e){
	if($('#audioMP.active').length){
			if($(e.target).filter('#audioPad, #audioMP').length == 0 && $(e.target).parents().filter('#audioPad, #audioMP').length == 0) audio_player.showPad(e);
}});
}
function playNewAudio(id, event){
	if($(event.target).parents('.tools, #no_play, .audioPlayer').length != 0 || $(event.target).filter('.text_avilable, #audio_text_res, #artist, #no_play').length != 0) return;
	audio_player.playNew(id);
}
var audio_player = {
	players: {},
	aID: 0,
	aInfo: false,
	aOwner: 0,
	aType: '',
	fullID: '',
	inited: false,
	player: false,
	play: false,
	cplay: false,
	pause: true,
	is_html5: false,
	time: 0,
	pr_click: false,
	curTime: 0,
	timeDir: 0,
	playList: false,
	playLists: {},
	currentPos: 0,
	vol: get_cookie('audioVol') || 1,
	loop: false,
	shuffle: false,
	curPL: false,
	init: function(id){
		var _a = audio_player;
		//if(navigator.plugins['Shockwave Flash']){
		///	$('body').prepend('<embed type="application/x-shockwave-flash" id="player" name="player" width="1" height="2" quality="high" flashvars="onError=audio_player.on_error&amp;onLoadComplete=audio_player.end_load&amp;onLoadProgress=audio_player.load_progress&amp;onPlayFinish=audio_player.play_finish&amp;onPlayProgress=audio_player.play_progress" swliveconnect="true" allowscriptaccess="always" wmode="opaque" src="/swf/audio_lite.swf?_stV=13" style="position:fixed;top:-20px;left:0;">');
		//	setTimeout(function(){ _a.checkLoadedFlash(id); }, 500);
		//}else{
			//this.player = new Audio();
			_a.player = document.getElementById('audioplayer');
			//var support = _a.player.canPlayType('audio/mpeg');

			//if(support != ''){
				_a.player.addEventListener('canplay', _a.canPlay);
				_a.player.addEventListener('progress', _a.load_progress);
				_a.player.addEventListener('timeupdate', _a.play_progress);
				_a.player.addEventListener('ended', _a.play_finish);
				_a.player.addEventListener('error', _a.on_error);
				_a.inited = true;
				_a.is_html5 = true;
				_a.player.volume = _a.vol;
				_a.playNew(id);
			/*}else{
				Box.Open({
					id: 'error',
					title: lang_dd2f_no,
					data: '<div style="padding:15px;">To Play this song you need to install Flash-Player.<br><br>Would you like to visit Flash player web-site?</div>',
					width: 400,
					bottom: 1,
					success: 1,
					suc_text: 'Visit',
					suc_js: 'audio_player.inFlash()'
				});
			}*/
		//}
		$(window).bind('keyup', function(e){
			if(!e.keyCode) return;
			if(e.keyCode == 179){
				if(_a.pause) _a.command('play');
				else _a.command('pause');
			}else if(e.keyCode == 176) _a.nextTrack();
			else if(e.keyCode == 177) _a.prevTrack();
		});
	},
	inFlash: function(){
		document.location = 'http://get.adobe.com/flash/';
	},
	checkLoadedFlash: function(id){
		var _a = audio_player, player = document.getElementById('player');
		if(player && player.paused) {
			audio_player.player = document.getElementById('player');
			audio_player.inited = true;
			_a.player.setVolume(0);
			if(audio_player.aInfo[2]){
				audio_player.player.loadAudio(audio_player.aInfo[2]);
				if(!audio_player.play) {
					audio_player.player.playAudio(0);
					audio_player.player.pauseAudio();
				}else _a.command('play', {style_only: true});
			}
			_a.player.setVolume(_a.vol);
			audio_player.playNew(id);
		}else setTimeout(function(){ audio_player.checkLoadedFlash(id); },50);
	},
	addPlayer: function(d){
		var _a = audio_player;
		_a.players[d.id] = d;
		if(!_a.inited) _a.init();
		$(d.play_but).bind('click', function(e){
			if($(this).hasClass('play')) _a.command('pause');
			else _a.command('play');
		});
		$(d.prbl).bind('mousedown', function(e) { _a.progressDown(e, d.id); }).bind('mousemove', function(e) { _a.progressMove(e, d.id); }).bind('mouseout', function(){
			$(_a.players[d.id].timeBl).hide();
		});
		$(d.prev).bind('click', _a.prevTrack);
		$(d.next).bind('click', _a.nextTrack);
		$(d.volume).bind('mousedown', _a.volumeDown);
		$(d.add).bind('click', _a.addAudio);

		_a.playLists = {};
		for(var i in d.playList){
			var pl = d.playList, pl_data = {data: [], pname: d.pname};
			for(var j in pl) pl_data.data.push(pl[j]);
			_a.playLists[d.playList[i][7]] = pl_data;
			break;
		}

		if(!_a.aInfo){
			for(var i in d.playList){
				_a.aID = d.playList[i][1];
				_a.aOwner = d.playList[i][0];
				_a.aInfo = d.playList[i];
				var type = d.playList[i][7];
				_a.fullID = _a.aID+'_'+_a.aOwner+(type ? '_'+type : '');
				_a.time = d.playList[i][5];
				var s = parseInt(d.playList[i][5] % 60), m = parseInt((d.playList[i][5] / 60) % 60);
				$(d.time).html(m+':'+s);
				if(_a.is_html5) {
					_a.player.src = d.playList[i][2];
					_a.player.load();
				}
				_a.compilePlayList(d.playList[i][7]);
				break;
			}
			$('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').addClass('play').addClass('preactiv');
			_a.play = false;
			_a.cplay = false;
		}else{
			if(_a.pause) $('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').addClass('preactiv');
			else _a.command('play', {style_only: true});
		}
		_a.command('set_info', {player: d.id});
		var vol_percent = _a.vol*100;
		$(d.volume_line).css('width', vol_percent+'%');

		$(d.loop).bind('click', _a.clickLoop);
		$(d.shuffle).bind('click', _a.clickShuffle);

		if(_a.loop) $(d.loop).addClass('active');
		if(_a.shuffle) $(d.shuffle).addClass('active');
		_a.check_add();
	},
	clickLoop: function(){
		var _a = audio_player;
		if(_a.loop) _a.command('off_loop');
		else _a.command('on_loop');
	},
	clickShuffle: function(){
		var _a = audio_player;
		if(_a.shuffle) _a.command('off_shuffle');
		else _a.command('on_shuffle');
	},
	play_pause: function(){
		var _a = audio_player;
		if(_a.pause) _a.command('play');
		else _a.command('pause');
	},
	command: function(type, params){
		var _a = audio_player;
		if(!params) params = {};
		if(type == 'pause'){
			for(var i in _a.players) $(_a.players[i].play_but).removeClass('play');
			$('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').addClass('pause');
			$('#audioMP .playBtn').removeClass('icon-pause').addClass('icon-play-4');
			if(params.style_only) return;
			if(_a.inited){
				if(_a.is_html5) {
					_a.play = false;
					_a.player.pause();
				}else _a.player.pauseAudio();
			}
			_a.pause = true;
		}else if(type == 'play'){
			for(var i in _a.players) $(_a.players[i].play_but).addClass('play');
			$('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').removeClass('pause').removeClass('preactiv').addClass('play');
			$('#player'+_a.fullID).show();
			$('#player'+_a.fullID+' #playerVolumeBar').css('width', (_a.vol*100)+'%');
			$('#audioMP .playBtn').removeClass('icon-play-4').addClass('icon-pause');
			_a.initMP();
			if(params.style_only) return;
			if(_a.inited){
				if(_a.cplay) {
					if(Math.round(_a.player.currentTime) == 0) _a.player.load();
					_a.player.play();
				}else _a.player.play();
			}
			_a.pause = false;
		}else if(type == 'set_info'){
			if(params.player) $(_a.players[params.player].names).html('<b>'+_a.aInfo[3]+'</b> – '+_a.aInfo[4]);
			else for(var i in _a.players) $(_a.players[i].names).html('<b>'+_a.aInfo[3]+'</b> – '+_a.aInfo[4]);
		}else if(type == 'load_progress'){
			for(var i in _a.players) $(_a.players[i].load).css('width', params.p+'%');
			$('#player'+_a.fullID+' .audioLoadProgress').css('width', params.p+'%');
		}else if(type == 'play_progress'){
			if(_a.pr_click) return;
			for(var i in _a.players) $(_a.players[i].pr).css('width', params.p+'%');
			$('#player'+_a.fullID+' #playerPlayLine').css('width', params.p+'%');
		}else if(type == 'update_time'){
			for(var i in _a.players) $(_a.players[i].time).html(params.time);
			$('#audio_time_'+_a.fullID+', #audio_time_'+_a.fullID+'_pad').html(params.time);
		}else if(type == 'off_loop'){
			_a.loop = false;
			for(var i in _a.players) $(_a.players[i].loop).removeClass('active');
		}else if(type == 'on_loop'){
			_a.loop = true;
			for(var i in _a.players) $(_a.players[i].loop).addClass('active');
		}else if(type == 'off_shuffle'){
			_a.shuffle = false;
			for(var i in _a.players) $(_a.players[i].shuffle).removeClass('active');
		}else if(type == 'on_shuffle'){
			_a.shuffle = true;
			for(var i in _a.players) $(_a.players[i].shuffle).addClass('active');
		}else if(type == 'show_add'){
			for(var i in _a.players) {
				$(_a.players[i].add).show();
				if(params.added) $(_a.players[i].add).addClass('icon-ok-3');
				else $(_a.players[i].add).removeClass('icon-ok-3');
			}
		}else if(type == 'hide_add'){
			for(var i in _a.players) $(_a.players[i].add).hide();
		}
	},
	playNew: function(id){
		var _a = audio_player;
		if(!id) return;
		if(!_a.inited) {
			_a.init(id);
			return;
		}
		if(_a.fullID == id) _a.command(_a.pause ? 'play' : 'pause');
		else{
			if(_a.fullID) {
				$('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').removeClass('play').removeClass('pause').removeClass('preactiv');
				_a.backTime(_a.fullID, _a.time);
			}
			_a.player.pause();
			_a.player = null;
			$('.audioPlayer').hide();
			var adata = id.split('_');
			_a.aID = adata[0];
			_a.aOwner = adata[1];
			_a.aType = adata[2] ? adata[2] : '';
			_a.fullID = _a.aID+'_'+_a.aOwner+(adata[2] ? '_'+adata[2] : '');
			_a.getInfoFromDom();
			$('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').addClass('play');
			_a.play = true;
			_a.cplay = false;
			_a.player = document.getElementById('audioplayer');
			_a.command('play', {style_only: true});
			_a.curTime = 0;
			if(_a.is_html5) {
				_a.player.src = _a.aInfo[2];
				_a.player.load();
			}else {
				_a.player.loadAudio(_a.aInfo[2]);
				_a.pause = false;
			}
			_a.command('set_info');
			if(adata[3] != 'pad') _a.compilePlayList(_a.aInfo[7]);
			if(_a.aInfo[8] != 'page') _a.scrollToAudio();
			_a.check_add();
		}
	},
	getInfoFromDom: function(){
		var _a = audio_player, aid = _a.fullID
		if($('#audio_url_'+aid).size()){
			var url = $('#audio_url_'+aid).val().split(',');
			_a.aInfo = [_a.aOwner, _a.aID, url[0], $('#audio_'+aid+' #artist').html(), $('#audio_'+aid+' #name').html(), url[1], $('#audio_time_'+aid).text(), _a.aType, url[2]];
			_a.time = url[1];
		}else if($('#audio_url_'+aid+'_pad').size()){
			var url = $('#audio_url_'+aid+'_pad').val().split(',');
			_a.aInfo = [_a.aOwner, _a.aID, url[0], $('#audio_'+aid+'_pad'+' #artist').html(), $('#audio_'+aid+'_pad'+' #name').html(), url[1], $('#audio_time_'+aid+'_pad').text(), _a.aType, url[2]];
			_a.time = url[1];
		}
	},
	canPlay: function(){
		var _a = audio_player;
		if(_a.play) {
			_a.player.play();
			_a.pause = false;
		}
		_a.cplay = true;
	},
	play_progress: function(curTime, totalTime){
		var _a = audio_player;
		if(_a.is_html5){
			curTime = Math.floor(_a.player.currentTime * 1000) / 1000;
			totalTime = Math.floor(_a.player.duration * 1000) / 1000;
		}else{
			if(isNaN(totalTime)) totalTime = _a.aInfo[5];
		}
		var percent = Math.ceil(curTime/totalTime*100);
		percent = Math.min(100, Math.max(0, percent));
		_a.command('play_progress', {p: percent});
		if(!_a.pause) _a.updateTime(curTime, totalTime);
	},
	play_finish: function(){
		var _a = audio_player;
		$('.audioPlayer').hide();
		if(_a.loop){
			if(_a.is_html5) _a.player.play();
			else _a.player.playAudio(0);
		}else if(!_a.loop && _a.shuffle){
			var i = Math.floor(Math.random() * _a.playlist.data.length);
			_a.playToPlayList(i);
		}else _a.nextTrack();
	},
	on_error: function(e){
		console.log(e);
		Box.Open({
			id: 'error',
			title: 'Ошибка',
			data: '<div style="padding: 15px;">'+aud_24+'</div>',
			width: 400,
			bottom: 1
		});
	},
	errorPL: function(){
		Box.Open({
			id: 'error',
			title: 'Ошибка',
			data: '<div style="padding: 15px;">'+aud_25+'</div>',
			width: 400,
			bottom: 1
		});
	},
	end_load: function(){

	},
	load_progress: function(bufferedTime, totalTime){
		var _a = audio_player;
		if(_a.is_html5){
			totalTime = Math.floor(_a.player.duration * 1000) / 1000;
			try { bufferedTime = (Math.floor(_a.player.buffered.end(0) * 1000) / 1000) || 0; } catch (e) {}
		}
		var percent = (bufferedTime/totalTime)*100;
		_a.command('load_progress', {p: percent});
	},
	progressDown: function(e1, id){
		var _a = audio_player, el = typeof id == 'string' ? _a.players[id].prbl : id, left = $(el).offset().left, w = $(el).width(), percent;
		function Move(e){
			e.preventDefault();
			var l = Math.min(Math.max(0, e.pageX-left-1), w), p = (l/w)*100;
			percent = p;
			for(var i in _a.players) $(_a.players[i].pr).css('width', p+'%');
			$('#player'+_a.fullID+' #playerPlayLine').css('width', p+'%');
		}
		function Up(){
			$(window).unbind('mousemove', Move).unbind('mouseup', Up);
			var time = (_a.time*percent)/100;
			_a.setTime(time);
			_a.pr_click = false;
			if(typeof id == 'string') $(_a.players[id].slider).hide();
		}
		_a.pr_click = true;
		Move(e1);
		if(typeof id == 'string') $(_a.players[id].slider).show();
		$(window).bind('mousemove', Move).bind('mouseup', Up);
	},
	progressMove: function(e, id){
		var _a = audio_player, el = _a.players[id].prbl, left = $(el).offset().left, w = $(el).width(), l = Math.min(Math.max(0, e.pageX-left-1), w), p = (l/w)*100, time = (_a.time*p)/100;
		$(_a.players[id].timeBl).css('left', p+'%').show();
		var s = parseInt(time % 60), m = parseInt((time / 60) % 60);
		if(s < 10) s = '0'+s;
		$(_a.players[id].timeBl).children('.audioTAP_strlka').html(m+':'+s);
	},
	setTime: function(time){
		var _a = audio_player;
		if(_a.is_html5){
			_a.player.currentTime = time;
			if(!_a.pause) _a.player.play();
		}else{
			_a.player.playAudio(time);
			if(_a.pause) _a.player.pauseAudio();
		}
	},
	updateTime: function(cur, len){
		var _a = audio_player;
		if(_a.preloadUrl) return;
		_a.curTime = cur;
		var cur_time = _a.timeDir ? cur : (len - cur);
		var s = parseInt(cur_time % 60), m = parseInt((cur_time / 60) % 60);
		if(s < 10) s = '0'+s;
		var resTime = (_a.timeDir ? '' : '-')+m+':'+s;
		_a.command('update_time', {time: resTime});
	},
	backTime: function(id, time){
		var _a = audio_player, s = parseInt(time % 60), m = parseInt((time / 60) % 60);
		$('#audio_time_'+id+', #audio_time_'+_a.fullID+'_pad').html(m+':'+s);
	},
	compilePlayList: function(type){
		var _a = audio_player;
		_a.curPL = type;
		if(_a.aInfo[8] == 'page'){
			_a.startLoadPL = true;
			if(type == 'search'){
				var start = false, cnt = 0, res = [];
				$('#search_result .audioPage').each(function(){
					var aid = $(this).attr('id').replace('audio_', ''), adata = aid.split('_');
					if(adata[0] == _a.aID){
						start = 1;
						res.push(_a.aInfo);
						cnt++
					}else{
						if(start){
							if(cnt < 60){
								var url = $('#audio_url_'+aid).val().split(',');
								var inf = [adata[1], adata[0], url[0], $('#audio_'+aid+' #artist').html(), $('#audio_'+aid+' #name').html(), url[1], $('#audio_time_'+aid).text(), 'search', url[2]];
								res.push(inf);
								cnt++
							}else return;
						}
					}
				});
				_a.playlist = {data: res, name: aud_14};
				_a.currentPos = 0;
				window.cur.audios = _a.playlist;
				_a.startLoadPL = false;
			}else if(type == 'attach'){
				_a.playlist = {data: [_a.aInfo], name: ''};
				_a.currentPos = 0;
				_a.startLoadPL = false;
			}else if(type == 'wall'){
				var res = [], cur = 0, cnt = 0;
				$('#audio_'+_a.fullID).parent().children('.audioPage').each(function(){
					var aid = this.id.replace('audio_', ''), adata = aid.split('_');
					if(aid == _a.fullID) cur = cnt;
					cnt++;
					var url = $('#audio_url_'+aid).val().split(',');
					res.push([adata[1], adata[0], url[0], $('#audio_'+aid+' #artist').html(), $('#audio_'+aid+' #name').html(), url[1], $('#audio_time_'+aid).text(), 'wall', url[2]]);
				});
				_a.currentPos = 0;
				_a.startLoadPL = false;
				_a.playlist = {data: res, name: ''};
			}else{
				$post('/audio?act=load_play_list', {data: _a.fullID}, function(d){
					d = JSON.parse(d);
					d.playList.unshift(_a.aInfo);
					_a.playlist = {data: d.playList, name: d.pname};
					_a.currentPos = 0;
					_a.startLoadPL = false;
				});
			}
		}else if(_a.playLists[type]){
			var pl = _a.playLists[type].data, cnt = 0;
			_a.playlist = {data: [], name: _a.playLists[type].pname};
			for(var i in pl) {
				var id = pl[i][1]+'_'+pl[i][0]+(pl[i][7] ? '_'+pl[i][7] : '');
				if(id == _a.fullID) _a.currentPos = cnt;
				_a.playlist.data.push(pl[i]);
				cnt++;
			}
			_a.startLoadPL = false;
			window.cur.audios = _a.playlist;
		}
	},
	nextTrack: function(){
		var _a = audio_player;
		if(_a.startLoadPL){
			_a.errorPL();
			return;
		}
		var nid = _a.currentPos+1;
		if(!_a.playlist.data[nid]) nid = 0;
		_a.playToPlayList(nid);
	},
	prevTrack: function(){
		var _a = audio_player;
		if(_a.startLoadPL){
			_a.errorPL();
			return;
		}
		var nid = _a.currentPos-1;
		if(!_a.playlist.data[nid]) nid = _a.playlist.data.length-1;
		_a.playToPlayList(nid);
	},
	playToPlayList: function(i){
		var _a = audio_player;
		if(_a.fullID) {
			$('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').removeClass('play').removeClass('pause').removeClass('preactiv');
			_a.backTime(_a.fullID, _a.time);
		}
		$('.audioPlayer').hide();
		_a.currentPos = i;
		_a.aID = _a.playlist.data[i][1];
		_a.aOwner = _a.playlist.data[i][0];
		_a.aType = _a.playlist.data[i][7] ? _a.playlist.data[i][7] : '';
		_a.fullID = _a.aID+'_'+_a.aOwner+(_a.playlist.data[i][7] ? '_'+_a.playlist.data[i][7] : '');
		_a.aInfo = [_a.aOwner, _a.aID, _a.playlist.data[i][2], _a.playlist.data[i][3], _a.playlist.data[i][4], _a.playlist.data[i][5], _a.playlist.data[i][6], _a.aType, _a.playlist.data[i][7]];
		_a.time = _a.playlist.data[i][5];
		$('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').addClass('play');
		_a.play = true;
		_a.cplay = false;
		_a.command('play', {style_only: true});
		_a.curTime = 0;
		if(_a.is_html5) {
			_a.player.src = _a.aInfo[2];
			audio_player.player.load();
		}else {
			_a.player.loadAudio(_a.aInfo[2]);
			_a.pause = false;
		}
		_a.command('set_info');
		if(_a.aInfo[8] != 'page' && _a.aInfo[7] != 'wall') _a.scrollToAudio();
		_a.check_add();
	},
	scrollToAudio: function(){
		var _a = audio_player;
		if($('#audio_'+_a.fullID).size()){
			var top = $('#audio_'+_a.fullID).offset().top, h = ($(window).height()/2), r = top-h;
			$('body').animate({scrollTop: r}, 200);
		}
	},
	volumeDown: function(e1, elem){
		var _a = audio_player, el = elem ? elem : this, left = $(el).offset().left, w = $(el).width(), pbl = $(el).children('.audioTimesAP'), pblstr = $(pbl).children('.audioTAP_strlka'), vol;
		pbl = $(pbl);
		function Move(e){
			e.preventDefault();
			var l = Math.min(Math.max(0, e.pageX-left-1), w), p = (l/w)*100;
			for(var i in _a.players) $(_a.players[i].volume_line).css('width', p+'%');
			$('#player'+_a.fullID+' #playerVolumeBar').css('width', p+'%');
			var str = Math.round(p);
			vol = p/100;
			_a.vol = vol;
			if(_a.is_html5) _a.player.volume = vol;
			else _a.player.setVolume(vol);
			var l1 = (p*w)/100-(pblstr.width()/2)-6+(elem ? 17 : 0);
			pbl.css('left', l1+'px');
			pblstr.html(str+'%');
		}
		function Up(){
			$(window).unbind('mousemove', Move).unbind('mouseup', Up);
			pbl.hide();
			var d = new Date(),  date = d.getDate()+5, month = d.getMonth(), year = d.getFullYear();
			set_cookie('audioVol', vol, year, month, date);
		}
		pbl.show();
		$(window).bind('mousemove', Move).bind('mouseup', Up);
		Move(e1);
	},
	playerPrMove: function(e, el){
		var _a = audio_player;
		_a.mouseoverProgress = true;
		var elem = $(el), pos = e.clientX, w = elem.width(), left = elem.offset().left;
		pos = pos - left;
		var val = (pos / w) * 100;
		var curTime = val / 100 * _a.time, prTP = elem.children('.audioTimesAP'), prTPtext = prTP.children('.audioTAP_strlka');
		$('.audioTimesAP').hide();
		var s = parseInt(curTime % 60), m = parseInt((curTime / 60) % 60);
		if(s < 10) s = '0'+s;
		prTPtext.html(m+':'+s);
		var left = val/100*w;
		prTP.css('left', (left-(prTPtext.width()/2))+'px').show();
	},
	playerPrOut: function(){
		var _a = audio_player;
		_a.mouseoverProgress = false;
		$('.audioTimesAP').hide();
	},
	//pad
	initedPad: false,
	initedMP: false,
	initMP: function(){
		var _a = audio_player;
		if(!_a.initedMP){
			_a.initedMP = true;
			var content = '<div class="min_player_names"><span id="minPlayerArtist"></span> – <span id="minPlayerName"></span></div>\
			<div class="cButs"><div class="nextPrevBtn icon-fast-bw" id="no_play" onClick="audio_player.prevTrack();"></div>\
			<div class="playBtn icon-pause" id="no_play" onClick="audio_player.play_pause()"></div>\
			<div class="nextPrevBtn icon-fast-fw" id="no_play" onClick="audio_player.nextTrack();"></div><div class="clear"></div></div>';
			$('#audioMP').html(content).attr('onClick', 'audio_player.showPad(event)');
		}
		$('#audioMP').addClass('show');
		if(_a.aInfo){
			$('#minPlayerArtist').html(_a.aInfo[3]);
			$('#minPlayerName').html(_a.aInfo[4]);
		}
	},
	showPad: function(e){
		var _a = audio_player;
		if(e && e.target.id == 'no_play') return;
		if(!_a.initedPad){
			_a.initedPad = true;
			var content = '<div class="audio_head">\
				<div class="bigPlay_but icon-play-1" id="pad_play"></div>\
				<div class="prevision icon-fast-bw" id="pad_prev"></div>\
				<div class="prevision next icon-fast-fw" id="pad_next"></div>\
				<div class="fl_l" style="width:268px;margin-left: 14px;margin-top: 2px;" id="pad_cont_progress">\
					<div>\
						<div class="names fl_l" id="pad_names"></div>\
						<div class="fl_r time" id="pad_time">0:00</div>\
						<div class="clear"></div>\
					</div>\
					<div class="audio_progres_bl" id="pad_progress_bl">\
						<div class="bg"></div>\
						<div class="play" id="pad_play_line"><div class="slider" id="pad_slider"></div></div>\
						<div class="load" id="pad_load_line"></div>\
						<div class="audioTimesAP" id="pad_time_bl"><div class="audioTAP_strlka">3:00</div></div>\
					</div>\
				</div>\
				<div class="volume_bar" id="pad_volume">\
					<div class="volume_bg"></div>\
					<div class="volume_line" id="pad_volume_line"><div class="slider"></div></div>\
					<div class="audioTimesAP"><div class="audioTAP_strlka">3:00</div></div>\
				</div>\
				<div class="fl_l plcontols_buts">\
					<li class="icon-plus-6" id="pad_add" onmouseover="titleHtml({text: \''+aud_26+'\', id: this.id, top: 29, left: 12})"></li>\
					<li class="icon-loop-1" id="pad_loop" onmouseover="titleHtml({text: \''+aud_27+'\', id: this.id, top: 29, left: 12})"></li>\
					<li class="icon-shuffle-2" id="pad_shuffle" onmouseover="titleHtml({text: \''+aud_28+'\', id: this.id, top: 29, left: 12})"></li>\
					<div class="clear"></div>\
				</div>\
			</div><div style="position:relative;"><div class="rightStrelka"></div></div>\
			<div class="audios_scroll_bl">\
				<div class="audios_scroll" onmouseover="$(this).addClass(\'audios_scroll_hover\');" onmouseout="$(this).removeClass(\'audios_scroll_hover\');" onmousedown="audio_player.downScroll(event, 1);"><div class="audios_scroll_slider" onmousedown="audio_player.downScroll(event);" onmouseover="$(this).addClass(\'audios_scroll_slider_hover\');" onmouseout="$(this).removeClass(\'audios_scroll_slider_hover\');"></div></div>\
				<div id="audios_scroll_cont"><div id="audioPadRes"></div></div>\
			</div>\
			<div class="padFooter">\
				<div class="plName fl_l"></div>\
				<div class="button_div fl_r">\
				<button  style="margin-right: 5px;margin-top: 2px;" onClick="audio_player.showPad();">'+lang_msg_close+'</button>\
				</div>\
				<div class="audio_resize_but"><div></div><div></div><div></div></div>\
				<div class="clear"></div>\
			</div>';
			$('#audioPad').html(content);

			var data = {
				id: 'pad',
				play_but: $('#pad_play'),
				names: $('#pad_names'),
				pr: $('#pad_play_line'),
				load: $('#pad_load_line'),
				prbl: $('#pad_progress_bl'),
				slider: $('#pad_slider'),
				timeBl: $('#pad_time_bl'),
				time: $('#pad_time'),
				prev: $('#pad_prev'),
				next: $('#pad_next'),
				volume: $('#pad_volume'),
				volume_line: $('#pad_volume_line'),
				loop: $('#pad_loop'),
				shuffle: $('#pad_shuffle'),
				add: $('#pad_add')
			};
			_a.addPlayer(data);
			$('.audios_scroll_bl').bind('mousewheel', function(e){
				e.preventDefault();
				var el = $('#audios_scroll_cont'), ph = $(this).height(), h = el.height();
				if(h > ph){
					removeTimer('im_scroll_anim');
					var delta = e.deltaY, direct = delta / Math.abs(delta), top = parseInt(el.css('top'));
					if(direct == 1) {
						var dh = -(h-ph);
						var res = Math.max(dh, (top-40));
						el.css('top', res+'px');
						if(res > dh) $('.audios_scroll_slider').addClass('audios_scroll_slider_hover');
					}else{
						var res = Math.min((top+40), 0);
						el.css('top', res+'px');
						if(res < 0) $('.audios_scroll_slider').addClass('audios_scroll_slider_hover');
					}
					var p = (top/h)*100;
					p = Math.min(0, p);
					p = Math.max(-100, p);
					$('.audios_scroll_slider').css('top', (-p)+'%');
					addTimer('im_scroll_anim', function(){ $('.audios_scroll_slider').removeClass('audios_scroll_slider_hover'); }, 300);
				}
			});
			_a.checkScroll();
			var _s = _a;
			$('.audio_resize_but').bind('mousedown', function(){
				var bl1 = $('#audioPad'), bl2 = $('.audios_scroll_bl'), max = Math.min(window.innerHeight-144, $('#audios_scroll_cont').height()), st = window.pageYOffset;
				function Move(e){
					e.preventDefault();
					var h = Math.max(Math.min(e.pageY-(143+st), max), 53);
					bl2.css('height', h+'px');
					bl1.css('height', (h+93)+'px');
				}
				function Up(){
					$(window).unbind('mousemove', Move).unbind('mouseup', Up);
					audio_player.checkScroll();
					var d = new Date(),  date = d.getDate()+5, month = d.getMonth(), year = d.getFullYear();
					set_cookie('padsHeight', $('.audios_scroll_bl').height(), year, month, date);
				}
				$(window).bind('mousemove', Move).bind('mouseup', Up);
			});
			setTimeout(function(){
				var bh = parseInt(get_cookie('padsHeight'));
				if(bh < 53) bh = 300;
				bh = Math.min($('#audios_scroll_cont').height(), bh, $(window).height()-144);
				$('.audios_scroll_bl').css('height', bh+'px');
				$('#audioPad').css('height', (bh+93)+'px');
			}, 10);
		}
		if($('#audioPad').hasClass('show')) {
			$('#audioPad').css('top', -($('#audioPad').height()+70)+'px').removeClass('show');
			$('#audioMP').removeClass('active');
		}else{
			var left = $('#audioMP').offset().left;
			$('#audioPad').css('left', (left-181)+'px').css('top', '50px').addClass('show');
			$('#audioMP').addClass('active');
			var pl = _a.playlist.data, res = '';
			for(var i = 0; i < pl.length; i++) res += _a.compile_audio(pl[i]);
			$('#audioPadRes').html(res);
			$('.plName').html(_a.playlist.name);
			if(_a.pause) $('#audio_'+_a.fullID+', #audio_'+_a.fullID+'_pad').addClass('preactiv');
			else _a.command('play', {style_only: true});
			setTimeout(function(){
				var bh = parseInt(get_cookie('padsHeight'));
				if(bh < 53) bh = 300;
				bh = Math.min($('#audios_scroll_cont').height(), bh, $(window).height()-144);
				$('.audios_scroll_bl').css('height', bh+'px');
				$('#audioPad').css('height', (bh+93)+'px');
			}, 10);
			if($('#pad_add').css('display') == 'none') $('#pad_cont_progress').css('width', '268px');
			else $('#pad_cont_progress').css('width', '245px');
		}
	},
	checkScroll: function(){
		var proc = ($('.audios_scroll_bl').height()/$('#audios_scroll_cont').height())*100;
		$('.audios_scroll_slider').css('height', (proc)+'%');
		if(proc >= 100) {
			$('.audios_scroll').hide();
			$('#audios_scroll_cont').css('top', 0);
		}else  $('.audios_scroll').show().removeClass('audios_scroll_hover');
	},
	downScroll: function(e2, delta){
		if(delta && $(e2.target).filter('.audios_scroll_slider').length != 0) return;
		var el = $('.audios_scroll_slider'), pb = el.parent().parent(), top = pb.offset().top, h = pb.height(), bl = pb.children('div').last(), pb2 = el.parent();
		$(window).bind('mousemove', Move);
		$(window).bind('mouseup', Up);
		var startY = delta? (el.height()/2) : e2.pageY-el.offset().top;
		if(delta) Move(e2);
		function Move(e){
			e.preventDefault();
			pb2.addClass('audios_scroll_hover');
			el.addClass('audios_scroll_slider_hover');
			var py = e.pageY-top-startY, pos = Math.max(py, 0), p = (pos/h)*100, h1 = bl.height(), dh = h1-h;
			var res = p*h1/100;
			res = Math.min(dh, res);
			bl.css('top', '-'+res+'px');
			var p1 = (-res/h1)*100;
			p1 = Math.min(0, p1);
			p1 = Math.max(-100, p1);
			$('.audios_scroll_slider').css('top', (-p1)+'%');
		}
		function Up(e1){
			$(window).unbind('mousemove', Move);
			$(window).unbind('mouseup', Up);
			if($(e1.target).filter('.audios_scroll, .audios_scroll_slider').length != 0) return;
			pb2.removeClass('audios_scroll_hover');
			el.removeClass('audios_scroll_slider_hover');
		}
	},
	compile_audio: function(d){
		var full_id = d[1]+'_'+d[0]+'_'+d[7]+'_pad';
		if(d[7] == 'audios'+CMS.user_id) var add = '', hclass = 'no_tools';
		else var add = '<li class="icon-plus-6 '+hclass+'" onclick="audio.add(\''+full_id+'\')" id="add_tt_'+full_id+'" onmouseover="titleHtml({text: \''+aud_29+'\', id: this.id, top: 29, left: 12})"></li>', hclass = '';

		return '<div class="audio '+hclass+'" id="audio_'+full_id+'" onclick="playNewAudio(\''+full_id+'\', event);">\
			<div class="audio_cont">\
				<div class="play_btn icon-play-4"></div>\
				<div class="name"><span id="artist">'+d[3]+'</span> – <span id="name">'+d[4]+'</span></div>\
				<div class="fl_r">\
					<div class="time" id="audio_time_'+full_id+'">'+d[6]+'</div>\
					<div class="tools">'+add+'\
						<div class="clear"></div>\
					</div>\
				</div>\
				<input type="hidden" value="'+d[2]+','+d[5]+',pad" id="audio_url_'+full_id+'"/>\
				<div class="clear"></div>\
			</div>\
			<div id="audio_text_res"></div>\
		</div>';
		return '<div class="audio '+hclass+'" id="audio_'+full_id+'" onclick="playNewAudio(\''+full_id+'\', event);">\
			<div class="play_btn icon-play-4"></div>\
			<div class="name"><span id="artist">'+d[3]+'</span> – <span id="name">'+d[4]+'</span></div>\
			<div class="fl_r">\
				<div class="time" id="audio_time_'+full_id+'">'+d[6]+'</div>\
				<div class="tools">'+add+'\
					<div class="clear"></div>\
				</div>\
			</div>\
			<input type="hidden" value="'+d[2]+','+d[5]+',pad" id="audio_url_'+full_id+'"/>\
			<div class="clear"></div>\
		</div>';
	},
	added: {},
	check_add: function(){
		var _a = audio_player, type = _a.fullID.split('_');
		if(type[2] == 'public'){
			if(!_a.added[_a.aID]) _a.command('show_add', {added: false});
			else if(_a.added[_a.aID]) _a.command('show_add', {added: true});
		}else{
			if(_a.aOwner != CMS.user_id && !_a.added[_a.aID]) _a.command('show_add', {added: false});
			else if(_a.aOwner != CMS.user_id && _a.added[_a.aID]) _a.command('show_add', {added: true});
			else _a.command('hide_add');
		}
	},
	addAudio: function(){
		var _a = audio_player;
		if(_a.added[_a.aID]) return;
		_a.added[_a.aID] = true;
		$('#audio_'+_a.fullID+' .tools, #audio_'+_a.fullID+'_pad .tools').html('<li class="icon-ok-3" style="padding-top: 2px;font-size: 16px;"></li><div class="clear"></div>');
		$post('/audio?act=add', {id: _a.aID});
		$('.titleHtml').remove();
	},
	get_text: function(id, el){
		if(el && !$(el).hasClass('text_avilable')) return;
		var tbl = $('#audio_'+id+' #audio_text_res');
		if(tbl.hasClass('opened')) tbl.removeClass('opened');
		else{
			tbl.addClass('opened');
			var html = tbl.html();
			if(html.length == 0){
				tbl.html('<div style="padding:20px 0;text-align:center;"><img src="/templates/Default/images/loading.gif"></div>');
				$post('/audio?act=get_text', {id: id}, function(d){
					tbl.html(d);
				});
			}
		}
	}
};
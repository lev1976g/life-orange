var audio = {
	user_id: 0,
	a_user_fid: 0,
	init: function(d){
		$.extend(d, {
			play_but: $('#pl_play'),
			names: $('#pl_names'),
			pr: $('#pl_play_line'),
			load: $('#pl_load_line'),
			prbl: $('#pl_progress_bl'),
			slider: $('#pl_slider'),
			timeBl: $('#pl_time_bl'),
			time: $('#pl_time'),
			prev: $('#pl_prev'),
			next: $('#pl_next'),
			volume: $('#pl_volume'),
			volume_line: $('#pl_volume_line'),
			loop: $('#pl_loop'),
			shuffle: $('#pl_shuffle'),
			add: $('#pl_add')
		});
		audio_player.addPlayer(d);
		$(window).scroll(function(){
			if(!audio.start_load && $(window).scrollTop()+$(window).height() >= $(document).height()){
				if(audio.moreSaerch) audio.loadMoreSearch();
				else audio.loadMore();
			}
		});
	},	addBox: function(){
		Box.Close();
		Box.Show('addaudio', 510, lang_audio_add, '<div class="videos_pad"><div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:22px;margin-bottom:20px;margin-top:-5px"><div class="buttonsprofileSec cursor_pointer"><a><div><b>'+lang_77+'</b></div></a></div><a class="cursor_pointer" onClick="audio.addBoxComp()"><div><b>'+lang_78+'</b></div></a></div><div class="videos_text">'+lang_79+'</div><input type="text" class="videos_input" id="audio_lnk" style="margin-top:5px" /><span id="vi_info">'+lang_80+' <b>http://music.com/uploads/files/audio/2012/faxo_-_kalp.mp3</b></span></div>', lang_box_canсel, lang_album_create, 'audio.send()', 0, 0, 1, 1);
		$('#audio_lnk').focus();
	},
	addBoxComp: function(){
		Box.Close();
		Box.Show('addaudio_comp', 510, lang_audio_add, '<div class="videos_pad"><div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:22px;margin-bottom:20px;margin-top:-5px"><a onClick="audio.addBox()" class="cursor_pointer"><div><b>'+lang_81+'</b></div></a><div class="buttonsprofileSec cursor_pointer"><a><div><b>'+lang_78+'</b></div></a></div></div><div class="videos_text">'+lang_82+'<div class="clear"></div><li style="font-weight:normal;color:#000;font-size:11px;margin-top:10px">'+lang_83+'</li><li style="font-weight:normal;color:#000;font-size:11px;margin-bottom:15px">'+lang_84+'</li><div class="button_div fl_l" style="margin-left:170px"><button id="upload">'+lang_85+'</button></div><div class="clear"></div><div style="margin-top:15px;font-size:11px;color:#000;font-weight:normal">'+lang_86+'<a href="/?go=search&type=5"><b>'+lang_87+'</b></a></div></div></div>', lang_box_canсel, lang_album_create, 'audio.send()', 0, 0, 1, 1);
		$('#audio_lnk').focus();
		$('#box_but').hide();
		Xajax = new AjaxUpload('upload', {
			action: '/index.php?go=audio&act=upload',
			name: 'uploadfile',
			onSubmit: function (file, ext){
				if(!(ext && /^(mp3)$/.test(ext))){
					Box.Info('load_photo_er', lang_dd2f_no, lang_88, 250);
					return false;
				}
				butloading('upload', '73', 'disabled', '');
			},
			onComplete: function (file, data){
				butloading('upload', '73', 'enabled', lang_85);
				if(data == 1)
					Box.Info('load_photo_er', lang_dd2f_no, lang_89, 250);
				else {
					Box.Close();
					var uid = $('#is_user_id').val();
				  player.myplaylist(uid);
	Page.Loading('stop');
				}
			}
		});
	},
	send: function(){
		var lnk = $('#audio_lnk').val();
		if(lnk != 0){
			$('#box_loading').show();
			ge('box_butt_create').disabled = true;
			$.post('/index.php?go=audio&act=send', {lnk: lnk}, function(d){
				if(d){
					addAllErr(lang_audio_err);
					ge('box_butt_create').disabled = false;
				} else {
					Box.Close();
					Page.Go('/audio');
				}
				$('#box_loading').hide();
			});
		} else
			setErrorInputMsg('audio_lnk');
	},
	change_tab: function(type){
		$('#search_tab').hide();
		$('#search_preloader').show();
		$('.audio_menu li').removeClass('active');
		$('#friendBlockMain li').removeClass('audioFrActive');
		$('#'+type).addClass('active');
		var url = '/audio?type='+type;
		history.pushState({link: url}, null, url);
		this.load_page = 1;
		this.start_load = false;
		audio.tabType = type;
		$('#search_audio_val').val('');
		this.moreSaerch = false;
		if(type == 'my_music' && CMS.user_id == audio.user_id && audio.loaded_len > 0){
			$('#search_preloader').hide();
			var text = CMS.user_id == audio.user_id ? 'У вас' : 'У '+audio.uname;
			$('#atitle').html('<div class="audio_page_title">'+text+'</div>');
			var len = Math.min(40, audio.loaded_len), result = '', tpl, res = audio.audiosRes;
			for(var i = 0; i < len; i++){
				tpl = str_replace(['{id}', '{uid}', '{plname}', '{artist}', '{name}', '{stime}', '{time}', '{url}', '{is_text}'], [res[i][1], res[i][0], res[i][7], res[i][3], res[i][4], res[i][6], res[i][5], res[i][2], res[i][9] ? 'text_avilable' : ''], audio.tpl_audio);
				tpl = tpl.replace(/\[tools\](.*?)\[\/tools\]/gim, CMS.user_id == audio.user_id ? '$1' : '');
				tpl = tpl.replace(/\[add\](.*?)\[\/add\]/gim, CMS.user_id == audio.user_id ? '' : '$1');
				result += tpl;
			}
			$('#audios_res').html(result);
			var _a = audio_player;
			_a.playLists = {};
			_a.playLists['audios'+CMS.user_id] = {
				data: res,
				pname: 'Сейчас играют аудиозаписи '+audio.uname+' | ',
			};
		}else{
			$.post(url, {doload: 1}, function(d){
				$('#search_preloader').hide();
				d = JSON.parse(d);
				$('#atitle').html(d.title);
				$('#audios_res').html(d.result);
				$('#load_but').html(d.but);
				var _a = audio_player;
				_a.playLists = {};
				var type = audio.tabType == 'my_music' ? 'audios'+CMS.user_id : audio.tabType;
				_a.playLists[type] = {
					data: [],
					pname: d.pname
				};
				for(var i in d.playList) _a.playLists[type].data.push(d.playList[i]);
				if(_a.pause) $('#audio_'+_a.fullID).addClass('preactiv');
				else _a.command('play', {style_only: true});
				audio.loadAll(CMS.user_id, 0);
			});
		}
		audio.user_id = CMS.user_id;
		audio.uname = CMS.name;
	},
	load_page: 1,
	start_load: false,
	loadMore: function(){
		if(this.start_load) return;
		this.start_load = true;
		if(!audio.searchResult) audio.searchResult = {cnt: audio.loaded_len, data: audio.audiosRes};
		var offset = audio.load_page*40, len = Math.min(audio.searchResult.cnt, offset+40), result = '', res = audio.searchResult.data;
		for(var i = offset; i < len; i++){
			tpl = str_replace(['{id}', '{uid}', '{plname}', '{artist}', '{name}', '{stime}', '{time}', '{url}', '{is_text}'], [res[i][1], res[i][0], res[i][7], res[i][3], res[i][4], res[i][6], res[i][5], res[i][2], res[i][9] ? 'text_avilable' : ''], audio.tpl_audio);
			tpl = tpl.replace(/\[tools\](.*?)\[\/tools\]/gim, CMS.user_id == audio.user_id ? '$1' : '');
			tpl = tpl.replace(/\[add\](.*?)\[\/add\]/gim, CMS.user_id == audio.user_id ? '' : '$1');
			result += tpl;
		}
		$('#audios_res').append(result);
		audio.load_page++;
		if(result) audio.start_load = false;
		else $('#audio_more_but').remove();
	},
	moreSaerch: false,
	search: function(val){
		audio.searchClient(val);
	},
	loadMoreSearch: function(){
		if(this.start_load) return;
		this.start_load = true;
		$('#audio_more_but').html('<img src="/templates/Default/images/loading.gif"/>');
		var q = $('#search_audio_val').val();
		$.post('/audio?act=search_all', {doload: 1, page: this.load_page, q: q, more: 1}, function(d){
			audio.load_page++;
			d = JSON.parse(d);
			if(d.search){
				audio.start_load = false;
				$('#audios_res').append(d.search);
				$('#audio_more_but').html(lang_smosh);
				var _a = audio_player, type = _a.aInfo[7];
				for(var i = 0; i < d.audios; i++){
					if(type == 'search') cur.audios.data.push(d.audios[i]);
					_a.playLists['search'].data.push(d.audios[i]);
				}
				_a.playList.data = cur.audios;
			}else $('#audio_more_but').remove();
		});
	},
	edit_box: function(id){
		Page.PL('start');
		$('.titleHtml').remove();
		var aid = id.split('_');
		aid = aid[0];
		$.post('/audio?act=get_info', {id: aid}, function(d){
			d = JSON.parse(d);
			Page.PL('stop');
			if(d.error) addAllErr(lang_bad_err);
			else {
				var content = '<div style="padding: 15px;background: #EEF0F2;">\
					<div class="audioEditDescr">'+aud_19+':</div><input type="text" class="audioEditInput" id="audio_artist" value="'+d.artist+'"/><div class="clear"></div>\
					<div class="audioEditDescr">'+lang_50+':</div><input type="text" class="audioEditInput" id="audio_name" value="'+d.name+'"/><div class="clear"></div>\
					<a href="/" class="audio_edit_more_btn" onClick="audio.showMoreSettings(this); return false;">Дополнительно</a>\
					<div id="audio_edit_more" class="no_display">\
						<div class="audioEditDescr">'+aud_20+':</div><div id="audio_genre" style="width: 281px;" class="CMSSelector fl_l"></div><div class="clear"></div><br/>\
						<div class="audioEditDescr">Текст:</div><textarea class="audioEditInput" id="audio_text">'+(d.text ? str_replace(['<br>','<br />'], ['\n', '\n'], d.text) : '')+'</textarea><div class="clear"></div>\
					</div>\
					<div class="audioEditDescr">&nbsp;</div><button onClick="audio.save_audio(\''+id+'\', '+aid+')" id="saveabutton" class="button fl_l">'+lang_box_save+'</button><div class="clear"></div>\
				</div>\
				<style>#audio_genre .CMSSelectorTop{padding: 10px 10px}#audio_genre li{padding: 6px 10px}</style>';
				Box.Open({id: 'audio_edit', title: aud_7, data: content, width: 440});
				cur.selects = {};
				cur.selects['audio_genre'] = new Selector({id: 'audio_genre', data: d.genres, def: d.genre});
			}
		});
	},
	showMoreSettings: function(el){
		$(el).remove();
		$('#audio_edit_more').show();
	},
	save_audio: function(id, aid){
		var artist = $('#audio_artist').val(), name = $('#audio_name').val(), genre = $('#audio_genre').val(), text = $('#audio_text').val();
		if(!artist){
			setErrorInputMsg('audio_artist');
			return;
		}
		if(!name){
			setErrorInputMsg('audio_name');
			return;
		}
		$('#saveabutton').html('<img src="/templates/Default/images/loading.gif"/>').attr('onClick', '');
		$.post('/audio?act=save_edit', {id: aid, genre: genre, artist: artist, name: name, text: text}, function(){
			Box.Clos('audio_edit');
			$('#audio_'+id+' #artist').html(artist);
			$('#audio_'+id+' #name').html(name);
		});
	},
	delete_box: function(id){
		$('.titleHtml').remove();
		var aid = id.split('_');
		aid = aid[0];
		Box.Open({
			id: 'del',
			title: aud_8,
			width: 400,
			data: '<div style="padding: 15px">'+aud_21+'</div>',
			bottom: 1,
			suc_text: aud_22,
			success: 1,
			suc_js: 'audio.start_delete(\''+id+'\', '+aid+')',
			clos_text: lang_box_canсel
		});
	},
	start_delete: function(id, aid){
		$('#box_del .button_div_gray').remove();
		$('#box_del .button_div').html('<img src="/templates/Default/images/loading.gif"/>');
		$.post('/audio?act=del_audio', {id: aid}, function(d){
			if(d == 'error') addAllErr(lang_bad_err);
			else Page.Go('/audio');
		});
	},
	uploadBox: function(){
		$('.titleHtml').remove();
		stManager._add(['al/upload.js', 'al/upload.css'], function(){
			Page.PL('start');
			$.post('/audio?act=upload_box', function(d){
				Page.PL('stop');
				Box.Open({id: 'upload', title: lang_audio_add, data: d, width: 450});
				Upload.Init({
					id: 'audio',
					hide: 0,
					over_block: '#audio_upload',
					types: ['mp3'],
					onStart: audio.startUpload1,
					onProgress: audio.onProgressUpload,
					url: '/audio?act=upload',
					onComplete: audio.onLoadComplete,
					max_files: 10,
					onUploaded: audio.updateCountUpload
				});
			});
		});
	},
	startUpload1: function(){
		$('#audioUploadBut, #audio_upload').hide();
		$('.progressAudioLoad').show();
	},
	onProgressUpload: function(p){
		$('.progressLine').css('width', p+'%');
		$('.progressPercent').html(parseInt(p)+'%');
	},
	onLoadComplete: function(){
		$('#audio_up_box').html('<div style="padding: 20px;">'+lang_suc+'</div>');
		console.log('complete');
		window.setTimeout(function(){
			Page.Go('/audio');
		}, 2000);
	},
	updateCountUpload: function(cur, len){
		var str=str_replace(['{cur}', '{len}'],[cur, len], aud_23);
		$('#box_upload #btitle').html(str);
	},
	add: function(id){
		$('.titleHtml').remove();
		var aid = id.split('_');
		aid = aid[0];
		id = id.replace('_pad', '');
		$('#audio_'+id+' .tools, #audio_'+id+'_pad .tools').html('<li class="icon-ok-3" style="padding-top: 2px;font-size: 16px;"></li><div class="clear"></div>');
		$.post('/audio?act=add', {id: aid});
	},
	loaded_len: 0,
	searchResult: 0,
	loadAll: function(uid, page){
		$.post('/audio'+uid+'?act=load_all', {page: page}, function(d){
			d = JSON.parse(d);
			page++;
			if(d.loaded == 1){
				audio.audiosRes = d.res;
				audio.loaded_len = d.res.length;
				audio.searchResult = {data: d.res, cnt: audio.loaded_len};
			}else audio.loadAll(uid, page);
		});
	},
	searchClient: function(val){
		if(val){
			var cnt = 0, a, res = [];
			val = String(val).toLowerCase();
			for(var i = 0; i < audio.loaded_len; i++){
				a = audio.audiosRes[i];
				if(String(a[3]).toLowerCase().indexOf(val) != -1 || String(a[4]).toLowerCase().indexOf(val) != -1){
					res.push(a);
					cnt++;
				}
			}
			audio.searchResult = {data: res, cnt: cnt};

			audio_player.playLists['audios'+audio.user_id] = {
				pname: 'Сейчас играют аудиозаписи '+audio.uname+' | ',
				data: res
			};

			$('#atitle').html('');
			$('.audio_menu li').removeClass('active');
			$('#search_tab').show().addClass('active');

			if(cnt > 0){
				var len = Math.min(40, cnt), result = '', tpl;
				for(var i = 0; i < len; i++){
					tpl = str_replace(['{id}', '{uid}', '{plname}', '{artist}', '{name}', '{stime}', '{time}', '{url}', '{is_text}'], [res[i][1], res[i][0], res[i][7], res[i][3], res[i][4], res[i][6], res[i][5], res[i][2], res[i][9] ? 'text_avilable' : ''], audio.tpl_audio);
					tpl = tpl.replace(/\[tools\](.*?)\[\/tools\]/gim, CMS.user_id == audio.user_id ? '$1' : '');
					tpl = tpl.replace(/\[add\](.*?)\[\/add\]/gim, CMS.user_id == audio.user_id ? '' : '$1');
					result += tpl;
				}
				$('#audios_res').html(result);
				if(audio_player.pause) $('#audio_'+audio_player.fullID).addClass('preactiv');
				else audio_player.command('play', {style_only: true});
				if(cnt < 15) audio.searchServer(val);
			}else{
				$('#audios_res').html('');
				audio.searchServer(val);
			}
		}else{
			if(CMS.user_id == audio.user_id) audio.change_tab('my_music');
			$('#search_preloader').hide();
		}
	},
	searchServer: function(val){
		removeTimer('search');
		addTimer('search', function(){
			audio.start_load = false;
			$('#search_preloader').show();
			$.post('/audio?act=search_all', {q: val}, function(d){
				audio.moreSaerch = true;
				d = JSON.parse(d);
				audio_player.playLists['search'] = {
					pname: aud_14,
					data: d.audios
				};
				if(audio.searchResult.cnt > 0){
					if(d.search_cnt > 0){
						$('#audios_res').append('<div class="audio_page_title" style="margin: 15px 0;">'+aud_15+'</div>');
						$('#audios_res').append(d.search);
					}
				}else $('#audios_res').html(d.search);
				if(d.search_cnt > 40) $('#load_but').html('<div class="audioLoadBut" style="margin-top:10px" onClick="audio.loadMoreSearch()" id="audio_more_but">'+lang_smosh+'</div>');
				else $('#load_but').html('');
				$('#search_preloader').hide();
				if(audio_player.pause) $('#audio_'+audio_player.fullID).addClass('preactiv');
				else audio_player.command('play', {style_only: true});
			});
		});
	},
	tpl_audio: '<div class="audio" id="audio_{id}_{uid}_{plname}" onclick="playNewAudio(\'{id}_{uid}_{plname}\', event);">\
		<div class="audio_cont">\
			<div class="play_btn icon-play-4"></div>\
			<div class="name"><span id="artist" onClick="Page.Go(\'/?go=all_search&type=3&q={artist}\')">{artist}</span> – <span id="name" class="{is_text}" onClick="audio_player.get_text(\'{id}_{uid}_{plname}\', this);">{name}</span></div>\
			<div class="fl_r">\
				<div class="time" id="audio_time_{id}_{uid}_{plname}">{stime}</div>\
				<div class="tools">\
					[tools]<li class="icon-pencil-7" onclick="audio.edit_box(\'{id}_{uid}_{plname}\')" id="edit_tt_{id}_{uid}_{plname}" onmouseover="showTooltip(this, {text: \'Редактировать аудиозапись\', shift:[0,7,0]});"></li>\
					<li class="icon-cancel-3" onclick="audio.delete_box(\'{id}_{uid}_{plname}\')" id="del_tt_{id}_{uid}_{plname}" onmouseover="showTooltip(this, {text: \'Удалить аудиозапись\', shift:[0,5,0]});"></li>[/tools]\
					[add]<li class="icon-plus-6" onclick="audio.add(\'{id}_{uid}_{plname}\')" id="add_tt_{id}_{uid}_{plname}" onmouseover="showTooltip(this, {text: \''+aud_29+'\', shift:[0,7,0]});"></li>[/add]\
					<div class="clear"></div>\
				</div>\
			</div>\
			<input type="hidden" value="{url},{time},user_audios" id="audio_url_{id}_{uid}_{plname}"/>\
			<div class="clear"></div>\
		</div>\
		<div id="audio_text_res"></div>\
	</div>'
};
$(function() {
	$.fn.ytVideoGallery = function(options) {
	
		var container = this;
		var playerWidth = options.playerWidth || 618;
		var playerHeight = options.playerHeight || 340;
		var feedUrl = options.feedUrl || null;
		var playerOptions = options.playerOptions || {};
		var html = [];
		var videos = [];
		
		$.getJSON(feedUrl + '?callback=?', 
			{
				v: 	'2',
				alt: 'json-in-script'
			},
			function(data) {
				var entries = data.feed.entry || [];
				
				var extraOptions = '';
				
				$.each(playerOptions, function(k, v) {  
					extraOptions += "&" + k + "=" + v;
				});
				
				for (var i = 0; i < entries.length; i++) {
					videos.push({
						title: entries[i].title.$t,
						url: entries[i].media$group.media$content[0].url + extraOptions,
						thumbnail: entries[i].media$group.media$thumbnail[0].url,
						duration: Math.floor(entries[i].media$group.yt$duration.seconds/60) +':' + entries[i].media$group.yt$duration.seconds % 60
					});
				}
				
				createMarkup();
				loadFirstVideo();
			}
		);
		
		var loadFirstVideo = function(){
			playVideo(videos[0]);
		};
		
		var createMarkup = function() {
/*			html.push('<div class="vid-player"><iframe id="iframe_player" class="youtube-player"' 
					       + 'width="' + playerWidth + '" height="' + playerHeight + '" frameborder="0"></iframe></div> ');
			
			html.push('<div class="yt-video-list"><ul>');*/
			

			$.each(videos, function(i, v){
				html.push('<div class="col-xs-6 col-sm-3 thumb">'
						+ '<a class="fancybox-media thumbnail" href="'+ v.url +'" title="'+ v.title +'">'
						+ '<img class="img-responsive" src="' + v.thumbnail + '" alt="'+ v.title +'" />'
						+ '<div class="play"></div>'
						+ '</a>'
						//+ '<h4>'+ v.title +'</h4>'
						+ '</div>');
			});

			//html.push('</ul></div>');
			
			container.html(html.join(''));
		};
		
		var playVideo = function (vid, autostart) {

			var ifr = $('#iframe_player');
			var autoplay = (autostart) ? '&autoplay=1' : '';
			var url = vid.url + autoplay;
			
			ifr.attr('src', url).load(function(){
				isLoaded(ifr);
			});
		};
		
		var isLoaded = function(who) {
			var ifr = who;
			ifr.fadeIn(1000);
		};
		
		// listener for thumbs
		$(".yt-video-thumb").live('click', function(e){
			e.preventDefault();
			
			index = $(this).attr('ref');
			playVideo(videos[index], true);
		});
	};
});
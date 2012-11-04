(function ($) {

  Drupal.behaviors.mqcristobal_flickr = {
    attach: function (context, settings) {
		if(settings.mqcristobal_flickr.type == 'photoset-primary'){
			photos = settings.mqcristobal_flickr.data;
			$.each(photos, function(index, value){
				$.get('?q=mqcristobal-flickr-albums/' + value.primary,null,function(data){
					//alert(data.data.toSource());
					$('#mqc-flickr-photoset-image-' + value.id).html(data.data);
					$('#mqc-flickr-set-cover-container-' + value.id).trigger('mouseover');
					var tmpTimeout = setTimeout(function(){
						$('#mqc-flickr-set-cover-container-' + value.id).children('.mqc-flickr-photoset-box').fadeOut(500);
					},100);
				},"json");
			});
		}
		
		$('.mqc-flickr-set-cover-container').hover(
			function(){
				if($(this).find('.mqc-flickr-album-primary').html()){
					$(this).prepend('<div class="mqc-flickr-photoset-box">' + $(this).html() + '</div>');
					$('.mqc-flickr-photoset-box').css('opacity',0);
					$('.mqc-flickr-photoset-box').animate(
						{
							opacity:'1'
						},500
					);
				}
			},
			function(){
				$('.mqc-flickr-photoset-box').remove();
			}
		);
	}
  }
})(jQuery);
function initShowHide() {
	jQuery('.screencast-video').hide();
//	jQuery('.screencast-video:first').show();
	jQuery('.show-hide-acc').click(
		function() {
			if( jQuery(this).parents('.section').children('.screencast-video').is(":hidden") ) {
				jQuery(this).parents('.section').children('.screencast-video').slideDown('normal');
				jQuery(this).text('Hide Video');
				return false;
			}
			if( jQuery(this).parents('.section').children('.screencast-video').is(":visible") ) {
				jQuery(this).parents('.section').children('.screencast-video:visible').slideUp('normal');
				jQuery(this).text('Show Video');
				return false;
			}
		}
	);
}

jQuery(document).ready(function($) {

	// masonry
	var $container = $('.plugin-info');
	$container.imagesLoaded(function(){
		$container.masonry({});
	});

	// init Editing
	$('div.edit_form').each(function(){
		current = $(this).attr('id');
		if ( current == 'new' ) {
			$(this).appendTo('.training-tab-wrapper');
			$(this).addClass('section');
			$('.set-email').appendTo('.training-tab-wrapper');
			$.scrollTo('#new');
		}
		else {
			$('#record-id-'+current).children().remove();
			$(this).children().appendTo('#record-id-'+current);
			$('#record-id-'+current).addClass('editing');
			$.scrollTo('#record-id-'+current);
		}
		return false;
	});

	// screencast videos
	$('.screencast-video object').attr('width','760px');
	$('.screencast-video object').attr('height','455px');
	
	// init ShowHide
	initShowHide();
	
	// mouse overs
	$('.show-hide-acc').mouseover(function() {
		$(this).addClass('over');
	}).mouseout(function(){
    	$(this).removeClass('over');
	});
	
	$('.notices').appendTo('.training-tab-wrapper');

	//custom form validation for phone number
	jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
		phone_number = phone_number.replace(/\s+/g, ""); 
		return this.optional(element) || phone_number.length > 9 &&
		phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
	}, "Please specify a valid phone number");
	
	//form validation
	var vSettings = {
	rules: {
	settingsemail: {
		email: true
	}	
		}		
	};	
	
	var vRequest = {
	rules: {
	
	name: {
		required: true,
	},
	
	company: {
		required: true,
	},
	
	phone: {
		required: true,
		phoneUS: true
	},
	
	email: {
		required: true,
		email: true
	}		
		}			
	};
	
	$("#settings_form").validate(vSettings);
	$("#request_form").validate(vRequest);

});
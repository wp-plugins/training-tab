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

	// init Editing
	jQuery('div.edit_form').each(function(){
		current = jQuery(this).attr('id');
		if ( current == 'new' ) {
			jQuery(this).appendTo('.training-tab-wrapper');
			jQuery(this).addClass('section');
			jQuery('.set-email').appendTo('.training-tab-wrapper');
			jQuery.scrollTo('#new');
		}
		else {
			jQuery('#record-id-'+current).children().remove();
			jQuery(this).children().appendTo('#record-id-'+current);
			jQuery('#record-id-'+current).addClass('editing');
			jQuery.scrollTo('#record-id-'+current);
		}
		return false;
	});

	// screencast videos
	jQuery('.screencast-video object').attr('width','760px');
	jQuery('.screencast-video object').attr('height','455px');
	
	// init ShowHide
	initShowHide();
	
	// mouse overs
	jQuery('.show-hide-acc').mouseover(function() {
		jQuery(this).addClass('over');
	}).mouseout(function(){
    	jQuery(this).removeClass('over');
	});
	
	jQuery('.notices').appendTo('.training-tab-wrapper');

	//custom form validation for phone number
	jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
		phone_number = phone_number.replace(/\s+/g, ""); 
		return this.optional(element) || phone_number.length > 9 &&
		phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}jQuery/);
	}, "Please specify a valid phone number");
	
	// manage response
	jQuery('.manage-response').insertAfter('.tt-header');
	jQuery('.manage-response').addClass('section');
	
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
	
	jQuery("#settings_form").validate(vSettings);
	jQuery("#request_form").validate(vRequest);

});
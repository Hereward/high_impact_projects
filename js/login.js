/**
 * @package   Noble Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

function popup_close() {
	jQuery('.login-backdrop').stop().animate({'opacity':'0'}, 200, function(){
		jQuery('.login-backdrop').hide();
	});
	jQuery('.login-modal').stop().animate({'opacity':'0'}, 200, function(){
		jQuery('.login-modal').css('top','5%').hide();
	});
}

jQuery(document).ready(function(){

	jQuery('.login-btn').click(function(){
		jQuery('.login-backdrop').stop().animate({'opacity':'0.7'}, 300, 'easeInOutExpo');
		jQuery('.login-modal').stop().animate({'opacity':'1', 'top':'22%'}, 800, 'easeInOutExpo');
		jQuery('.login-backdrop, .login-modal').show();
		return false;
	});

	jQuery('.close').click(function(){
		popup_close();
	});

	jQuery('.login-backdrop').click(function(){
		popup_close();
	});

});
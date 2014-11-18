<?php
/**
 * @package   Visario Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

defined('_JEXEC') or die;
 
// template params
$logo_image                 = $this->params->get('logoFile');
$site_title                 = $this->params->get('sitetitle');
$site_desc                  = $this->params->get('sitedescription');
$logo_margin_top            = $this->params->get('logoMarginTop', 50);
$logo_margin_bottom         = $this->params->get('logoMarginBottom', 40);

$color_style                = $this->params->get('templateStyle', '');
$template_link_color        = $this->params->get('templateLinkColor', '');
$template_fontcolor         = $this->params->get('templateBodyColor', '');

$body_font_family           = $this->params->get('bodyFont');
$headings_font_family       = $this->params->get('headingsFont');
$body_font_size             = $this->params->get('bodyFontSize', 14);

$background_color           = $this->params->get('templateBackgroundColor', '');

$login_button               = $this->params->get('userLogin');
$register_button            = $this->params->get('userRegistration');

$copyrights                 = $this->params->get('copyrights');
$copytext                   = $this->params->get('copyrightsText');
$ga_id                      = $this->params->get('googleAnalitycsCode');
$totop                      = $this->params->get('toTop');
$social_icons               = $this->params->get('socialIcons');

// rtl class
if($lang->isRTL()) {
	$rtl_detection = ' rtl';
} else {
	$rtl_detection = ' no-rtl';
}

// template logo
if ($logo_image) {
	// if custom logo image
	$logo = '<a href="'.$this->baseurl.'"><img src="'. JURI::root() . $logo_image .'" alt="'. $sitename .'" /></a>';
} elseif (($site_title) && ($site_desc)) {
	// if title and description
	$logo = '<h1><a href="'.$this->baseurl.'">'. htmlspecialchars($site_title) .'<span class="site-description">'. htmlspecialchars($site_desc) .'</span></a></h1>';
} elseif (($site_title) && (!$site_desc)) {
	// if title only
	$logo = '<h1><a href="'.$this->baseurl.'">'. htmlspecialchars($site_title) .'</a></h1>';
} else {
	// else load defalut template logo
	$logo = '<a href="'.$this->baseurl.'"><img src="'. JURI::root() .'templates/'. $this->template .'/images/logo.png" alt="'. $sitename .'" /></a>';
}

// login button
if ($login_button) {
	//add lightbox js
	$doc->addScript(JURI::root().'templates/' . $this->template . '/js/login.js');
	if ($user->guest) {
		$logintext = ($this->params->get('loginText'));
	} else {
		$logintext = ($this->params->get('logoutText'));
	}
}
// registration button
if ($register_button) {
	if ($user->guest) {
		$registertext = ($this->params->get('registerText'));
	} else {
		$registertext = ($this->params->get('profileText'));
	}
}

// to top scroll button
if ($totop) {
	$doc->addScript(JURI::root().'templates/' . $this->template . '/js/scrolltop.js');
}

// google analitycs
if  ($this->params->get('googleAnalitycs')) {
	$doc->addScriptDeclaration('
		var 
		_gaq = _gaq || []; 
		_gaq.push([\'_setAccount\', \'' .$ga_id. '\']); 
		_gaq.push([\'_trackPageview\']); 

		(function() { 
			var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true; 
			ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\'; 
			var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s); 
		})(); 

	');
}

// favicon
if ($this->params->get('templateFavicon')) {
	$this->addFavicon (JURI::root() . $this->params->get('templateFavicon'));
}

// social icons
$facebook      = $this->params->get('linkFacebook', '');
$twitter       = $this->params->get('linkTwitter', '');
$behance       = $this->params->get('linkBehance', '');
$dribbble      = $this->params->get('linkDribbble', '');
$linkedin      = $this->params->get('linkLinkedIn', '');
$flickr        = $this->params->get('linkFlickr', '');
$youtube       = $this->params->get('linkYoutube', '');
$vimeo         = $this->params->get('linkVimeo', '');
$google_plus   = $this->params->get('linkGooglePlus', '');

// custom inline CSS code
if (($this->params->get('customCSS')) && ($this->params->get('customCSScode') != '')) {
	$custom_inline_css = $this->params->get('customCSScode');
	// add custom css
	$doc->addStyleDeclaration($custom_inline_css);
}

// preapre css style from template params
$style = ' 
body { background-color:'.$background_color.'; color:'.$template_fontcolor.'; font-size:'.$body_font_size.'px; } 
.logo { margin-top:'. $logo_margin_top .'px; margin-bottom:'. $logo_margin_bottom .'px; }
';
// add css
$doc->addStyleDeclaration($style);


// change active links color
if ($this->params->get('templateColor')) {
	$link_color = ' a, h1 a:hover, h2 a:hover, h3 a:hover { color: '.$template_link_color.'; } ';
	$doc->addStyleDeclaration($link_color);
}

// style switcher
$demo_style = "style1";

//Retrieve Cookie (if exists)
if( isset($_COOKIE['veo-complexity-style']) ){

    //Set Style
    $demo_style = $_COOKIE['veo-complexity-style']; 

}

//Retrieve Style form URL
if( isset($_GET['style']) ){

    //Set Style
    $demo_style = $_GET['style'];

    //Set cookie
    setcookie('veo-complexity-style', $demo_style);
}

	

<?php
/**
 * @package   Visario Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

defined('_JEXEC') or die;

// Bootstrap css
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/bootstrap/bootstrap.css');

// Responsive bootstrap css
if ($template_responsive) {
	$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/bootstrap/bootstrap-responsive.css');
}

// Template css's
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/addons.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/joomla.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/menu.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/template.css');

// Responsive template css
if ($template_responsive) {
	$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/template-responsive.css');
}

// K2 Style
if ($this->params->get('k2CSS')) {
	$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/k2.css');
}

// Load optional RTL
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction); 

if($lang->isRTL()) {
	$doc->addStyleSheet(JURI::base() . '/templates/' . $this->template . '/css/rtl/template-rtl.css');
	if ($template_responsive) {
		$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/rtl/template-responsive-rtl.css');
	}
}

$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/style' . $color_style . '.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/fonts/body-' . $body_font_family . '.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/fonts/headings-' . $headings_font_family . '.css');


// Style Switcher - for demo purpose only
//$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/' . $demo_style . '.css');

// Load custom.css
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/custom.css');

?>	
<!--[if IE 7]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template-ie7.css" type="text/css" />
<![endif]-->

<!--[if IE 8]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template-ie8.css" type="text/css" />
<![endif]-->

<!--[if IE 9]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template-ie9.css" type="text/css" />
<![endif]-->

<!--[if lt IE 9]>
<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
<![endif]-->

<!--[if IEMobile 7]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template-ie-mobile7.css" type="text/css" />
<![endif]-->


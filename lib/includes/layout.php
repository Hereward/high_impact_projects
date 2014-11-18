<?php
/**
 * @package   Visario Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

defined('_JEXEC') or die;

// params
$sidebar_left_width   = $this->params->get('sidebarLeftWidth', '');
$sidebar_right_width  = $this->params->get('sidebarRightWidth', '');
$submenu_width        = $this->params->get('submenuWidth', 210);
$template_width       = $this->params->get('templateWidth', 1000);
$template_responsive  = $this->params->get('templateResponsive');

$modules = array();

// calculate content width
$span = '';
$grid = 12;

if ($this->countModules('sidebar-left') && $this->countModules('sidebar-right')) {
	$span = ($grid - ( $sidebar_left_width + $sidebar_right_width )) ;
}
elseif ($this->countModules('sidebar-left') && !$this->countModules('sidebar-right')) {
	$span = ($grid - $sidebar_left_width) ;
}
elseif (!$this->countModules('sidebar-left') && $this->countModules('sidebar-right')) {
	$span = ($grid - $sidebar_right_width) ;
}
else {
	$span = 12; 
}

// prepare variables for module positions
if ($this->params->get('topaModules') == 1) {
	$top_a = "seven_style";
} else {
	$top_a = "bootstrap";
}

if ($this->params->get('topbModules') == 1) {
	$top_b = "seven_style";
} else {
	$top_b = "bootstrap";
}

if ($this->params->get('maintopaModules') == 1) {
	$maintop_a = "seven_style";
} else {
	$maintop_a = "bootstrap";
}

if ($this->params->get('maintopbModules') == 1) {
	$maintop_b = "seven_style";
} else {
	$maintop_b = "bootstrap";
}

if ($this->params->get('mainbottomaModules') == 1) {
	$mainbottom_a = "seven_style";
} else {
	$mainbottom_a = "bootstrap";
}

if ($this->params->get('mainbottombModules') == 1) {
	$mainbottom_b = "seven_style";
} else {
	$mainbottom_b = "bootstrap";
}

if ($this->params->get('bottomaModules') == 1) {
	$bottom_a = "seven_style";
} else {
	$bottom_a = "bootstrap";
}

if ($this->params->get('bottombModules') == 1) {
	$bottom_b = "seven_style";
} else {
	$bottom_b = "bootstrap";
}

// no responsive layout
if (!$template_responsive) {
	$no_rwd = '.container-fluid { min-width: 960px; }
	.svn-menu ul.collapse {
		height: auto !important;
		overflow: visible !important;
		-webkit-transition: none !important;
		   -moz-transition: none !important;
			-ms-transition: none !important;
			 -o-transition: none !important;
				transition: none !important;
	}
	.svn-menu li.parent > span.caret,
	.svn-menu ul li.parent > span.caret  {
		background-color: transparent !important;
	}
';
	
	$doc->addStyleDeclaration($no_rwd);
}

// template and submenu widths
$custom_widths = '.svn-menu ul li { width: '. $submenu_width .'px; } .container-fluid { max-width: '. $template_width .'px; }';
$doc->addStyleDeclaration($custom_widths);




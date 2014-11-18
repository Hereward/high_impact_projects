<?php
/**
 * @package   Visario Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

defined('_JEXEC') or die;

// detect HTTP - HTTPS
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

// first google fonts set
if ($this->params->get('googleFonts')) {

	$font_family            = $this->params->get('googleFontName');
	$css_selectors          = $this->params->get('googleFontSelectors', '');
	$g1_font_family         = '';
	
	if ($font_family) {

		// add font URL
		$doc->addStyleSheet($protocol.'://fonts.googleapis.com/css?family='.str_replace(' ','+', $font_family));
		
		// add CSS selectors
		if ($css_selectors) {
		
			//check additional styles and characters set
			if ((strpos($font_family, ":")) && (strpos($font_family, "&"))) {
				$g1_font_family = strstr($font_family, ':', true);
			
			} elseif ((strpos($font_family, ":")) && (!strpos($font_family, "&"))) {
				$g1_font_family = strstr($font_family, ':', true);
			
			} elseif ((!strpos($font_family, ":")) && (strpos($font_family, "&"))) {
				$g1_font_family = strstr($font_family, '&', true);
			
			} else {
				$g1_font_family = $font_family;
			}
			
			// add font-family
			$google_fonts  = $css_selectors . ' { font-family: '.$g1_font_family.', sans-serif; }';
			$doc->addStyleDeclaration($google_fonts);
			
		}
	}
}

// second google fonts set
if ($this->params->get('googleFontsSecond')) {

	$second_font_family     = $this->params->get('googleFontNameSecond');
	$second_css_selectors   = $this->params->get('googleFontSelectorsSecond', '');
	$g2_font_family         = '';
		

	if ($second_font_family) {
	
		// add font URL
		$doc->addStyleSheet($protocol.'://fonts.googleapis.com/css?family='.str_replace(' ','+', $second_font_family));	
		
		// add CSS selectors
		if ($second_css_selectors) {
		
			//check additional styles and characters set
			if ((strpos($second_font_family, ":")) && (strpos($second_font_family, "&"))) {
				$g2_font_family = strstr($second_font_family, ':', true);
			
			} elseif ((strpos($second_font_family, ":")) && (!strpos($second_font_family, "&"))) {
				$g2_font_family = strstr($second_font_family, ':', true);
			
			} elseif ((!strpos($second_font_family, ":")) && (strpos($second_font_family, "&"))) {
				$g2_font_family = strstr($second_font_family, '&', true);
			
			} else {
				$g2_font_family = $second_font_family;
			}
			
			// add font-family
			$second_google_fonts  = $second_css_selectors . ' { font-family: '.$g2_font_family.', sans-serif; }';
			$doc->addStyleDeclaration($second_google_fonts);
		
		}
	}
}





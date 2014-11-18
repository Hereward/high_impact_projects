<?php
/**
 * @package   Visario Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

// Define Defaults
$app               = JFactory::getApplication();
$doc               = JFactory::getDocument();
$lang              = JFactory::getLanguage();
$user              = JFactory::getUser();
$this->language    = $doc->language;
$this->direction   = $doc->direction;

// Detecting Active Variables
$option            = $app->input->getCmd('option', '');
$view              = $app->input->getCmd('view', '');
$layout            = $app->input->getCmd('layout', '');
$task              = $app->input->getCmd('task', '');
$itemid            = $app->input->getCmd('Itemid', '');
$sitename          = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" ) { $fullWidth = 1; } else { $fullWidth = 0; }

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Ease Plugin
$doc->addScript(JURI::root().'templates/' . $this->template . '/js/ease.js');

<?php
/**
 * @package   Visario Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

defined('_JEXEC') or die;

// basic style
function modChrome_basic($module, &$params, &$attribs)
{
	if ($module->content) {
		echo $module->content;
	}
}

// banner style
function modChrome_banner($module, &$params, &$attribs)
{
	$doc = JFactory::getDocument();
	
	if ($params->get('backgroundimage')) {
		$banner_bg = ' #banner { background-image: url('.JURI::root().$params->get('backgroundimage').'); } ';
		$doc->addStyleDeclaration($banner_bg);
	}
	
	if ($module->content) {
		echo $module->content;
	}
}

// standard style
function modChrome_standard($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	
	if ($params->get('moduleclass_sfx')) {
		$modClassSfx = ' '. $params->get('moduleclass_sfx');
	} else {
		$modClassSfx = '';
	}
	
	if (!empty ($module->content)) : ?>
		<<?php echo $moduleTag; ?> class="module<?php echo htmlspecialchars ($modClassSfx); ?>">

		<?php if ((bool) $module->showtitle) :?>
		<div class="module-title">
			<<?php echo $headerTag; ?> class="<?php echo $params->get('header_class'); ?>"><?php echo $module->title; ?></<?php echo $headerTag; ?>>
		</div>
		<?php endif; ?>
			<div class="module-content">
			<?php echo $module->content; ?>
			</div>
		</<?php echo $moduleTag; ?>>
	<?php endif;
}

// bootstrap style - custom widths
function modChrome_bootstrap($module, $params, $attribs) 
{
	static $modulescount;
	global $modules;

	$modulescount   = count(JModuleHelper::getModules($attribs['name']));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
	$name           = '';
	
	if ($params->get('moduleclass_sfx')) {
		$modClassSfx = ' '. $params->get('moduleclass_sfx');
	} else {
		$modClassSfx = '';
	}
	
	if (isset($attribs['name'])){
		$name = $attribs['name'];
		if (isset($modules[$name])){
			$modules[$name] += 1;
		} else {
			$modules[$name] = 1;
		}
	}

	if (!empty ($module->content)) {
		$modules[$name] == 1;
		$counter = ($modules[$name]);

		
		// module content
		if ($counter == 1) {
			echo '<div class="row-fluid">';
		}

		echo '<'.$params->get('module_tag', 'div').' class="module' .$modClassSfx. ' '. $moduleClass .'">';
		if ($module->content) {
			if ($module->showtitle) {
				echo '<div class="module-title">';
				echo '<'.htmlspecialchars($params->get('header_tag', 'h3')).' class="'.$params->get('header_class').'">'. $module->title .'</'.htmlspecialchars($params->get('header_tag', 'h3')).'>';
				echo '</div>';
			}
			echo '<div class="module-content">';
			echo $module->content;
			echo '</div>';
		}
		echo '</'.$params->get('module_tag', 'div').'>';

		if ($counter == $modulescount) {
			echo '</div>';
		}
	}
}

// seven style - equal widths
function modChrome_seven_style($module, $params, $attribs) 
{
	static $modulescount;
	global $modules;

	$modulescount = count(JModuleHelper::getModules($attribs['name']));
	$name='';
	
	if ($params->get('moduleclass_sfx')) {
		$modClassSfx = ' '. $params->get('moduleclass_sfx');
	} else {
		$modClassSfx = '';
	}
	
	if (isset($attribs['name'])){
		$name = $attribs['name'];
		if (isset($modules[$name])){
			$modules[$name] += 1;
		} else {
			$modules[$name] = 1;
		}
	}

	if (!empty ($module->content)) {
		$modules[$name] == 1;
		$counter = ($modules[$name]);
		
		// count span for modules
		$modspan = ($modulescount %4);
		
		if ($modspan != 0) {
			if ($modspan == 1) {
				$modspan = 'span12';
			} elseif ($modspan == 2) {
				$modspan = 'span6';
			} elseif ($modspan == 3) {
				$modspan = 'span4';
			}
		} else {
			$modspan = 'span3';
		}
		
		// count rest, rest <= 4
		$rest = ($modulescount %4);
		
		if ($rest == 1) {
			$rest = 1;
		} elseif  ($rest == 2) {
			$rest = 2;
		} elseif  ($rest == 3) {
			$rest = 3;
		} else {
			$rest = 4;
		}
		
		// module content
		if ($counter%4 == 1) {
			echo '<div class="row-fluid">';
		}
		if (($counter - 1) >= ($modulescount - $rest)) {
			echo '<div class="'.$modspan.'">';
		} else {
			echo '<div class="span3">';
		}

		echo '<'.$params->get('module_tag', 'div').' class="module'. $modClassSfx .'">';
		if ($module->content) {
			if ($module->showtitle) {
				echo '<div class="module-title">';
				echo '<'.htmlspecialchars($params->get('header_tag', 'h3')).' class="'.$params->get('header_class').'">'. $module->title .'</'.htmlspecialchars($params->get('header_tag', 'h3')).'>';
				echo '</div>';
			}	
			echo '<div class="module-content">';
			echo $module->content;
			echo '</div>';
		}
		echo '</'.$params->get('module_tag', 'div').'>';
		echo '</div>';
	
		if (($counter%4 == 0) && ($counter != $modulescount)) {
			echo '</div>';
		}
		
		if ($counter == $modulescount) {
			echo '</div>';
		}
	}
}

?>
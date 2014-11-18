<?php
/**
 * @package   Visario Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
 * @license   Commercial - ThemeForest Regular License - http://themeforest.net/licenses/regular_extended
**/

defined('_JEXEC') or die;
if (!isset($this->error))
{
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}
//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/system/error.css" type="text/css" />
	<?php if ($this->direction == 'rtl') : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/error_rtl.css" type="text/css" />
	<?php endif; ?>
</head>
	<body>
		<div class="error">
			<div id="outline">
				<div id="errorboxoutline">
					<div class="error-box">
						<div class="error-box-inside">
							<h1><?php echo $this->error->getCode(); ?></h1>
							<div class="error-box-line"></div>
						</div>
					</div>
					<div id="errorboxbody">
						<h2 class="error-type"><?php echo $this->error->getMessage(); ?></h2>
						<h3 class="error-request"><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></h3>
						<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></p>
						<div class="home-btn">
							<a class="btn" href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
						</div>
						<p> <?php if ($this->debug) : 
							echo $this->renderBacktrace();
							endif; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

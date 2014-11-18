<?php
/**
 * @package   7Studio Joomla! 3.0 Template
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
**/

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

if (count($this->children[$this->category->id]) > 0 && $this->maxLevel != 0) : ?>

	<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
		<?php if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) : ?>
			
			<?php $data_name = $this->escape($child->title); ?>
			<?php $data_option = str_replace(' ', '', $data_name); ?>
			
			<li><a href="#" data-option-value=".<?php echo $data_option; ?>"><?php echo $this->escape($child->title); ?></a></li>

			<?php if (count($child->getChildren()) > 0) : ?>

				<?php
				$this->children[$child->id] = $child->getChildren();
				$this->category = $child;
				$this->maxLevel--;
				if ($this->maxLevel != 0) :
					echo $this->loadTemplate('children');
				endif;
				$this->category = $child->getParent();
				$this->maxLevel++;
				?>
				
			<?php endif; ?>
		
		<?php endif; ?>
	<?php endforeach; ?>

<?php endif;

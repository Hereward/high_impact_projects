/**
 * @package   Seven Isotope module for Joomla!
 * @version   1.0
 * @author    7Studio Tomasz Herudzinski http://www.7studio.eu
 * @copyright Copyright (C) 2009 - 2012 7Studio Tomasz Herudzinski
**/

jQuery(window).load(function() {

	var $container = jQuery('#isotope-container');
	
		$container.isotope({
			itemSelector: '.portfolio-element',
			//layoutMode : 'fitRows'
			masonry: {
			columnWidth: 1
			}
		});	

	jQuery('#filters a').click(function () {
		var selector = jQuery(this).attr('data-option-value');
		$container.isotope({
			filter: selector
		});
	    
		var $this = jQuery(this);
        if ( $this.hasClass('selected') ) {
          return false;
        }
		
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
		return false;
	});

	
});


<?php 
// No direct access
defined('_JEXEC') or die; 

JHtml::script(Juri::base() . 'modules/mod_hikamarket_stats/scripts/jquery.waypoints.min.js');
JHtml::script(Juri::base() . 'modules/mod_hikamarket_stats/scripts/jquery.counterup.min.js');
JFactory::getDocument()->addStyleSheet(JURI::root().'modules/mod_hikamarket_stats/styles/style.css');
?>

<script type='text/javascript'>
jQuery(document).ready(function($) {
	$('.counter').counterUp({
	    delay: 10,
	    time: 1000
	});
});
</script>
<div id="hika-stats" class="<?php echo $moduleclass_sfx; ?>">
	<?php if($module->showtitle) { echo '<h3>' .$module->title .'</h3>'; } ?>
	<div class="stat-container">
		<span class="stat"><?php echo JText::_('MOD_HIKAMARKET_STATS_TOTAL_VENDORS') ?> <strong class="total-vendors counter"><?php echo $vendor_count; ?></strong></span>
		<span class="stat"><?php echo JText::_('MOD_HIKAMARKET_STATS_TOTAL_PRODUCTS') ?> <strong class="total-products counter"><?php echo $product_count; ?></strong></span>
		<span class="stat"><?php echo JText::_('MOD_HIKAMARKET_STATS_ONLINE') ?> <strong class="total-online counter"><?php echo $online_num; ?><?php echo $total_users; ?></strong></span>
	</div>
</div>
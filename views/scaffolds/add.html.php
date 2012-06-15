<?php
/**
 * Slicedup: a fancy tag line here
 *
 * @copyright	Copyright 2011, Paul Webster / Slicedup (http://slicedup.org)
 * @license 	http://opensource.org/licenses/bsd-license.php The BSD License
 */

$this->title($t($plural));
?>
<div class="scaffold <?php echo $plural;?> add<?php echo $singular;?>">
	<h2><?php echo $t('{:action} {:entity}', array('action' => $t('Add'), 'entity' => $t($singular)));?></h2>
	<div class="row">
		<div class="span9 form create">
			<?php
				echo $this->_render('element', 'scaffold_form_tabbed', compact('record', 'url', 'fieldsets'), array(
					'library' => 'sli_bootstrap'
				));
			?>
		</div>
		<div class="span3">
			<ul class="actions nav nav-tabs nav-stacked">
				<li><a><strong>Actions</strong></a></li>
				<?php if(in_array('index', $actions)):?>
				<li><?php 
					$link = '<i class="icon-th-list"></i>&nbsp;';
					$link.= $t('{:action} {:entity}', array('action' => $t('List'), 'entity' => $t($plural)));
					echo $this->html->link($link, array('action' => 'index'), array('escape' => false));
				?></li>
				<?php endif;?>
			</ul>
		</div>
	</div>
</div>
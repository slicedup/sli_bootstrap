<?php
/**
 * Slicedup: a fancy tag line here
 *
 * @copyright	Copyright 2011, Paul Webster / Slicedup (http://slicedup.org)
 * @license 	http://opensource.org/licenses/bsd-license.php The BSD License
 */

$this->title($t($plural));
?>
<div class="scaffold <?php echo $plural;?> edit<?php echo $singular;?>">
	<h2><?php echo $t('{:action} {:entity}', array('action' => $t('Edit'), 'entity' => $t($singular)));?></h2>
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
				<?php if(in_array('view', $actions)):?>
				<li><?php
					$link = '<i class="icon-zoom-in"></i>&nbsp;';
					$link.= $t('{:action} {:entity}', array('action' => $t('View'), 'entity' => $t($singular)));
					echo $this->html->link($link, array('action' => 'view', 'args' => $record->key()), array('escape' => false));
				?></li>
				<?php endif;?>
				<?php if(in_array('delete', $actions)):?>
				<li><?php
					$link = '<i class="icon-minus-sign"></i>&nbsp;';
					$link.= $t('{:action} {:entity}', array('action' => $t('Delete'), 'entity' => $t($singular)));
					echo $this->html->link($link, array('action' => 'delete', 'args' => $record->key()), array('escape' => false));
				?></li>
				<?php endif;?>
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
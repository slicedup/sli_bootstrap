<?php
/**
 * Slicedup: a fancy tag line here
 *
 * @copyright	Copyright 2011, Paul Webster / Slicedup (http://slicedup.org)
 * @license 	http://opensource.org/licenses/bsd-license.php The BSD License
 */

$this->title($t($plural));
?>
<div class="scaffold <?php echo $plural;?> view<?php echo $singular;?>">
	<h2><?php echo $t('{:action} {:entity}', array('action' => $t('View'), 'entity' => $t($singular)));?></h2>
	<div class="row">
		<div class="span9 details">
			<legend><?php 
				if ($title = $model::meta('title')):
					echo $h($record->{$title});
				endif;
			?></legend>
			<table class="table table-striped table-bordered">
				<?php foreach ($fields as $field => $name):?>
				<tr>
					<td><?php echo $t($name)?></td>
					<td><?php echo $h($record->{$field});?></td>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
		<div class="span3">
			<ul class="actions nav nav-tabs nav-stacked">
				<li><a><strong>Actions</strong></a></li>
				<?php if(in_array('edit', $actions)):?>
				<li><?php
					$link = '<i class="icon-pencil"></i>&nbsp;';
					$link.= $t('{:action} {:entity}', array('action' => $t('Edit'), 'entity' => $t($singular)));
					echo $this->html->link($link, array('action' => 'edit', 'args' => $record->key()), array('escape' => false));
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
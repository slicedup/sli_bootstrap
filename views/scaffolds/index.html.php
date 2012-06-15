<?php
/**
 * Slicedup: a fancy tag line here
 *
 * @copyright	Copyright 2011, Paul Webster / Slicedup (http://slicedup.org)
 * @license 	http://opensource.org/licenses/bsd-license.php The BSD License
 */
$this->title($t($plural));
?>
<div class="scaffold <?php echo $plural;?> index<?php echo $singular;?>">
	<h2><?php echo $t($plural);?></h2>
	<div class="row">
	  <div class="span10 summary">
	  	<legend>&nbsp;</legend>
		<table class="table table-striped table-bordered">
			<tr>
			<?php foreach ($fields as $field => $name):?>
				<th><?php echo $t($name);?></th>
			<?php endforeach;?>
				<th class="actions"><?php echo $t('Actions');?></th>
			</tr>
		<?php foreach ($recordSet as $record):?>
			<tr>
				<?php foreach ($fields as $field => $name):?>
				<td><?php echo $h($record->{$field});?></td>
				<?php endforeach;?>
				<td class="actions">
					<?php
						$_actions = array(
							'view' => 'icon-zoom-in',
							'edit' => 'icon-pencil', 
							'delete' => 'icon-minus-sign icon-white'
						);
						$_links = array();
						$options = array('class' => 'btn btn-small', 'escape' => false);
						foreach ($_actions as $action => $icon):
							if(in_array($action, $actions)):
								if ($action == 'delete'):
									$options['class'] .= ' btn-danger';
								endif;
								$icon = $icon ? '<i class="'.$icon.'"></i>&nbsp;' : '';
								$_links[] = $this->html->link($icon . $t(ucfirst($action)), array('action' => $action, 'args' => $record->key()), $options);
							endif;
						endforeach;
						echo join('&nbsp;', $_links);
					?>
				</td>
			</tr>
		<?php endforeach;?>
		</table>
	  </div>
	  <div class="span2">
	  	<ul class="actions nav nav-tabs nav-stacked">
	  		<li><a><strong>Actions</strong></a></li>
			<?php if(in_array('add', $actions)):?>
			<li><?php 
				$link = '<i class="icon-plus-sign"></i>&nbsp;';
				$link.= $t('{:action} {:entity}', array('action' => $t('Add'), 'entity' => $t($singular)));
				echo $this->html->link($link, array('action' => 'add'), array('escape' => false));
			?></li>
			<?php endif;?>
		</ul>
	</div>
	</div>
</div>
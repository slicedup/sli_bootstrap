<?php
/**
 * Slicedup: a fancy tag line here
 *
 * @copyright	Copyright 2012, Paul Webster / Slicedup (http://slicedup.org)
 * @license 	http://opensource.org/licenses/bsd-license.php The BSD License
 */
	use lithium\util\Inflector;

	echo $this->Form->create($record, compact('url') + array('class' => 'form-horizontal'));
	echo '<ul class="nav nav-tabs scaffold-form-tabs">';
	foreach($fieldsets as &$fieldset):
		if (!isset($fieldset['legend'])):
			$fieldset['legend'] = $singular;
		endif;
		$fieldset['__tab_id'] = 'scaffold-form-tab-' . Inflector::slug($fieldset['legend']);
		echo '<li>'. $this->Html->link($fieldset['legend'], '#'.$fieldset['__tab_id'], array('data-toggle' => 'tab')) .'</li>';
	endforeach;
	echo '</ul>';
	echo '<div class="tab-content scaffold-form-tab-content">';
	foreach($fieldsets as &$fieldset):
		echo '<div class="tab-pane" id="'.$fieldset['__tab_id'].'"><fieldset>';
		foreach($fieldset['fields'] as $field => $options):
			if (isset($options['type']) && $options['type']=='hidden'):
				echo $this->Form->field($field, $options);
				continue;
			endif;
			$error = $this->Form->error($field, null, array('class' => 'help-block'));
			?>
			<div class="control-group<?php echo !empty($error) ? ' error' : ''; ?>">
			<?php
				$label = array('title' => null, 'options' => array());
				if (isset($options['label'])):
					if (is_string($options['label'])):
						$label['title'] = $options['label'];
					else:
						if (isset($options['label']['title'])):
							$label['title'] = $options['label']['title'];
							unset($options['label']['title']);
							$label['options'] = $options['label'];
						endif;
					endif;
				endif;
				echo $this->Form->label($field, $label['title'], $label['options'] + array('class' => 'control-label'));	
			?>
				<div class="controls">
			        <?php
			        	echo $this->Form->field($field, $options + array('class' => 'input-xlarge', 'wrap' => false, 'label' => false));
			        	echo $error;
			        ?>
		      	</div>
			</div>
			<?php
		endforeach;
		echo '</fieldset></div>';
	endforeach;
	echo '</div>'
	?>
		<div class="form-actions">
            <?php 
            	$text = $t('{:action} {:entity}', array('action' => $t('Save'), 'entity' => $t($singular)));
            	echo $this->Form->field($text, array('type' => 'submit', 'label' => false, 'class' => 'btn btn-primary', 'wrap' => false));?>
		</div>
	<?php
	echo $this->Form->end();
?>

<script>
	$(document).ready(function() {
		$('.scaffold-form-tabs a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		});
		$('.scaffold-form-tabs a:first').tab('show');
		$('.scaffold-form-tab-content .tab-pane').each(function(i, e){
			if ($(e).find('.control-group.error').length) {
				var tab = $('.scaffold-form-tabs a[href~=#'+e.id+']');
				tab.addClass('error');
			}
		});
	});
</script>

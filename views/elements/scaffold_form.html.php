<?php
/**
 * Slicedup: a fancy tag line here
 *
 * @copyright	Copyright 2012, Paul Webster / Slicedup (http://slicedup.org)
 * @license 	http://opensource.org/licenses/bsd-license.php The BSD License
 */
	echo $this->Form->create($record, compact('url') + array('class' => 'form-horizontal'));
	foreach($fieldsets as $fieldset):
		echo '<fieldset>';
		if (!isset($fieldset['legend'])):
			$fieldset['legend'] = '&nbsp;';
		endif;
		echo '<legend>' . $t($fieldset['legend']) . '</legend>';
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
		echo '</fieldset>';
	endforeach;
	?>
		<div class="form-actions">
            <?php 
            	$text = $t('{:action} {:entity}', array('action' => $t('Save'), 'entity' => $t($singular)));
            	echo $this->Form->field($text, array('type' => 'submit', 'label' => false, 'class' => 'btn btn-primary', 'wrap' => false));?>
		</div>
	<?php
	echo $this->Form->end();
?>
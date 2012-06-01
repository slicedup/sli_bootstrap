<?php
/**
 * Slicedup: a fancy tag line here
 *
 * @copyright	Copyright 2012, Paul Webster / Slicedup (http://slicedup.org)
 * @license 	http://opensource.org/licenses/bsd-license.php The BSD License
 */
	echo $this->Form->create($record, compact('url'));
	foreach($fieldsets as $fieldset):
		if (isset($fieldset['legend'])):
			echo '<legend>' . $t($fieldset['legend']) . '</legend>';
		endif;
		echo '<fieldset class="well">';
		foreach($fieldset['fields'] as $field => $options):
			echo $this->Form->field($field, $options + array('class' => 'input-xlarge'));
		endforeach;
		echo '</fieldset>';
	endforeach;
	echo $this->Form->field($t('Save'), array('type' => 'submit', 'label' => false, 'class' => 'btn btn-primary'));
	echo $this->Form->end();
?>
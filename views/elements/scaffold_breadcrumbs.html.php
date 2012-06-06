<?php 
	use lithium\util\Inflector; 
	use sli_scaffold\core\Scaffold;
	
	if($action != 'index' && Scaffold::handledAction($scaffold['name'], $action, $scaffold['prefix'])):?>
	<ul class="breadcrumb">
	<li>
		<?php 
			echo $this->html->link($t(Inflector::humanize($scaffold['_name'])), array(
				'controller' => $scaffold['_name'],
				'action' => 'index'
			));
		?>
		<span class="divider">/</span>
	</li>
	<li class="active">
	<?php 
		$current = $t(Inflector::humanize($action));
		if (isset($record) && $record->exists() && $title = $model::meta('title')):
			$current.= ": " . $h($record->{$title});
		endif;
		echo $current;
	?>
	</li>
</ul>
<?php 
	endif;
?>
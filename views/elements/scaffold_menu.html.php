<?php
	use lithium\util\Inflector; 
	use sli_scaffold\core\Scaffold;
	
	$config = Scaffold::config();
	$scaffolds = array_keys($config['scaffold']);
	if (count($scaffolds) > 1):
		$menu = array();
		foreach ($scaffolds as $name):
			if (Scaffold::handledAction($name, 'index', $scaffold['prefix'])): 
				$config = Scaffold::get($name);
				$menuItem = array(
					'title' =>	Inflector::humanize($config['_name']),
					'url' => array(
						'controller' => $config['_name'],
						'action' => 'index'
					)
				);
				if ($config['_library']):
					$menu[Inflector::humanize($config['_library'])][] = $menuItem;
				else:
					$menu[] = $menuItem;
				endif;
			endif;
		endforeach;
		if (count($menu) < 2 && is_array(current($menu))):
			$library = $config['_library'];
			$menu = current($menu);
		endif;
?>

<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<ul class="nav">
				<?php foreach ($menu as $group => $items):?>
					<?php if(is_string($group)):?>
					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					         <?php echo $t($group);?>
					          <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
						<?php foreach($items as $item):?>
							<li><?php echo $this->html->link($t($item['title']), $item['url'])?></li>
						<?php endforeach;?>
						</ul>
					</li>
					<li class="divider-vertical"></li>
					<?php else:?>
					<li><?php echo $this->html->link($t($items['title']), $items['url'])?></li>
					<?php endif;?>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>

<?php 
	endif;
?>
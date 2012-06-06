<?php echo $this->_render('element', 'scaffold_menu', array(), array('library' => 'sli_bootstrap'));?>
<?php echo $this->_render('element', 'scaffold_breadcrumbs', array(), array('library' => 'sli_bootstrap'));?>
<?php echo $this->flashMessage->output(null, array('options' => array('library' => 'sli_bootstrap')));?>
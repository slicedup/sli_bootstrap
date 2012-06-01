<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Application &gt; <?php echo $this->title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $this->html->style('/sli_bootstrap/css/app'); ?>
	<?php echo $this->scripts(); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="container" id="container">
	<header id="header" class="page-header">
		<h1>Application &gt; <?php echo $this->title(); ?></h1>
	</header>
	<section class="container" id="content">
		<?php echo $this->flashMessage->output(null, array('options' => array('library' => 'sli_bootstrap')));?>
		<?php echo $this->content(); ?>
	</section>
	<br><br>
	<footer id="footer">
		<hr>
		<strong><em>Slicedup, Lithium & Twitter Bootstrap Awsomeness</em></strong>
	</footer>
</body>
</html>
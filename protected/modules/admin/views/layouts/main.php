<!DOCTYPE html>
<html lang="hu-HU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/admin.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container">
	<div class="right">
		<?php 
			echo CHtml::link('Vissza a Főoldalra', array('/site/index'), array('class'=>'menu-top'));
			echo CHtml::link('Kilépés ('.Yii::app()->user->name.')', array('/site/logout'), array('class'=>'menu-top'));
		?>
	</div>
	<header>A HSC Csíkszereda oldal adminisztrációja</header>
	<nav class="full">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Hírek', 'url'=>array('/admin/news/admin')),
				array('label'=>'Menü szerkesztés', 'url'=>array('/admin/menu/admin')),
				array('label'=>'Oldalak szerkesztése', 'url'=>array('/admin/page/admin')),
				array('label'=>'Galériák szerkesztése', 'url'=>array('/admin/gallery/admin')),				
			),
		)); ?>
	</nav>
	<nav class="full">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Mérkőzések', 'url'=>array('/admin/game/admin')),								
			),
		)); ?>
	</nav>
	<?php if( Yii::app()->authManager->checkAccess("admin", Yii::app()->user->id) ):?>
	<nav class="full">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Személyzet', 'url'=>array('/admin/personal/admin')),
				array('label'=>'Játékosok', 'url'=>array('/admin/player/admin')),
				array('label'=>'Személyzeti poziciók', 'url'=>array('/admin/persFunction/admin')),				
				array('label'=>'Csapatok', 'url'=>array('/admin/team/admin')),
				array('label'=>'Támogatók', 'url'=>array('/admin/ad/admin')),
			),
		)); ?>
	</nav>
	<?php endif?>
	<?php if( Yii::app()->authManager->checkAccess("supervisor", Yii::app()->user->id) ):?>
	<nav class="full">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Felhasználók', 'url'=>array('/admin/user/admin')),
				),
			)); ?>
	</nav>
	<?php endif?>

	<?php echo $content; ?>

	<footer class="center">
		&copy; <?php echo date('Y'); ?> skanzen.ro<br/>
		Minden jog fenntartva.<br/>
		<?php echo Yii::powered(); ?>
	</footer><!-- footer -->

</div><!-- page -->
</body>
</html>

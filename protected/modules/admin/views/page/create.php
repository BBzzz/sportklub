<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Oldalak adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>Oldal létrehozása</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

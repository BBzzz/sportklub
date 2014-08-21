<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Galéria hozzáadása', 'url'=>array('create')),
	array('label'=>'Új oldal', 'url'=>array('create')),
	array('label'=>'Oldal módosítása', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Oldal törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Oldalak adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>#<?php echo $model->title; ?> oldal megtekintése</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'menu_id',
		'title',
//		'slug',
		'content:ntext',
	),
)); ?>

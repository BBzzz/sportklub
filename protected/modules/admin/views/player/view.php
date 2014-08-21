<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=array(
	'Players'=>array('index'),
	$model->pers_id,
);

$this->menu=array(
	array('label'=>'List Player', 'url'=>array('index')),
	array('label'=>'Create Player', 'url'=>array('create')),
	array('label'=>'Update Player', 'url'=>array('update', 'id'=>$model->pers_id)),
	array('label'=>'Delete Player', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pers_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Player', 'url'=>array('admin')),
);
?>

<h1>View Player #<?php echo $model->pers_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pers_id',
		'ext_id',
		'jersey_no',
		'position',
		'shoots',
		'height',
		'weight',
	),
)); ?>

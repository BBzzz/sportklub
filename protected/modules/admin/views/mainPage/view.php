<?php
$this->menu=array(
	array('label'=>'List MainPage', 'url'=>array('index')),
	array('label'=>'Create MainPage', 'url'=>array('create')),
	array('label'=>'Update MainPage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MainPage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MainPage', 'url'=>array('admin')),
);
?>

<h1>View MainPage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lang',
		'title',
		'content:ntext',
	),
)); ?>

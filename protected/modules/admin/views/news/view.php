<?php
$this->menu=array(
	array('label'=>'Új hír', 'url'=>array('create')),
	array('label'=>'Hír módosítása', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hír törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Hírek adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>A <?php echo $model->page->title; ?> hír megtekitése</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lang',
		'n_date',
		'short_desc',
		'photo',
		'source',
	),
)); ?>

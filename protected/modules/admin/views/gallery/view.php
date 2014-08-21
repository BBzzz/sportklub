<?php
$this->menu=array(
	array('label'=>'Új galéria létrehozása', 'url'=>array('create')),
	array('label'=>'Galéria módosítása', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Galéria törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Galériák adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>A <?php echo $model->title; ?> galéria megtekintése</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'description',
	),
)); 
?>
<?php $this->renderPartial('_view', array('imageDataProvider'=>$imageDataProvider)); ?>

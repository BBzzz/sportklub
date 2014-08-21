<?php
$this->menu=array(
	array('label'=>'Összefoglaló módosítása', 'url'=>array('update', 'id'=>$model->g_id)),
	array('label'=>'Összefoglaló törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->g_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<h1><?php echo $model->page->title; ?> összefoglaló megtekintése</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'page.title',
		'short_desc:ntext',
		'author',
	),
)); ?>

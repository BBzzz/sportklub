<?php
$this->menu=array(
	array('label'=>'Új galéria létrehozása', 'url'=>array('create')),
);
?>

<h1>Galériák adminisztrálása</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'page_id',
		'title',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

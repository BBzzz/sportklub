<?php
$this->menu=array(
	array('label'=>'Új oldal', 'url'=>array('create')),
);
?>
<h1>Főoldal adminisztrálása</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'main-page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'lang',
		'type',
		'title',
		'content',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

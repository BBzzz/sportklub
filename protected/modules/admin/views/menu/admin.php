<?php
$this->menu=array(
	array('label'=>'Új menüpont', 'url'=>array('create')),
);
?>

<h1>Menük adminisztrálása</h1>

<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/
$this->widget(
    'CTreeView',
    array('url' => array('ajaxFillTree'))
); ?>

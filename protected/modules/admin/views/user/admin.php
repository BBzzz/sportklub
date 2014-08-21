<?php
$this->menu=array(
	array('label'=>'Új felhasználó', 'url'=>array('create')),
);
?>

<h1>Felhasználók adminisztrálása</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'username',
		'userrole',
		'email',
		'last_login_time',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>

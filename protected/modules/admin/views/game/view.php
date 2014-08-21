<?php
if ($model->recap)
	$visible = true;
else $visible = false;
$this->menu=array(
	array(
		'label'=>'Összefoglaló hozzáadása',
		'url'=>array('recap/create','gid'=>$model->id),
		'visible'=>!$visible,
	),
	array(
		'label'=>'Összefoglaló megtekintése',
		'url'=>array('recap/view','id'=>$model->id),
		'visible'=>$visible,
	),
	array('label'=>'Statisztika átvétele a jkb-ről', 'url'=>array('getstat','id'=>$model->id)),
	array('label'=>'Új mérkőzés', 'url'=>array('create')),
	array('label'=>'Mérkőzés módosítása', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Mérkőzés törlése', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Mérkőzések adminisztrálása', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?> mérkőzés megtekintése</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'g_date',
		array(
			'name'=>'g_time',
			'type'=>'time',
		),
		array(
			'header'=>'Hazai csapat',
			'name'=>'h_team.name',
		),
		array(
			'header'=>'Vendég csapat',
			'name'=>'a_team.name',
		),
		'gametype.description',
		'score',
		'g_state',
		'place',
	),
)); ?>

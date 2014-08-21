<?php

$this->menu=array(
	array('label'=>'Új mérkőzés felvitele', 'url'=>array('create')),
	array(
		'label'=>'Mérkőzések átvétele a jkb-ről', 
		'url'=>array('getgamesched'),
		'visible'=>Yii::app()->authManager->checkAccess("supervisor", Yii::app()->user->id)
	),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#game-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Mérkőzések adminisztrálása</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'game-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'gametype.description',
		'g_date',
		array(
			'name'=>'g_time',
			'type'=>'time',
		),
		array(
			'header'=>'Hazaiak',
			'name'=>'h_team.short_name'
		),
		array(
			'header'=>'Vendégek',
			'name'=>'a_team.short_name'
		),
		'score',
//		'place',
		array(
			'header' => 'Állapot',
			'class'=>'CCheckBoxColumn',
			'selectableRows'=>null,
			'checked' => '($data->g_state == 1)',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

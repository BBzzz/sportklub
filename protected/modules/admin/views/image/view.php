<?php

$this->menu=array(
	array('label'=>'List Image', 'url'=>array('index')),
	array('label'=>'Create Image', 'url'=>array('create')),
	array('label'=>'Update Image', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Image', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Image', 'url'=>array('admin')),
);
?>

<h1>A "<?php echo $model->title; ?>" című kép megtekintése</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'description',
		array(               
      'label'=>'kép',
      'type'=>'raw',
      'value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl.'/photos/'.$model->name,$model->title,array('width'=>250))),
    ),
//		'imageurl:image',
	),
)); ?>

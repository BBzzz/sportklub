<?php
/* @var $this MainPageController */
/* @var $model MainPage */

$this->breadcrumbs=array(
	'Main Pages'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MainPage', 'url'=>array('index')),
	array('label'=>'Create MainPage', 'url'=>array('create')),
	array('label'=>'View MainPage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MainPage', 'url'=>array('admin')),
);
?>

<h1>Update MainPage <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
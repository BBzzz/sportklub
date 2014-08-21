<?php
/* @var $this FunctionsController */
/* @var $model Functions */

$this->breadcrumbs=array(
	'Functions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Functions', 'url'=>array('index')),
	array('label'=>'Create Functions', 'url'=>array('create')),
	array('label'=>'View Functions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Functions', 'url'=>array('admin')),
);
?>

<h1>Update Functions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
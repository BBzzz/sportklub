<?php
/* @var $this RecapController */
/* @var $model Recap */

$this->breadcrumbs=array(
	'Recaps'=>array('index'),
	$model->g_id=>array('view','id'=>$model->g_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recap', 'url'=>array('index')),
	array('label'=>'Create Recap', 'url'=>array('create')),
	array('label'=>'View Recap', 'url'=>array('view', 'id'=>$model->g_id)),
	array('label'=>'Manage Recap', 'url'=>array('admin')),
);
?>

<h1>Update Recap <?php echo $model->g_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
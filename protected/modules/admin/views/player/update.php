<?php
/* @var $this PlayerController */
/* @var $model Player */

$this->breadcrumbs=array(
	'Players'=>array('index'),
	$model->pers_id=>array('view','id'=>$model->pers_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Player', 'url'=>array('index')),
	array('label'=>'Create Player', 'url'=>array('create')),
	array('label'=>'View Player', 'url'=>array('view', 'id'=>$model->pers_id)),
	array('label'=>'Manage Player', 'url'=>array('admin')),
);
?>

<h1>Update Player <?php echo $model->pers_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this RecapController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recaps',
);

$this->menu=array(
	array('label'=>'Create Recap', 'url'=>array('create')),
	array('label'=>'Manage Recap', 'url'=>array('admin')),
);
?>

<h1>Recaps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this MainPageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Main Pages',
);

$this->menu=array(
	array('label'=>'Create MainPage', 'url'=>array('create')),
	array('label'=>'Manage MainPage', 'url'=>array('admin')),
);
?>

<h1>Main Pages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

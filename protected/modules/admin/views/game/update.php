<?php
$this->menu=array(
	array('label'=>'Új mérkőzés', 'url'=>array('create')),
	array('label'=>'Mérkőzés megtekintése', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Mérkőzések adminisztrálása', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?> mérkőzés módosítása</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

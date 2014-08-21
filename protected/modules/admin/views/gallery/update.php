<?php
$this->menu=array(
	array('label'=>'Új galéria', 'url'=>array('create')),
	array('label'=>'Galéria megtekintése', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Galériák adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>A <?php echo $model->title; ?> galéria módosítása</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->renderPartial('_view', array('imageDataProvider'=>$imageDataProvider)); ?>

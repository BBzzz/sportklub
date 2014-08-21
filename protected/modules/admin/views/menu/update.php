<?php
$this->menu=array(
	array('label'=>'Új almenüpont', 'url'=>array('create','pid'=>$model->id)),
);
?>

<h1><?php echo $model->title; ?> menü módosítása</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

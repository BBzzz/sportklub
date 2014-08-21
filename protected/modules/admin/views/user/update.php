<?php
$this->menu=array(
	array('label'=>'Új felhasználó', 'url'=>array('create')),
	array('label'=>'Felhasználók adminisztrálása', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->username; ?> felhasználó adatainak módosítása</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

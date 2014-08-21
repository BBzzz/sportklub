<?php
$this->menu=array(
	array('label'=>'Galériák adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>Új galéria létrehozása</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

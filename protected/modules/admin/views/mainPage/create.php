<?php
$this->menu=array(
	array('label'=>'Főoldal adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>Oldal létrehozása</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

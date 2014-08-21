<?php

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Hírek adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>Új hír</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

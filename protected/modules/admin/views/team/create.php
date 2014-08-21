<?php
$this->menu=array(
	array('label'=>'Csapatok adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>Csapat létrehozása</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

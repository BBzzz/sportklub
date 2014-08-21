<?php
$this->menu=array(
	array('label'=>'Mérkőzések adminisztrálása', 'url'=>array('admin')),
);
?>

<h1>Új mérkőzés</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

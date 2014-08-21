<?php
/* @var $this RecapController */
/* @var $data Recap */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->g_id), array('view', 'id'=>$data->g_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_title')); ?>:</b>
	<?php echo CHtml::encode($data->r_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />


</div>
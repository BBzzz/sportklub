<?php
/* @var $this PlayerController */
/* @var $data Player */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pers_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pers_id), array('view', 'id'=>$data->pers_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ext_id')); ?>:</b>
	<?php echo CHtml::encode($data->ext_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jersey_no')); ?>:</b>
	<?php echo CHtml::encode($data->jersey_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shoots')); ?>:</b>
	<?php echo CHtml::encode($data->shoots); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />


</div>
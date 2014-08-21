<?php
/* @var $this TeamController */
/* @var $data Team */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('off_name')); ?>:</b>
	<?php echo CHtml::encode($data->off_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('short_name')); ?>:</b>
	<?php echo CHtml::encode($data->short_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place')); ?>:</b>
	<?php echo CHtml::encode($data->place); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('participant')); ?>:</b>
	<?php echo CHtml::encode($data->participant); ?>
	<br />

	*/ ?>

</div>
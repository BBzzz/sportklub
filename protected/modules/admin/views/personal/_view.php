<?php
/* @var $this PersonalController */
/* @var $data Personal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('f_name')); ?>:</b>
	<?php echo CHtml::encode($data->f_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('function')); ?>:</b>
	<?php echo CHtml::encode($data->function); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('b_place')); ?>:</b>
	<?php echo CHtml::encode($data->b_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('b_date')); ?>:</b>
	<?php echo CHtml::encode($data->b_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv')); ?>:</b>
	<?php echo CHtml::encode($data->cv); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>
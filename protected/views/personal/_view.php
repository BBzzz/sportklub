<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_function')); ?>:</b>
	<?php echo CHtml::encode($data->position->description); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>

</div>

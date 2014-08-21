<?php
/* @var $this AdController */
/* @var $data Ad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner')); ?>:</b>
	<?php echo CHtml::encode($data->banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('script')); ?>:</b>
	<?php echo CHtml::encode($data->script); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('web')); ?>:</b>
	<?php echo CHtml::encode($data->web); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_from')); ?>:</b>
	<?php echo CHtml::encode($data->date_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_to')); ?>:</b>
	<?php echo CHtml::encode($data->date_to); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_status')); ?>:</b>
	<?php echo CHtml::encode($data->ad_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tot_app')); ?>:</b>
	<?php echo CHtml::encode($data->tot_app); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apps')); ?>:</b>
	<?php echo CHtml::encode($data->apps); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_visits')); ?>:</b>
	<?php echo CHtml::encode($data->no_visits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_type')); ?>:</b>
	<?php echo CHtml::encode($data->ad_type); ?>
	<br />

	*/ ?>

</div>
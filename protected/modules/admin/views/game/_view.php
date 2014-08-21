<?php
/* @var $this GameController */
/* @var $data Game */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ext_id')); ?>:</b>
	<?php echo CHtml::encode($data->ext_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_date')); ?>:</b>
	<?php echo CHtml::encode($data->g_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_time')); ?>:</b>
	<?php echo CHtml::encode($data->g_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_a')); ?>:</b>
	<?php echo CHtml::encode($data->team_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_h')); ?>:</b>
	<?php echo CHtml::encode($data->team_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_cat')); ?>:</b>
	<?php echo CHtml::encode($data->g_cat); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('score_a')); ?>:</b>
	<?php echo CHtml::encode($data->score_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_h')); ?>:</b>
	<?php echo CHtml::encode($data->score_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_state')); ?>:</b>
	<?php echo CHtml::encode($data->g_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('live')); ?>:</b>
	<?php echo CHtml::encode($data->live); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('season')); ?>:</b>
	<?php echo CHtml::encode($data->season); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place')); ?>:</b>
	<?php echo CHtml::encode($data->place); ?>
	<br />

	*/ ?>

</div>
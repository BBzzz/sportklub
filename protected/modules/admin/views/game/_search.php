<?php
/* @var $this GameController */
/* @var $model Game */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ext_id'); ?>
		<?php echo $form->textField($model,'ext_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_date'); ?>
		<?php echo $form->textField($model,'g_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_time'); ?>
		<?php echo $form->textField($model,'g_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_a'); ?>
		<?php echo $form->textField($model,'team_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_h'); ?>
		<?php echo $form->textField($model,'team_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_cat'); ?>
		<?php echo $form->textField($model,'g_cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_a'); ?>
		<?php echo $form->textField($model,'score_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score_h'); ?>
		<?php echo $form->textField($model,'score_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_state'); ?>
		<?php echo $form->textField($model,'g_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'season'); ?>
		<?php echo $form->textField($model,'season',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'place'); ?>
		<?php echo $form->textField($model,'place',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

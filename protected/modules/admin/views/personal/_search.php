<?php
/* @var $this PersonalController */
/* @var $model Personal */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'f_name'); ?>
		<?php echo $form->textField($model,'f_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_function'); ?>
		<?php echo $form->textField($model,'p_function'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b_place'); ?>
		<?php echo $form->textField($model,'b_place',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b_date'); ?>
		<?php echo $form->textField($model,'b_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv'); ?>
		<?php echo $form->textArea($model,'cv',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo'); ?>
		<?php echo $form->textField($model,'photo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

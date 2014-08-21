<?php
/* @var $this PlayerController */
/* @var $model Player */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'player-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pers_id'); ?>
		<?php echo $form->textField($model,'pers_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'pers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ext_id'); ?>
		<?php echo $form->textField($model,'ext_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'ext_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jersey_no'); ?>
		<?php echo $form->textField($model,'jersey_no'); ?>
		<?php echo $form->error($model,'jersey_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shoots'); ?>
		<?php echo $form->textField($model,'shoots',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'shoots'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
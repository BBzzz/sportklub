<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_name'); ?>
		<?php echo $form->textField($model,'f_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'f_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_function'); ?>
		<?php echo $form->dropDownList($model,'p_function',$model->getFunctions()); ?>
		<?php echo $form->error($model,'p_function'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'b_place'); ?>
		<?php echo $form->textField($model,'b_place',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'b_place'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'b_date'); ?>
		<?php echo $form->textField($model,'b_date'); ?>
		<?php echo $form->error($model,'b_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cv'); ?>
		<?php echo $form->textArea($model,'cv',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php echo $form->fileField($model,'photo'); ?>
		<?php echo $form->error($model,'photo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Létrehozás' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

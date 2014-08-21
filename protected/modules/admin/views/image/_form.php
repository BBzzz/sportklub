<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'image-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">A <span class="required">*</span>(csillaggal) jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
     <?php echo $form->labelEx($model,'name'); ?>
     <?php echo $form->fileField($model,'name'); ?> 
     <?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Létrehoz' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

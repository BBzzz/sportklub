<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

	<div class="row">
     <?php echo $form->labelEx($model,'banner'); ?>
     <?php echo $form->fileField($model,'banner'); ?> 
     <?php echo $form->error($model,'banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'script'); ?>
		<?php echo $form->textArea($model,'script',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'script'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web'); ?>
		<?php echo $form->textField($model,'web',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'web'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_type'); ?>
		<?php echo $form->textField($model,'ad_type',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ad_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
Yii::app()->clientScript->registerScript('content_chg', "
$('#Recap_content').change(function(){
	content = $('#Recap_content').val();
	split_cont = content.split('.');
	$('#Recap_short_desc').val(split_cont[0]+'.');
	return false;
});",
CClientScript::POS_READY
);?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Recap-form',
)); ?>

	<p class="note">A <span class="required">*</span>(csillaggal) jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'denomination'); ?>
		<?php echo $form->textField($model,'denomination',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'denomination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_desc'); ?>
		<?php echo $form->textArea($model,'short_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'short_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Létrehozás' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
Yii::app()->clientScript->registerScript('content_chg', "
$('#News_content').change(function(){
	content = $('#News_content').val();
	split_cont = content.split('.');
	$('#News_short_desc').val(split_cont[0]+'.');
	return false;
});",
CClientScript::POS_READY
);?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">A <span class="required">*</span>(csillaggal) jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->dropDownList($model,'lang',Yii::app()->params->languages); ?>
		<?php echo $form->error($model,'lang'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'n_date'); ?>
		<?php echo $form->textField($model,'n_date'); ?>
		<?php echo $form->error($model,'n_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php echo $form->fileField($model,'photo'); ?>
		<?php echo $form->error($model,'photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'source'); ?>
		<?php echo $form->textField($model,'source',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'source'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Létrehozás' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

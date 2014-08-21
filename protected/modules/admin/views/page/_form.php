<?php
Yii::app()->clientScript->registerScript('content_chg', "
$('#Page_content').change(function(){
	content = $('#Page_content').val();
	split_cont = content.split('.');
	$('#Page_short_desc').val(split_cont[0]+'.');
	return false;
});",
CClientScript::POS_READY
);?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
)); ?>

	<p class="note">A <span class="required">*</span>(csillaggal) jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php echo $form->dropDownList($model,'menu_id',$model->getMenus()); ?>
		<?php echo $form->error($model,'menu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Létrehozás' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

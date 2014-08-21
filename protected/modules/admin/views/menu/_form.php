<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-form',
)); ?>

	<p class="note">A <span class="required">*</span>(csillaggal) jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->dropDownList($model,'lang',Yii::app()->params->languages); ?>
		<?php echo $form->error($model,'lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Létrehozás' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

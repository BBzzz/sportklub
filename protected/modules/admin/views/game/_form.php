<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
)); ?>

	<p class="note">A <span class="required">*</span>(csillaggal) jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ext_id'); ?>
		<?php echo $form->textField($model,'ext_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ext_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g_date'); ?>
		<?php echo $form->textField($model,'g_date'); ?>
		<?php echo $form->error($model,'g_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g_time'); ?>
		<?php echo $form->textField($model,'g_time'); ?>
		<?php echo $form->error($model,'g_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_h'); ?>
		<?php echo $form->dropDownList($model,'team_h',$model->getTeams()); ?>
		<?php echo $form->error($model,'team_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_a'); ?>
		<?php echo $form->dropDownList($model,'team_a',$model->getTeams()); ?>
		<?php echo $form->error($model,'team_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g_cat'); ?>
		<?php echo $form->dropDownList($model,'g_cat',$model->getGameType()); ?>
		<?php echo $form->error($model,'g_cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score_h'); ?>
		<?php echo $form->textField($model,'score_h'); ?>
		<?php echo $form->error($model,'score_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score_a'); ?>
		<?php echo $form->textField($model,'score_a'); ?>
		<?php echo $form->error($model,'score_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textField($model,'place',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Létrehozás' : 'Mentés'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

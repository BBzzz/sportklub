<?php
/* @var $this AdController */
/* @var $model Ad */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner'); ?>
		<?php echo $form->textField($model,'banner',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'script'); ?>
		<?php echo $form->textArea($model,'script',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'web'); ?>
		<?php echo $form->textField($model,'web',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_from'); ?>
		<?php echo $form->textField($model,'date_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_to'); ?>
		<?php echo $form->textField($model,'date_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_status'); ?>
		<?php echo $form->textField($model,'ad_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tot_app'); ?>
		<?php echo $form->textField($model,'tot_app'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apps'); ?>
		<?php echo $form->textField($model,'apps'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_visits'); ?>
		<?php echo $form->textField($model,'no_visits',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_type'); ?>
		<?php echo $form->textField($model,'ad_type',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
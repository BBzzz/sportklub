<!--<script>
function addNewImage()
{
    <?php echo CHtml::ajax(array(
            'url'=>array('image/create', 'gid'=>$model->id),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#img_form div.divForForm').html(data.div);
                    $('#img_form div.divForForm form').submit(addNewImage);
                }
                else
                {
                    $('#img_form div.divForForm').html(data.div);                 
//										$('#Partener_cod_postal').val(data.cod);
//										$('#Partener_cod_postal').trigger('change');
										setTimeout(\"$('#img_form').dialog('close') \",3000);
                }
            } ",
            ))?>;
    return false;
}
</script>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'img_form',
    'options'=>array(
        'title'=>'Új kép csatolása',
        'autoOpen'=>false,
				'modal'=>true,
				'width'=>600,
        'height'=>360,
    ),
));?>

<div class="divForForm"></div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>-->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
)); ?>

	<p class="note">A <span class="required">*</span>(csillaggal) jelölt mezők kitöltése kötelező.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_id'); ?>
		<?php echo $form->dropDownList($model,'page_id',$model->getPages()); ?>
		<?php echo $form->error($model,'page_id'); ?>
	</div>

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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Létrehozás' : 'Mentés'); ?>
		<?php echo CHtml::link('Új kép csatolása', array('image/create','gid'=>$model->id));?>		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->menu=array(
	array('label'=>'Új személy felvitele', 'url'=>array('create')),
	array('label'=>'Személyek átvétele a jkb-ről', 'url'=>array('getplayers')),
);

Yii::app()->clientScript->registerScript('check', "
$(document).on('click','.checkbox-column input:checkbox',function() {
	if ($(this).is(':checked')){					
			selected = $(this).val();
			$.ajax({
				type: 'POST',
				url:'".$this->createUrl('personal/activate')."',
				data:{sel:selected},
				dataType: 'json',
				success: function(data){
					location.reload();
				},
			})
	}
	return false;
});
");

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#personal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Személyzet adminisztrálása</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fullname',
		array(
			'header'=>'Kép',
			'type'=>'raw',
			'value'=>'CHtml::image(Yii::app()->baseUrl."/photos/".$data->photo,"",array("width"=>70))',
		),
		'pfunction',
		'b_place',
		'b_date',
		array(
			'header' => 'Aktív?',
			'class'=>'CCheckBoxColumn',
			'selectableRows'=>null,
			'checked' => '($data->active == 1)',
		),
		/*
		'cv',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

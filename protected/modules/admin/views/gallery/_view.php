<h2>Csatolt képek</h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'image-grid',
	'dataProvider'=>$imageDataProvider,
	'columns'=>array(
		'title',
		'description',
		array(
			'header'=>'Kép',
			'type'=>'raw',
			'value'=>'CHtml::image(Yii::app()->baseUrl."/photos/".$data->name,$data->title,array("height"=>100))',
		),
		array(
       'class'=>'CButtonColumn',
			 'viewButtonUrl'=>'Yii::app()->createUrl("admin/image/view/",array("id"=>$data->id))',
			 'updateButtonUrl'=>'Yii::app()->createUrl("admin/image/update/",array("id"=>$data->id))',
       'deleteButtonUrl'=>'Yii::app()->createUrl("admin/image/delete/",array("id"=>$data->id))',
     ),
	),
)); ?>

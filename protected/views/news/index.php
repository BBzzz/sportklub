<header>
	<h2><?php echo Yii::t('default','Hírek');?></h2>
</header>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'summaryText'=>'',
)); ?>

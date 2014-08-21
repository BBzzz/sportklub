<article class="view">
	<div class="datum">	
	<?php echo Yii::app()->format->date($data->n_date); ?>
	</div>
	<h2><?php echo CHtml::link(CHtml::encode($data->page->title), array('page/view', 'slug'=>$data->page->slug)); ?></h2>
	<div class="tart">
	<?php	echo CHtml::encode(Yii::app()->format->ntext($data->short_desc)); ?>
	</div>
</article>

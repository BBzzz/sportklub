<?php
$gallery = Gallery::model()->findByAttributes(array('page_id'=>$model->id));
if ($gallery) {
	$images = $gallery->images;
	foreach ($images as $image){
		$image = Yii::app()->baseUrl.'/photos/'.$image->name;
		break;
	}
}
?>
<header class="page">
	<?php if (isset($image)):?>
	<div class="main_picture" style="background-image: url(<?php echo $image;?>);"></div>	
	<h2><?php echo $model->title; ?></h2>
	<?php else: ?>
	<h3><?php echo $model->title; ?></h3>
	<?php if ($model->news){
					if ($model->news->source)
						echo "<div class='forras'>".CHtml::link($model->news->source,$model->news->source,array('target'=>'_blank'))."</div>";
					echo "<div class='datum'>".Yii::app()->format->date($model->news->n_date)."</div>";
				}
		endif ;?>
</header>
<div class="page">
	<?php 
			if ($model->news)
				echo "<div class='kivonat'>".Yii::app()->format->ntext($model->news->short_desc)."</div>";
			echo Yii::app()->format->ntext($model->content);?>
</div>

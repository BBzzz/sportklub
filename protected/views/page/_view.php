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
	<header class="mpage">
	<?php if (isset($image)):?>
		<div class="main_v_picture" style="background-image: url(<?php echo $image;?>);"></div>
	<?php endif;?>			
	</header>
	<div class="mpage">
		<h2><?php echo CHtml::link($model->title,Yii::app()->createUrl('page/view', array('slug' => $model->slug))); ?></h2>
	<?php
	$content = substr($model->content,0,300); 
	echo Yii::app()->format->ntext($content);?>
	</div>

<?php
$gallery = Gallery::model()->findByAttributes(array('page_id'=>$data->id));
if ($gallery) {
	$images = $gallery->images;
	foreach ($images as $image){
		$image = Yii::app()->baseUrl.'/photos/'.$image->name;
		break;
	}
}
else
	$image = Yii::app()->request->baseUrl.'/assets/images/csapat.jpg';
?>
<header class="mpage">
<?php if (isset($image)):?>
		<div class="main_v_picture" style="background-image: url(<?php echo $image;?>);"></div>
<?php endif;?>			
</header>
<div class="mpage">
	<h2><?php echo CHtml::link($data->title,Yii::app()->createUrl('page/view', array('slug' => $data->slug))); ?></h2>
<?php
echo Yii::app()->format->ntext($data->content);?>
</div>

<div class="view">
	<div class="bs_type">
	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/assets/images/'.$data->gametype->type.'-logo.png',Yii::t('default',$data->gametype->description)); ?>
	<?php echo CHtml::encode(Yii::t('default',$data->gametype->description)); ?>
	</div>
	<div class="bs_data">
	<?php echo CHtml::encode(Yii::app()->getLocale()->dateFormatter->format('y.MM.d, eeee',$data->g_date)); ?>
	<?php echo "(".CHtml::encode(Yii::app()->format->time($data->g_time)).")"; ?>
	<?php //echo CHtml::link('',Yii::app()->createUrl('page/view', array('slug' => $data->page->slug))); ?>
	</div>
	<div class="bs_team">
		<div class="t_logo">
		<?php echo CHtml::image(Yii::app()->baseUrl."/photos/".$data->h_team->logo,$data->h_team->name); ?>
		</div>
		<div class="t_logo">
		<?php echo CHtml::image(Yii::app()->baseUrl."/photos/".$data->a_team->logo,$data->a_team->name); ?>
		</div>
		<div class="t_name">
		<?php echo CHtml::encode($data->h_team->name); ?>
		</div>
		<div class="t_name">
		<?php echo CHtml::encode($data->a_team->name); ?>
		</div>
	</div>
	<div class="bs_score">
	<?php echo CHtml::encode($data->score); ?>
	</div>
</div>

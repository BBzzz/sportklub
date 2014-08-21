<?php
$this->pageTitle=Yii::app()->name;
?>
<div class="main">
	<article class="news"><?php $this->getSlideShow(Yii::app()->language);?></article>
	<div class="sav">
		<article class="box">
			<h2><?php echo Yii::t('default','A bajnokság állása'); ?></h2>
			<?php $this->renderPartial('standings');?>
		</article>
		<article class="box">
			<h2><?php echo Yii::t('default','Statisztika vezetők'); ?></h2>		
		</article>
		<article class="box">
			<h2><?php echo Yii::t('default','Hírek'); ?></h2>
			<?php $this->getNews(Yii::app()->language);?>
		</article>
	</div>
</div>
<aside class="main-side">
	<div class="r-box">
		<h2><?php echo Yii::t('default','Eredményjelző'); ?></h2>
		<?php $this->getLastBoxScore(Yii::app()->language);?>
	</div>
	<div class="r-box">
		<?php 
			$this->widget('zii.widgets.jui.CJuiAccordion',array(
    		'panels'=>array(
        	Yii::t('default','Mérkőzésnaptár')=>$this->renderPartial('calendar',null,true),
        	Yii::t('default','Állás')=>$this->renderPartial('standings',null,true),
        	Yii::t('default','Statisztikák')=>$this->renderPartial('bla',null,true),
    			),
    		// additional javascript options for the accordion plugin
    			'options'=>array(
        		'animated'=>'bounceslide',
    			),
				));?>
	</div>
<!--	<div class="r-box">
		<h2><?php echo Yii::t('default','Eredményjelző'); ?></h2>
		<?php $this->getLastBoxScore(Yii::app()->language);?>
	</div>-->
</aside>

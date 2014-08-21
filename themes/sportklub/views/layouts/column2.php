<?php $this->beginContent(); ?>
<article class="big bottom">
		<?php echo $content; ?>
</article>
<aside>
<?php
	$controller = Yii::app()->getController();
	$isGame = $this->getId() === 'game';
	if ($isGame):?>
		<div class="r-box">
			<h2><?php echo Yii::t('default','Eredményjelző'); ?></h2>
			<?php $this->getBoxScore(170);?>
		</div>
		<div class="r-box">
			<h2><?php echo Yii::t('default','Gólok'); ?></h2>
		</div>
		<div class="r-box">
			<h2><?php echo Yii::t('default','Büntetések'); ?></h2>
		</div>
		<div class="r-box">
			<h2><?php echo Yii::t('default','Kapus statisztika'); ?></h2>
		</div>
<?php	else:
				$this->getSidePage(Yii::app()->language);
			endif;
?>
</aside>
<?php $this->endContent(); ?>

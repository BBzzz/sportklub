<?php $this->beginContent(); ?>
	<article class="big left bottom">
		<?php echo $content; ?>
	</article>
	<aside class="right">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Műveletek',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</aside>
<?php $this->endContent(); ?>

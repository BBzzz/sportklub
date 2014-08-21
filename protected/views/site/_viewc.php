<?php
$class="viewc";
$put_link = false; 
if ($data->isRelevantDate):
	$game = $this->getGames($data->date); 
	if ($game):
		$class .= ($game->team_h == 1) ? ' home' : ' away';
		$team = ($game->team_h == 1) ? $game->a_team->short_name : $game->h_team->short_name;
		if ($game->score_h > 0 && $game->score_a > 0)
			$put_link = true;
		if ($put_link):
?>
	<a href="<?echo Yii::app()->createUrl('/game/view',array('id'=>$game['id']));?>">
		<? endif; ?>
		<div class="<?php echo $class;?>">
			<?php echo $data->date->format('j'); ?>
			<span style="font-size: 80%;"><?php echo $team; ?></span>
			<?php if ($game->g_time > 0): ?>
			<span style="font-size: 70%;"><?php echo Yii::app()->format->time($game->g_time); ?></span>
			<? endif; ?>
		</div>
		<?php if ($put_link):?>
	</a>
		<? endif; ?>
		<? else: ?>
		<div class="<?php echo $class;?>">
		<?php echo $data->date->format('j'); ?>
		</div>
		<? endif; ?>
<? else: ?>
<div class="<?php echo $class;?>">
<?php echo $data->date->format('j'); ?>
</div>
<? endif; ?>

<header>
	<h2><?php echo Yii::t('default','Játékosok');?></h2>
</header>
<div class="view">
<!--<h3><?php echo Yii::t('default','Csatárok');?></h3>-->
<table class="items" border="1">
	<thead>
	<tr>
	<th>#</th>
	<th>Név</th>
	<th>Pozició</th>
	<th>Magasság</th>
	<th>Testsúly</th>
	<th>Születési hely</th>
	<th>Állampolgárság</th>
	<th>Életkor</th>
	</tr>
	</thead>
<?php
$data_arr = $dataProvider->getData();

foreach($data_arr as $data) {
	$citizenship = $data->person->citizenship;
	if ($data->person->citizenship2)
		$citizenship .= ", ".$data->person->citizenship2;
	$age = date("Y",strtotime("now"))-date("Y",strtotime($data->person->b_date));
	echo "<tr>";
  echo "<td>".$data->jersey_no."</td>";
	echo "<td>".$data->person->fullname."</td>";
	echo "<td>".$data->position."</td>";
	echo "<td>".$data->height."</td>";
	echo "<td>".$data->weight."</td>";
	echo "<td>".$data->person->b_place."</td>";
	echo "<td>".$citizenship."</td>";
	echo "<td>".$age."</td>";
	echo "</tr>";
}
?>
</table>
</div>

<?php $this->widget('ecalendarview.ECalendarView', array(
  'id' => 'MyCalendar',
  'weeksInRow' => 1,
  'itemView' => '_viewc',
//  'titleView' => '_title',
  'cssFile' => 'assets/css/calendar.css',
  'ajaxUpdate' => true,
  'dataProvider' => array(
    'pagination' => array(
      'currentDate' => new DateTime("now"),
      'pageSize' => 'month',
      'pageIndex' => 0,
      'pageIndexVar' => 'MyCalendar_page',
      'isMondayFirst' => true,
    )
  )
)); ?>
<div class="legend">
		<div class="home"></div>
		<div class="cimke"><?php echo Yii::t('default','Otthon');?></div>
		<div class="away"></div>
		<div class="cimke"><?php echo Yii::t('default','Idegenben');?></div>
</div>

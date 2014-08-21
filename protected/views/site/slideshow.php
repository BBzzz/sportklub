<?php
Yii::app()->bootstrap->register();
$this->widget('bootstrap.widgets.BootSlider',
    array('itemView'=>'_list',//_list is the php file to render
        'id'=>'Mycarousel',//id of Carousel
        'slide'=>array(true,5000),//to slide after 2seconds   
        'dataProvider'=>$dataProvider,
        'coloumCount'=>1,//no of items to shown in slider
));?>

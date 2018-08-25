<?php

use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use app\assets\main\FullCalendar;

FullCalendar::register($this); 

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/event', 'Events');
$this->params['breadcrumbs'][] = $this->title;

$events =  json_encode($events);

Url::remember();
?>
    <p>
        <?= Html::a(Yii::t('db/event', 'Create Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div id="<?=$item?>">

</div>

<?

$this->registerJs(
    " 
        $('#".$item."').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,listMonth'
              },
            locale: 'pl',
            buttonIcons: true, 
            navLinks: false, 
            editable: false,
            aspectRatio: 2.3,
            events: {$events},
            });",
	View::POS_READY,
	'calendar'
);

?>

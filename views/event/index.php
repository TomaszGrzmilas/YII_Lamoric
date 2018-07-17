<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii2fullcalendar\yii2fullcalendar;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/event', 'Events');
$this->params['breadcrumbs'][] = $this->title;

?>
<div id="<?=$item?>">

    <p>
        <?= Html::a(Yii::t('db/event', 'Create Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


      <?= yii2fullcalendar::widget(
        [
            'clientOptions' => [
                'editable'=> false,
            ],
            'options' => [
                'header' => ['right' => ['month,agendaWeek,agendaDay,listMonth']]
              //  'lang'=>'en',
            ],
            'events'=> $events,
        ]
    );
    ?>

   
</div>

<?
/*
$this->registerJs(
    "$('#".$item."').fullCalendar({
        buttonIcons: false, 
        navLinks: true, 
        editable: true,
        })
    ",
	View::POS_READY,
	'calendar'
);
*/
?>

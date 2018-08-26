<?php

use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use app\assets\main\FullCalendar;

FullCalendar::register($this); 

$create_button = Yii::t('db/event', 'Create Event');
$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/event', 'Events');
$this->params['breadcrumbs'][] = $this->title;

$events =  json_encode($events);

Url::remember();
?>
<div id="<?=$item?>">

</div>
<?
/*
 echo $this->render('_modal_form_create_', [
    'model' => $model,
    'title' => Yii::t('app', 'Import')
    ]);
*/
$this->registerJs(
    " 
        $('#".$item."').fullCalendar({
            customButtons: {
                myCustomButton: {
                  text: '{$create_button}',
                  click: function() {
                    window.location.href = '/event/create';
                  }
                }
              },
            header: {
                left: 'prev,next today myCustomButton',
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

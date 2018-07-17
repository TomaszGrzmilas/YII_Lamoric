<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\event\Event */

$this->title = Yii::t('db/event', 'Create Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/event', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

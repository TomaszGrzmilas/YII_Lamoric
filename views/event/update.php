<?php

use yii\helpers\Html;

$this->title = Yii::t('db/event', 'Update Event: ' . $model->title, [
    'nameAttribute' => '' . $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/event', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->event_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="event-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

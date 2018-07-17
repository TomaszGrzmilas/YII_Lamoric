<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\event\Event */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/event', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('db/event', 'Update'), ['update', 'id' => $model->event_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('db/event', 'Delete'), ['delete', 'id' => $model->event_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('db/event', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event_id',
            'title',
            'body',
            'start',
            'end',
            'all_day',
            'color',
        ],
    ]) ?>

</div>

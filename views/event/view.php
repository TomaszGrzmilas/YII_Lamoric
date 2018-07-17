<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\color\ColorInput;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/event', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="event-view">
    <div class="row">
        <div class="col-xs-6">
            <p>
                <?= Html::a(Yii::t('app', 'Back'), ['event/index'], ['class' => 'btn btn-info']) ?>            
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->event_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->event_id], [
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
                    'title',
                    'body',
                    'start',
                    'end',
                    'color'=>[
                        'attribute' => 'color',
                        'value' => ColorInput::widget([
                                    'name' => 'color',
                                    'value' => $model->color,
                                    'disabled' => true                                  
                                ]),
                        'format' => 'raw'
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>

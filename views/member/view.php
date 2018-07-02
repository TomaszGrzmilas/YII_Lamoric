<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/member', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Url::remember();
?>

<div class="member-view">
    <div class="row">
        <div class="col-xs-8">
        <p>
                <?= Html::a(Yii::t('app', 'Back'), ['member/index'], ['class' => 'btn btn-gray']) ?>            
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'POST',
                    ],
                ]) ?>
            </p>
   
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'surname',
                    'pesel',
                    'zip_code',
                    'city',
                    'street',
                    'building',
                    'local',
                    'phone',
                    'email:email',
                    'company.name',
                    'workspace.name',
                    'notes',
                    'contribution:currency',
                ],
            ]) ?>
        </div>
    </div>
</div>

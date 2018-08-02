<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = $model->member->fullName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/member', 'Members'), 'url' => ['/member/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/balanceaccount', 'Balance Accounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => \app\models\balance_account\BalanceTransaction::find()->where(['account_id'=> $model->id]),
]);
?>
<div class="balance-account-view">
    <div class="row">
        <div class="col-xs-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'balance',
                        'format' => 'currency',
                        'contentOptions' => ($model->balance < 0 ? ['style' => 'color:red'] : ['style' => 'color:green']),
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
<div class="balance-transaction-index">
    <div class="row">
        <div class="col-xs-6">
            <?= GridView::widget([
                    'dataProvider' => $dataProvider ,
                    'summary'=> '',                    
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        [
                            'attribute' => 'date',
                            'format' => ['date', 'php:Y-m-d H:m:i'],
                        ],
                        [
                            'attribute' => 'amount',
                            'format' => ['currency'],
                            'contentOptions' => function ($model, $key, $index, $column) {
                                return ['style' => 'color:' 
                                    . ($model->amount < 0 ? 'red' : 'green')];
                            },
                        ],
                        'data',
                    ],
                ]) ?>
        </div>
    </div>
</div>

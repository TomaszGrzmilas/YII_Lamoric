<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/balanceaccount', 'Balance Accounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-account-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'balance',
        ],
    ]) ?>

<?
     $dataProvider = new \yii\data\ActiveDataProvider([
        'query' => \app\models\balance_account\BalanceTransaction::find()->where(['account_id'=> $model->id]),
    ]);
   
    echo GridView::widget([
        'dataProvider' => $dataProvider ,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'date',
                'format' => ['date', 'php:Y-m-d H:m:i'],
            ],
            'amount:currency',
            'data',
        ],
    ]); 
    
   
    ?>


</div>

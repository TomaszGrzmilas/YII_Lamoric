<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BalanceAccount */

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

</div>

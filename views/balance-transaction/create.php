<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BalanceTransaction */

$this->title = Yii::t('db/balancetransaction', 'Create Balance Transaction');
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/balancetransaction', 'Balance Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

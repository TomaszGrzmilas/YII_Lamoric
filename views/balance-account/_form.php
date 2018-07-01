<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BalanceAccount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="balance-account-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'balance')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('db/balanceaccount', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

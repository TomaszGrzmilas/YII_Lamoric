<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Workplace */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-xs-4">
        <div class="workplace-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'company_id')->dropDownList($model->CompanyList); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
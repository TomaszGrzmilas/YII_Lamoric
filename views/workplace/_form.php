<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

?>

<div class="row">
    <div class="col-xs-4">
        <div class="workplace-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'company_id')->dropDownList($model->CompanyList); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn btn-info btn-lg']) ?>   
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success  btn-lg']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
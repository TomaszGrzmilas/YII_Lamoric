<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

?>

<div class="row">
    <div class="col-xs-6">
        <div class="company-form">

            <?php $form = ActiveForm::begin(['action'=> ['company/import']]); ?>

            <?= $form->field($model, 'importfile')->fileInput(['accept'=> '.csv', 'id'=>'importfile']) ?>

            <div class="form-group">
                <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn btn-info']) ?>            
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
          
        </div>
    </div>
</div>

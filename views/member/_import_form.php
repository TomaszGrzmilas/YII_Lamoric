<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

?>

<div class="row">
    <div class="col-xs-6">
        <div class="company-form">

            <?php $form = ActiveForm::begin(['action'=> ['member/import']]); ?>

            <?= $form->field($model, 'importfile')->fileInput(['accept'=> '.csv', 'id'=>'importfile']) ?>

            <div class="form-group">
                <?= Html::button( Yii::t('app', 'Cancel'), ['type' => 'button', 'title' => Yii::t('app', 'Cancel'), 'class' => 'btn btn-gray', 'data-toggle'=>'modal', 'data-target' => '#modal-table']) ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
          
        </div>
    </div>
</div>

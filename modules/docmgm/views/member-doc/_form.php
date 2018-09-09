<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<div class="member-doc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'file_id')->fileInput(['maxlength' => true, 'accept'=>'.doc, .docx']) ?>

    <div class="form-group">
        <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn btn-info btn-lg']) ?>            
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

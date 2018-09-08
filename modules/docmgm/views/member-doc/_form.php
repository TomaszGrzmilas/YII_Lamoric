<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="member-doc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'file_id')->fileInput(['maxlength' => true, 'accept'=>'.doc, .docx']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('db/memberdoc', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

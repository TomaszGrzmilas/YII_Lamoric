<?php

use yii\helpers\Html;
use dektrium\user\helpers\Timezone;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                ]); ?>

                <div class="form-group field-GrossPay">
                    <label class="col-lg-3 control-label" for="GrossPay"><?=  Yii::t('db/company', 'Company') ?></label>
                        <div class="col-lg-9"><input type="text" id="GrossPay" class="form-control" name="" value="<?= $model->company->name ?>" readonly=""></div>
                        <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
                    </div>
                </div>
                <!---
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?// Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
                        <br>
                    </div>
                </div>
                    -->
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
use kartik\color\ColorInput;

?>
<div class="row">
    <div class="col-sm-12 col-md-10 col-lg-8">
        <div class="event-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="col-xs-12 form-group">  
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 form-group">  
                <?= $form->field($model, 'body')->textArea(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-4 form-group">
                <?
                echo $form->field($model, 'start')->widget(DateTimePicker::classname(), [
                    'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]);
                ?>
            </div>
            <div class="col-xs-4 form-group">     
                <? 
                    echo $form->field($model, 'end')->widget(DateTimePicker::classname(), [
                        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true
                        ]
                    ]);
                ?>
            </div>

            <? //$form->field($model, 'all_day')->checkbox() ?>

            <div class="col-xs-4 form-group">     
                <?
                    echo $form->field($model, 'color')->widget(ColorInput::classname(), [
                        'options' => ['placeholder' => 'Kolor wydarzenia...',
                                    'readonly' => true
                                    ],
                    ]);
                ?>
            </div>
            <div class="col-xs-12 form-group">  
                <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn btn-info btn-lg']) ?>   
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg']) ?>
                <? if ($this->context->action->id == 'update') {
                    echo  Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->event_id], [
                    'class' => 'btn btn-danger btn-lg',
                    'data' => [
                        'confirm' => Yii::t('db/event', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]);
                } ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

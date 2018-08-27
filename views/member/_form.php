<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<div class="row">
    <div class="col-xs-12 col-md-8 member-form">
        <?php $form = ActiveForm::begin([
            'options'=> ['class'=>'dodajczlonka']
            ]); 
        ?>

        <div class="row">
            <div class="col-xs-12 col-md-4">
                <?= $form->field($model, 'name',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('name'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) 
                ?>
            </div>

            <div class="col-xs-12 col-md-8">
                <?= $form->field($model, 'surname',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('surname'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) 
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-8">
                <?= $form->field($model, 'street',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('street'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) 
            ?>
            </div>

            <div class="col-xs-12 col-md-2">
                <?= $form->field($model, 'building',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('building'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) 
                ?>
            </div>

            <div class="col-xs-12 col-md-2">
                <?= $form->field($model, 'local',  [
                        'inputOptions' => [
                            'placeholder' => $model->getAttributeLabel('local'),
                            'class' => 'default-input',
                        ],
                        'options'=>['class'=>''],
                        'template' => "{beginWrapper}\n
                                        {input}\n{hint}\n
                                        {error}\n
                                        {endWrapper}",
                    ])->textInput(['maxlength' => true]) 
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-4">
                <?= $form->field($model, 'zip_code',  [
                        'inputOptions' => [
                            'placeholder' => $model->getAttributeLabel('zip_code'),
                            'class' => 'default-input',
                        ],
                        'options'=>['class'=>''],
                        'template' => "{beginWrapper}\n
                                        {input}\n{hint}\n
                                        {error}\n
                                        {endWrapper}",
                    ])->textInput(['maxlength' => true]) 
                ?>
            </div>

            <div class="col-xs-12 col-md-8">
                <?= $form->field($model, 'city',  [
                        'inputOptions' => [
                            'placeholder' => $model->getAttributeLabel('city'),
                            'class' => 'default-input',
                        ],
                        'options'=>['class'=>''],
                        'template' => "{beginWrapper}\n
                                        {input}\n{hint}\n
                                        {error}\n
                                        {endWrapper}",
                    ])->textInput(['maxlength' => true]) 
                ?>
            </div>
        </div>
            
        <div class="row">
            <br />
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <?= $form->field($model, 'pesel',  [
                        'inputOptions' => [
                            'placeholder' => $model->getAttributeLabel('pesel'),
                            'class' => 'default-input',
                        ],
                        'options'=>['class'=>''],
                        'template' => "{beginWrapper}\n
                                        {input}\n{hint}\n
                                        {error}\n
                                        {endWrapper}",
                    ])->textInput(['maxlength' => true]) 
                ?>
            </div>
        </div>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <?= $form->field($model, 'phone',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('phone'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) 
            ?>
        </div>

        <div class="col-xs-12 col-md-8">
            <?= $form->field($model, 'email',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('email'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) 
            ?>
        </div>
    </div>

    <div class="row">
        <br />
    </div>
            
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <?= $form->field($model, 'company_id',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('company_id'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->dropDownList($model->CompanyList, ['prompt' => Yii::t('db/company', 'Chose company')])
            ?>
        </div>

        <div class="col-xs-12 col-md-6">
            <?= $form->field($model, 'workplace_id',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('workplace_id'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->dropDownList($model->WorkplaceList, ['prompt' => Yii::t('db/workplace', 'Chose workplace'),]) 
            ?>
        </div>

        <div class="col-xs-12 col-md-2">
            <?= $form->field($model, 'contribution',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('contribution'),
                        'class' => 'default-input',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) 
            ?>
        </div>
    </div>

    <div class="row">
        <br />
    </div>       

    <div class="row">
        <div class="col-xs-12">
            <?= $form->field($model, 'notes',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('notes'),
                        'class' => 'default-textarea',
                    ],
                    'options'=>['class'=>''],
                    'template' => "{beginWrapper}\n
                                    {input}\n{hint}\n
                                    {error}\n
                                    {endWrapper}",
                ])->textarea(['maxlength' => true, 'rows' => 7, 'style'=>'resize: none;'])
            ?>
        </div>
    </div>

    <div class="row">
        <br />
    </div>      

    <div class="row">
        <div class="col-xs-6">
            <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn-gray hvr-push']) ?>        
        </div>
        <div class="col-xs-6 text-right">
            <?= Html::a(Yii::t('app', 'Save and add next'), Url::toRoute(['/member/create', 'addnext' => 'value']), ['data-method' => 'post', 'class' => 'btn-unactive hvr-push']) ?> 
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn-red hvr-push']) ?>
        </div>
    </div>       
    
    <?php ActiveForm::end(); ?>

    </div>
</div>

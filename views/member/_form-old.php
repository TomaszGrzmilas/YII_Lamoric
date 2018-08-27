<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<div class="row">
    <div class="col-xs-8">
        <div class="member-form">

                <?php $form = ActiveForm::begin([
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'label' => 'col-xs-3',
                            'offset' => 'col-sm-offset-4',
                            'wrapper' => 'col-xs-9 inputGroupContainer',
                            'error' => '',
                            'hint' => '',
                        ],
                    ],
                    'options'=> ['class'=>'form-horizontal',
                                'style' => 'padding-top:20px;']]); ?>
 <div class="col-xs-6">
                <?= $form->field($model, 'name', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('name'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-user\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'surname',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('surname'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-user\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'pesel',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('pesel'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-user\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput() ?>

                <?= $form->field($model, 'zip_code',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('zip_code'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-home\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'city',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('city'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-home\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'street',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('street'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-home\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'building',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('building'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-home\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'local',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('local'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-home\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>
    </div>
  <div class="col-xs-6">
                <?= $form->field($model, 'phone',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('phone'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-earphone\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput() ?>

                <?= $form->field($model, 'email',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('email'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-envelope\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'company_id',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('company_id'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-list\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->dropDownList($model->CompanyList, ['prompt' => Yii::t('db/company', 'Chose company')]) ?>

                <?= $form->field($model, 'workplace_id', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('workplace_id'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-list\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->dropDownList($model->WorkplaceList, ['prompt' => Yii::t('db/workplace', 'Chose workplace'),]) ?>

                <?= $form->field($model, 'notes', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('notes'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-pencil\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textarea(['maxlength' => true, 'rows' => 7, 'style'=>'resize: none;']) ?>

                <?= $form->field($model, 'contribution',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('contribution'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-usd\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>
</div>

                <div class="form-group col-xs-12">
                        <div class="col-xs-6">&nbsp;</div>
                            <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn btn-info btn-lg']) ?>        
                            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg']) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

    </div>
</div>

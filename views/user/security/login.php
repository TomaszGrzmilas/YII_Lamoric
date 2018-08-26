<?php

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';

?>

<? // = $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>


<div class="log-in-bg">
    <div class="container-fluid">
        <div class="row">
                <div class="col-xs-12 col-md-3 log-in-frame">
                    <div class="log-in">

                        <h1>
                            <?= HTML::img('@web/layout.main\images\lamornic-log.png',['alt'=>'Lamoric']) ?>
                        </h1>

                     <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => [
                                'class' => 'log-in-form',
                            ],
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => false,
                            'validateOnBlur' => false,
                            'validateOnType' => false,
                            'validateOnChange' => false,
                        ]) ?>

                        <h2>Logowanie</h2>

                        <div class="log-in-inputs">
                            <?= $form->field($model, 'login',
                                [
                                'inputOptions' => [
                                    'autofocus' => 'autofocus', 
                                    'class' => 'form-control', 
                                    'tabindex' => '1', 
                                    'placeholder'=>"Login",
                                    'style' => 'padding: 20px; border-radius:0;',
                                ],
                                'template' => "
                                    {input}\n
                                    {error}\n",
                                ]
                            );
                            ?>
                       
                            <?= $form->field($model, 'password',
                                [
                                    'inputOptions' => [
                                        'class' => 'form-control',
                                        'tabindex' => '2',
                                        'placeholder'=>"Hasło",
                                        'style' => 'padding: 20px; border-radius:0;',
                                    ],
                                    'template' => "
                                    {input}\n
                                    {error}\n",
                                ])
                                ->passwordInput()
                                ?>

                        </div>

                        <?= Html::submitButton(
                            Yii::t('user', 'Sign in') . HTML::img('@web/layout.main\images\login-icn-log.png'),
                            [
                                'class' => 'hvr-pop', 
                                'tabindex' => '4'
                            ]
                            );
                        ?>
                        <?=
                            Html::a(Yii::t('user', 'Forgot password?'),
                            ['/user/recovery/request'],
                            ['tabindex' => '5']
                            );
                        ?>
                        <?php ActiveForm::end(); ?>

                    </div>
                    <?php if ($module->enableConfirmation): ?>
                        <p class="text-center">
                            <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
                        </p>
                    <?php endif ?>
                    <?php if ($module->enableRegistration): ?>
                        <p class="text-center">
                            <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
                        </p>
                    <?php endif ?>
                    <?= Connect::widget([
                        'baseAuthUrl' => ['/user/security/auth'],
                    ]) ?>
                </div>
            </div>
    </div>
</div>    
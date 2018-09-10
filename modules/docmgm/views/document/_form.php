<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use app\models\category\Category;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="document-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true])  ?>

            <?= $form->field($model, 'short_text')->textInput(['maxlength' => true])  ?>

            <?= $form->field($model, 'text')->widget(\dominus77\tinymce\TinyMce::className(), [    
    'options' => [
        'rows' => 20,
        'placeholder' => true,
    ], 
    'language' => 'pl',
    'clientOptions' => [
        'menubar' => true,
        'statusbar' => true,   
        'theme' => 'modern',
        'skin' => 'lightgray-gradient', //charcoal, tundora, lightgray-gradient, lightgray
        'plugins' => [
            "advlist autolink lists link image charmap preview hr anchor pagebreak placeholder",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "media nonbreaking save table contextmenu directionality",
            "emoticons paste textcolor colorpicker textpattern imagetools fontawesome noneditable",
        ],
        'noneditable_noneditable_class' => 'fa',
        'extended_valid_elements' => 'span[class|style]',
        'toolbar1' => "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        'toolbar2' => "preview media | forecolor backcolor emoticons fontawesome",
        'image_advtab' => true,   
        'content_css' => [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css',
            '//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
        ]
        ],
    'fileManager' => [
        'class' => \dominus77\tinymce\components\MihaildevElFinder::className(),
      //  'language' => '',
   //     'filter'   => 'image', 
    ], 
]);?>

            <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'category_id')->widget(kartik\tree\TreeViewInput::classname(),
            [
            'name' => 'category_id',
            'value' => 'true', 
            'model' => $model,
            'query' => Category::find()->addOrderBy('root, lft'),
            'rootOptions' => ['label'=>'Start'],
            'fontAwesome' => true,
            'asDropdown' => false,
            'multiple' => false,
            'options' => ['disabled' => false]
            ]);
            ?>

            <div class="form-group">
                <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn btn-info btn-lg']) ?>            
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
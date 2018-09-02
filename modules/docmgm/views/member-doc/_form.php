<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div class="member-doc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    
    <?=
   
    
    
    
    /* $form->field($model, 'text')->widget(\dominus77\tinymce\TinyMce::className(), [    
    'options' => [
        'rows' => 12,
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
          //  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
         //   '//www.tinymce.com/css/codepen.min.css',
          //  '//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
        ]
        ],
    'fileManager' => [
        'class' => \dominus77\tinymce\components\MihaildevElFinder::className(),
      //  'language' => '',
   //     'filter'   => 'image', 
    ], 
]);
*/
?>




    <div class="form-group">
        <?= Html::submitButton(Yii::t('db/memberdoc', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
use kartik\file\FileInput;
use yii\helpers\Url;

echo $form->field($node, 'text1')->textInput(['maxlength' => true]);

echo $form->field($node, 'text2')->textInput(['maxlength' => true]);

echo $form->field($node, 'text3')->textInput(['maxlength' => true]);

echo $form->field($node, 'description')->textArea(['maxlength' => true]);

echo $form->field($node, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'autoOrientImage' => false,
        'allowedFileTypes' => 'image',
        'language'=>'pl',
      //  'uploadUrl' => Url::to(['/category/upload-file']),
        'maxFileCount' => 1,
        'showClose' => false,
        'showUpload' => false,
        'showCancel' => false,
     //   'showPreview' => false,
        'showCaption' => false,
        'deleteUrl' => Url::to(['/category/delete-file', 'id'=>$node->id]),
       // 'initialPreviewConfig' => [
        //    'key' => $node->id,
       // ],
        'fileActionSettings' => [
            'showUpload' => false,
            'showZoom' => false,
            'showDrag'=>false,
        ],
        'initialPreview' => [
            $node->thumbnail
        ],
    ]
]);


?>
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

$img = isset($model->uploadedFile->img) ? $model->uploadedFile->img : '<img src="" alt="Logo Firmy">';
?>

<div class="row">
    <div class="col-xs-10">
        <div class="company-form">

             <?php $form = ActiveForm::begin([
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'label' => 'col-xs-4',
                            'offset' => 'col-sm-offset-8',
                            'wrapper' => 'col-xs-8 inputGroupContainer',
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

                <?= $form->field($model, 'tax_id', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('tax_id'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-check\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                    {endWrapper}",
                ])->textInput(['maxlength' => true]) ?>


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

                <?= $form->field($model, 'logo',  [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('local'),
                    ],
                    'template' => "{label}\n{beginWrapper}\n
                                        <div class=\"input-group\">\n
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-picture\"></i></span>
                                            {input}\n{hint}\n
                                        </div>\n
                                        {error}\n
                                        <div id=\"list\" style=\"border: 1px solid #000; margin-bottom: 10px\">
                                            <span>" .
                                            $img 
                                            . "</span> 
                                        </div>
                                    {endWrapper}",
                ])->fileInput(['accept'=> 'image/*', 'id'=>'fileinput']) ?>

            <div class="form-group">
                <div class="col-xs-4">&nbsp;</div>
                    <div class="col-xs-8 inputGroupContainer">
                        <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn btn-info']) ?>            
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
          
        
    </div>
</div>

<?
$script = <<<JS
	function handleFileSelect(evt) {
        var files = evt.target.files;
    
        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {
    
          // Only process image files.
          if (!f.type.match('image.*')) {
            continue;
          }
    
          var reader = new FileReader();
    
          // Closure to capture the file information.
          reader.onload = (function(theFile) {
            return function(e) {
              // Render thumbnail.
              var span = document.createElement('span');
              span.innerHTML = 
              [
                '<img style="max-height: 200px; max-width: 200px; " src="', 
                e.target.result,
                '" title="', escape(theFile.name), 
                '"/>'
              ].join('');
  
              $('#list').empty();
              document.getElementById('list').append(span);
            };
          })(f);
    
          // Read in the image file as a data URL.
          reader.readAsDataURL(f);
        }
      }
    
      document.getElementById('fileinput').addEventListener('change', handleFileSelect, false);
JS;

      $this->registerJs($script,
	View::POS_END,
	'img-preview'
);

?>
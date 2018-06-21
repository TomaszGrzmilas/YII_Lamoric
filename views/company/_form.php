<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-xs-6">
        <div class="company-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'logo')->fileInput(['accept'=> 'image/*', 'id'=>'fileinput']) ?>


            <div id="list" style="border: 1px solid #000; margin-bottom: 10px">
                <span>
                    <?= isset($model->uploadedFile->img) ? $model->uploadedFile->img : '<img src="" alt="Logo Firmy">'; ?>
                </span> 
            </div>


            <div class="form-group">
                <?= Html::a(Yii::t('app', 'Cancel'), Url::previous(), ['class' => 'btn btn-gray']) ?>            
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
          
        </div>
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
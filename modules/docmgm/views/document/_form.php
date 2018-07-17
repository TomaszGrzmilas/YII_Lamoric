<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use app\models\category\Category;

?>

<div class="row">
    <div class="col-xs-6">
        <div class="document-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true])  ?>

            <?= $form->field($model, 'text')->textarea(['rows' => 6, 'style'=>'resize: none;']) ?>

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
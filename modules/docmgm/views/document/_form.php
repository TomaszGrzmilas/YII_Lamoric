<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
/* @var $this yii\web\View */
/* @var $model app\modules\docmgm\models\Document */
/* @var $form yii\widgets\ActiveForm */

if (!isset($item)) {
    $item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;
}

$this->registerJs(
    '$("document").ready(function(){ 
         $("#new_country").on("pjax:end", function() {
             $.pjax.reload({container:"#'.$item.'-pjax-table"});  //Reload GridView
         });
     });'
 );
?>

<div class="document-form">
    <?php yii\widgets\Pjax::begin(['id' => $item.'-pjax-form']) ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6, 'style'=>'resize: none;']) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->widget(kartik\tree\TreeViewInput::classname(),
    [
    'name' => 'category_id',
    'value' => 'true', // preselected values
    'model' => $model,
    'query' => Category::find()->where(['root' => $this->context->docRootCategoryId])->addOrderBy('root, lft'),
    //'headingOptions' => ['label' => 'Kategoria'],
    'rootOptions' => ['label'=>'Start'],
    'fontAwesome' => true,
    'asDropdown' => false,
    'multiple' => false,
    'options' => ['disabled' => false]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('db/docmgm', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>

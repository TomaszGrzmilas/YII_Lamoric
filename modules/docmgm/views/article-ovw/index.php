<?php
use yii\helpers\Html;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = $category->name;
//$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Articles'), 'url' => ['/docmgm/article-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;

Pjax::begin(['id' => $item, 'timeout' => 30000]);
$form = ActiveForm::begin(['action' => ['index'],
                           'method' => 'get',
                           'options' => [
                                'data-pjax' => true,
                                'class'=>"article-search"
                                ]
                            ]); 
                            
?>

<div class="row">
    <div class="col-xs-12">
        <?= $form->field($searchModel, 'text',  [
                'inputOptions' => [
                    'placeholder' => Yii::t('app', 'Search'),
                    'class' => 'prawo-search-input',
                ],
                'options'=>['class'=>'article-search-box'],
                'template' => ' {input} 
                <button type="submit" class="prawo-search-submit">'.
                    HTML::img('@web/layout.main\images\icn-search-gray.png', ['alt' => Yii::t('app', 'Search')]) .
                '</button>',
            ])->textInput(['maxlength' => true]) 
        ?>
    </div>
</div>


    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="article-search-box">
                <select name="wgkategorii">
                    <option value=""  disabled selected hidden><?= Yii::t('app', 'Search by category') ?></option>
                    <? foreach ($categories as $category) : ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="article-search-box">
                <select name="wgdaty" placeholder="sdsdsd">
                    <option value="" disabled selected hidden><?= Yii::t('app', 'Search by date') ?></option>
                    <option value="1">W tym tygodniu</option>
                    <option value="2">W tym miesiacu</option>
                    <option value="3">W tym roku</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="article-search-box">
                <select name="sortuj">
                    <option value="" disabled selected hidden><?= Yii::t('app', 'Sort by') ?></option>
                    <option value="1">daty od najnowszej</option>
                    <option value="2">daty od najstarszej</option>
                    <option value="3">alfabetycznie [a-z]</option>
                    <option value="3">alfabetycznie [z-a]</option>
                </select>
            </div>
        </div>
    </div>
<?
ActiveForm::end();

echo $this->render('/document/_all_articles', [
        'sender' => 'ARTICLE',
        'category' => $category,
        'documents' => $documents,
    ]);

Pjax::end();
?>

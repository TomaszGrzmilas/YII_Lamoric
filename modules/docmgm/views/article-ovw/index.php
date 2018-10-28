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

Pjax::begin(['id' => $item /*, 'timeout' => 3000 */]);
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
        <?= $form->field($searchModel, 'text_all',  [
                'inputOptions' => [
                    'placeholder' => Yii::t('app', 'Search'),
                    'class' => 'prawo-search-input',
                ],
                'options'=>[
                    'class'=>'article-search-box'],
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
        <?= $form->field($searchModel, 'category_id',
            ['options' => ['class' => 'article-search-box']]
            )
            ->dropDownList(
                \yii\helpers\ArrayHelper::map($categories, 'id', 'name'),
                [
                    'class' => '',
                    'prompt' => [
                        'text' =>  Yii::t('app', 'Search by category'),
                        'options'=> [
                            //'disabled' => true, 'selected' => true, 'hidden' => true
                            ]
                    ],
                    'onchange'=>'this.form.submit()'
                ]
                )
            ->label(false)
            ->error(false)
        ?>
    </div>
    <div class="col-xs-12 col-md-4">
        <?= $form->field($searchModel, 'date_filter',
            ['options' => ['class' => 'article-search-box']]
            )
            ->dropDownList(
                \app\modules\docmgm\models\Document::getDateFilter(),
                [
                    'class' => '',
                    'prompt' => [
                        'text' =>  Yii::t('app', 'Search by date'),
                        'options'=> [
                            //'disabled' => true, 'selected' => true, 'hidden' => true
                            ]
                    ],
                    'onchange'=>'this.form.submit()'
                ]
                )
            ->label(false)
            ->error(false)
        ?>
    </div>
    <div class="col-xs-12 col-md-4">
        <?= $form->field($searchModel, 'sort_filter',
            ['options' => ['class' => 'article-search-box']]
            )
            ->dropDownList(
                \app\modules\docmgm\models\Document::getSortFilter(),
                [
                    'class' => '',
                    'prompt' => [
                        'text' => Yii::t('app', 'Sort by'),
                        'options'=> [
                            //'disabled' => true, 'selected' => true, 'hidden' => true
                            ]
                    ],
                    'onchange'=>'this.form.submit()'
                ]
                )
            ->label(false)
            ->error(false)
        ?>
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

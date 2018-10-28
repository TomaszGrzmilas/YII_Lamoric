<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = $category->name;
//$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Documents'), 'url' => ['/docmgm/document-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

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

<? ActiveForm::end(); ?>

<? if( $searchModel->text_all == null) : ?>
    <div class="row">
        <? foreach ($categories as $key => $category) : ?>
            <? $a = $category->image == null ? '' : HTML::img($category->getFilePath(), ['alt' => $category->name]);
            $a .= '<div class="btn-start-info">' . $category->name . '</div>';
            ?>
            <div class="col-xs-12 col-md-2">
                <?=
                    Html::a($a,
                    ['view', 'id' => $category->id],
                    [
                        'class' => 'btns-start hvr-pop',
                    ]);
                ?>
            </div>
        <?php endforeach; ?>
    </div>

<? else : ?>

    <? if(isset($documents) && count($documents) > 0) : ?>
        <div class="row">
            <div class="col-xs-12">
                <ul class="rights-lists">
                    <? foreach($documents as $document) : ?>
                    <li class="item">
                        <?=
                            Html::a($document->title,
                            ['view-single-article', 'category_id'=> $category->id, 'doc_id' => $document->doc_id],
                            [
                                'class' => 'hvr-pop',
                                'title' => $document->title
                            ]);
                        ?>
                    </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>
    <? endif ?>

<? endif; ?>

<? Pjax::end(); ?>
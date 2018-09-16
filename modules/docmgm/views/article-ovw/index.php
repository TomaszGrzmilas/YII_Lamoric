<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = $category->name;
//$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Articles'), 'url' => ['/docmgm/article-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<form action="#" class="article-search">
    <div class="row">
        <div class="col-xs-12">
            <div class="article-search-box">
                <input type="text" class="prawo-search-input" placeholder="<?= Yii::t('app', 'Search') ?>">
                <button type="submit" class="prawo-search-submit">
                    <?= HTML::img('@web/layout.main\images\icn-search-gray.png', ['alt' => Yii::t('app', 'Search')]) ?>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="article-search-box">
                <select name="wgkategorii">
                    <option value="0">Szukaj wg kategorii</option>
                    <? foreach ($categories as $category) : ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="article-search-box">
                <select name="wgdaty">
                    <option value="0">Szukaj wg daty</option>
                    <option value="1">W tym tygodniu</option>
                    <option value="2">W tym miesiacu</option>
                    <option value="3">W tym roku</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="article-search-box">
                <select name="sortuj">
                    <option value="0">Szukaj wg</option>
                    <option value="1">daty od najnowszej</option>
                    <option value="2">daty od najstarszej</option>
                    <option value="3">alfabetycznie [a-z]</option>
                    <option value="3">alfabetycznie [z-a]</option>
                </select>
            </div>
        </div>
    </div>
</form>

<?
echo $this->render('/document/_all_articles', [
        'sender' => 'ARTICLE',
        'category' => $category,
        'documents' => $documents,
    ]);
?>

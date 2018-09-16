<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = $category->name;
//$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Documents'), 'url' => ['/docmgm/document-ovw/index']];
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

<div class="row" id="<?= $item ?>">
    <? foreach ($documents as $key => $doc) : ?>   
        <div class="col-xs-12 col-md-6">
            <div class="article-box">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <h3 class="article-title">
                            <?=
                                Html::a($doc->title, 
                                ['view', 'id' => $doc->doc_id],
                                [
                                    'class' => 'hvr-push', 
                                    'title' => Yii::t('app', 'More')
                                ]);
                            ?>
                        </h3>
                        <p class="article-date"><?= Yii::$app->formatter->asDate($doc->created_at, 'php:d M'); ?></p>
                        <p class="article-short">
                            <?= $doc->short_text ?>
                        </p>
                    </div>
                    <div class="col-xs-12">
                        <?=
                            Html::a(Yii::t('app', 'More') . '<span class="glyphicon glyphicon-menu-right"></span>', 
                            ['view', 'id' => $doc->doc_id],
                            [
                                'class' => 'btn-red hvr-push', 
                                'title' => Yii::t('app', 'More')
                            ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>
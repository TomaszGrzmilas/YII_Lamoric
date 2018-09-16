<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\docmgm\DocmgmModule;

$this->title = $model->title;

$doc_day = date("d",$model->created_at);
$doc_month = Yii::$app->formatter->asDate($model->created_at, 'php:M');
$doc_year = date("Y",$model->created_at);
?>

<ul class="title-page-nav">
    <li>
        <?= Html::a(Yii::t('app', 'Back') . HTML::img('@web/layout.main\images\icn-big-powrot.png', ['alt' => Yii::t('app', 'Back')]), 
            ['/docmgm/article-ovw/index'], ['class' => 'title-page-btns hvr-pop']) 
        ?> 
    </li>
</ul>

<div class="article-open">
    <div class="row">
        <div class="col-xs-4 col-md-2">
            <div class="article-open-date">
                <?= $doc_day ?> 
                <strong>
                    <?= $doc_month ?>
                </strong>
                <?= $doc_year ?> 
            </div>
        </div>
        <div class="col-xs-12 col-md-10">
            <h3 class="article-open-title">
                <?= $model->title ?>
            </h3>
            <p class="article-open-short">
                <?= $model->short_text ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p>
                <?= $model->text ?>
            </p>
        </div>
    </div>
    <? if ($model->file != '') : ?>
        <hr/>
            <i class="fa-file-pdf-o" style ="font-family:FontAwesome; font-style:normal; font-size: 15px;"> 
            <?= $model->uploadedFile->filelink ?>
            &nbsp; </i>
    <? endif; ?>
</div>
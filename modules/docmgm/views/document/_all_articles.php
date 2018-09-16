<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;
use yii\helpers\Url;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

Url::remember();
?>

<div class="row" id="<?= $item ?>">
    <? foreach ($documents as $key =>$doc) : ?>   
        <?
            switch ($sender) {
                case 'LAW':
                    $link = ['/docmgm/law-ovw/view-single-article', 'category_id'=> $category->id, 'doc_id' => $doc->doc_id];
                    break;
                case 'ARTICLE':
                    $link = ['/docmgm/article-ovw/view', 'id' => $doc->doc_id];
                    break;
                default:
                $link = null;
                    break;
            }
        ?>
        <div class="col-xs-12 col-md-6">
            <div class="article-box">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 hidden-xs">
                        <?= HTML::img($doc->getThumbnailPath(), ['class' => 'img-responsive']) ?>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <h3 class="article-title">
                            <?=
                                Html::a($doc->title, 
                                $link,
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
                            $link,
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
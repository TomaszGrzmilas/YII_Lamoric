<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use app\modules\docmgm\DocmgmModule;
use yii\helpers\Url;

$this->title = $category->name;
$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Law'), 'url' => ['/docmgm/law-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;
$currentCategory = $category;
Url::remember();
?>

<div class="row">
    <? if (isset($categories[0])) : ?>
        <? $category = $categories[0]; ?>
        <div class="col-xs-12 col-md-6">
            <div class="rights-boxb">
            
                <div class="rights-boxb-head">
                    <h3 title="<?= $category->name ?>" class="rights-boxb-title">
                        <?
                            $catImg = $category->getFilePath();
                            if (isset($catImg) && $catImg != null)
                            {
                                echo  HTML::img($catImg);
                            }
                        ?>
                        <?= $category->name ?>
                    </h3>
                    <?=
                        Html::a(Yii::t('app', 'More') . '<span class="glyphicon glyphicon-menu-right"></span>', 
                        ['view-all-articles', 'id' => $category->id],
                        [
                            'class' => 'hvr-pop btn-red', 
                            'title' => Yii::t('app', 'More')
                        ]);
                    ?>
                </div>
                
                <ul class="rights-boxb-lists">
                    <? foreach($category->documents as $document) : ?>
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

    <? if (isset($categories[1])) : ?>
    <? $category = $categories[1]; ?>
    <div class="col-xs-12 col-md-6">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="rights-boxb">
                    <div class="rights-boxb-head">
                        <h3 title="<?= $category->name ?>" class="rights-boxb-title">
                        <?
                            $catImg = $category->getFilePath();
                            if (isset($catImg) && $catImg != null)
                            {
                                echo  HTML::img($catImg);
                            }
                        ?>
                        <?= $category->name ?>
                        </h3>
                        <?=
                        Html::a(Yii::t('app', 'More') . '<span class="glyphicon glyphicon-menu-right"></span>', 
                        ['view-all-articles', 'id' => $category->id],
                        [
                            'class' => 'hvr-pop btn-red', 
                            'title' => Yii::t('app', 'More')
                        ]);
                        ?>
                    </div>
                    <ul class="rights-boxb-lists">
                        <? foreach($category->documents as $document) : ?>
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

            <? if (isset($categories[2])) : ?>
            <? $category = $categories[2]; ?>
                <div class="col-xs-12 col-lg-6">
                    <div class="rights-boxb">
                        <div class="rights-boxb-head">
                            <h3 title="<?= $category->name ?>" class="rights-boxb-title">
                            <?
                                $catImg = $category->getFilePath();
                                if (isset($catImg) && $catImg != null)
                                {
                                    echo  HTML::img($catImg);
                                }
                            ?>
                            <?= $category->name ?>
                            </h3>
                            <?=
                            Html::a(Yii::t('app', 'More') . '<span class="glyphicon glyphicon-menu-right"></span>', 
                            ['view-all-articles', 'id' => $category->id],
                            [
                                'class' => 'hvr-pop btn-red', 
                                'title' => Yii::t('app', 'More')
                            ]);
                            ?>
                        </div>
                        <ul class="rights-boxb-lists">
                            <? foreach($category->documents as $document) : ?>
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
        </div>
    </div>

    <? if (isset($categories[3])) : ?>
    <? $category = $categories[3]; ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="rights-boxb">
                <div class="rights-boxb-head">
                    <h3 title="<?= $category->name ?>" class="rights-boxb-title">
                        <?
                            $catImg = $category->getFilePath();
                            if (isset($catImg) && $catImg != null)
                            {
                                echo  HTML::img($catImg);
                            }
                        ?>
                        <?= $category->name ?>
                    </h3>
                    <?=
                        Html::a(Yii::t('app', 'More') . '<span class="glyphicon glyphicon-menu-right"></span>', 
                        ['view-all-articles', 'id' => $category->id],
                        [
                            'class' => 'hvr-pop btn-red', 
                            'title' => Yii::t('app', 'More')
                        ]);
                    ?>
                </div>
                <ul class="rights-boxb-lists">
                    <? foreach($category->documents as $document) : ?>
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
    </div>
    <? endif ?>
    <? endif ?>
</div>

<? // ################################################################################# ?>

<? if(isset($documents) && count($documents) > 0) : ?>
    <div class="row">
        <div class="col-xs-12">
            <ul class="rights-lists">
                <? foreach($documents as $document) : ?>
                <li class="item">
                    <?=
                        Html::a($document->title, 
                        ['view-single-article', 'category_id'=> $currentCategory->id, 'doc_id' => $document->doc_id],
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
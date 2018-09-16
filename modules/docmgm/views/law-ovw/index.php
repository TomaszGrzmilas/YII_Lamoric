<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;

$this->title = $category->name;
//$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Law'), 'url' => ['/docmgm/law-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <form action="#" class="prawo-search">
            <input type="text" class="prawo-search-input" placeholder="<?= Yii::t('app', 'Search') ?>">
            <button type="submit" class="prawo-search-submit">
            <?= HTML::img('@web/layout.main\images\icn-search-gray.png', ['alt' => Yii::t('app', 'Search')]) ?>
            </button>
        </form>
    </div>
</div>

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
                    'class' => 'btns-start-prawo hvr-pop',
                ]);
            ?>
        </div>      
    <?php endforeach; ?>
</div>

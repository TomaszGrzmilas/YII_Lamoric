<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;

$this->title = $category->name;
//$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Rodo'), 'url' => ['/docmgm/rodo-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

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
                    'class' => 'btns-start rodo hvr-pop',
                ]);
            ?>
        </div>      
    <?php endforeach; ?>
</div>

<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\View;
use app\modules\docmgm\DocmgmModule;

$this->title = $category->name;
$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Rodo'), 'url' => ['/docmgm/rodo-ovw/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <? foreach ($categories as $cat) : ?>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="btns-szkolenia">
                <div class="btns-szkolenia-thumb type1">
                    <?
                        if($cat->text1 != null)
                        {
                            echo '<span class="btns-szkolenia-type1">' . $cat->text1 . '</span>';
                        }  
                        if($cat->text2 != null)
                        {
                            echo '<span class="btns-szkolenia-type2">' . $cat->text2 . '</span>';
                        }  
                        if($cat->text3 != null)
                        {
                            echo '<span class="btns-szkolenia-type3">' . $cat->text3 . '</span>';
                        }  
                    ?>
                </div>
                <h3>
                    Quis nostrud exercitation Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure...
                </h3>
                <a href="#" title="#" class="hvr-pop btn-red">dowiedz się więcej  <span class="glyphicon glyphicon-menu-right"></span></a>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
    <? endforeach ?>
</div>
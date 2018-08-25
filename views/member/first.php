<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;

$popupErr = Yii::t('app', 'Pop-up Blocker is enabled! Please add this site to your exception list.');

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/member', 'Members');
$this->params['breadcrumbs'][] = $this->title;

$addButtonTitle = Yii::t('db/member', 'Create Member');

Url::remember();

?>

<div class="<?=$item?>">
    <div class='row'>
        <div class="col-xs-12 col-md-2">
            <?= Html::a(HTML::img('@web/layout.main\images\icn-big-dodajczlonka.png') .
                        '<div class="btn-start-info">'.Yii::t('db/member', 'Create Member').'</div>', 
                        Url::toRoute('/member/create'), 
                        ['class'=> 'btns-start hvr-pop']);
            ?>
        </div>

        <div class="col-xs-12 col-md-2">
            <?= Html::a(HTML::img('@web/layout.main\images\icn-big-listaczlonkow.png') .
                        '<div class="btn-start-info">'.Yii::t('db/member', 'Member list').'</div>', 
                        Url::toRoute('/member/list'), 
                        ['class'=> 'btns-start hvr-pop']);
            ?>
        </div>

        <div class="col-xs-12 col-md-2" id="259">
            <?= Html::a(HTML::img('@web/layout.main\images\icn-big-drukuj.png') .
                        '<div class="btn-start-info">'.Yii::t('app', 'Print short list').'</div>', 
                        '', 
                        ['class'=> 'btns-start hvr-pop', 'onclick'=>'printList(259); return false;']);
            ?>
        </div>

        <? if (Yii::$app->user->can('Company Admin')): ?> 
            <div class="col-xs-12 col-md-2" id="10">
            <?= Html::a(HTML::img('@web/layout.main\images\icn-big-drukuj.png') .
                        '<div class="btn-start-info">'.Yii::t('app', 'Print full list').'</div>', 
                        '', 
                        ['class'=> 'btns-start hvr-pop', 'onclick'=>'printList(10); return false;']);
            ?>
            </div>
        <? endif;?>
    </div>
    <div class='row'>
        <div class="col-xs-12 col-md-2">
            <?= Html::a(HTML::img('@web/layout.main\images\icn-big-listaskladek.png') .
                        '<div class="btn-start-info">'.Yii::t('app', 'Payments').'</div>', 
                        Url::toRoute('/balance-account/index'), 
                        ['class'=> 'btns-start hvr-pop']);
            ?>
        </div>

        <div class="col-xs-12 col-md-2">
            <?= Html::a(HTML::img('@web/layout.main\images\icn-big-drukuj.png') .
                        '<div class="btn-start-info">'.Yii::t('db/balanceaccount', 'Print payments list').'</div>', 
                        '#', 
                        ['class'=> 'btns-start hvr-pop', 'onclick'=>'printList(456)']);
            ?>
        </div>

        <div class="col-xs-12 col-md-2">
            <?= Html::a(HTML::img('@web/layout.main\images\icn-big-zalegleskladki.png') .
                        '<div class="btn-start-info">'.Yii::t('app', 'Check outstanding contributions').'</div>', 
                        Url::toRoute('/balance-account/outstanding'), 
                        ['class'=> 'btns-start hvr-pop']);
            ?>
        </div>

        <div class="col-xs-12 col-md-2">
            <?= Html::a(HTML::img('@web/layout.main\images\icn-big-drukuj.png') .
                        '<div class="btn-start-info">'.Yii::t('db/balanceaccount', 'Print outstanding payments').'</div>', 
                        '#', 
                        ['class'=> 'btns-start hvr-pop', 'onclick'=>'printList(789)']);
            ?>
        </div>
    </div>
</div>

<?
$script = <<<JS
    function printList(type){
        function showPopup(url) {
            var width  = 600;
            var height = 800;
            var left   = - screen.width;
            var top    = - screen.height;
            var params = 'width='+width+', height='+height;
            params += ', top='+top+', left='+left;
            params += ', directories=no';
            params += ', location=no';
            params += ', menubar=no';
            params += ', resizable=no';
            params += ', scrollbars=no';
            params += ', status=no';
            params += ', toolbar=no';
            newwin=window.open(url,'_blank', params);
            try {
                newwin.focus();   
            } catch (e) {
                alert("{$popupErr}");
            }
        }
        $("body").css("cursor", "progress");

        var ajax = new XMLHttpRequest();
        if (type == '259' || type == '10')
        {
            $.ajax({
                type: "GET",
                url: '/member/print-list', 
                data: {keylist: 'ALL', type: type},
                success: function(result){
                    showPopup(result);
                    $("body").css("cursor", "default");
                }
            });  
        }
        else if (type == '456' || type == '789')
        {
            $.ajax({
                type: "GET",
                url: '/balance-account/print-list', 
                data: {keylist: 'ALL', type: type},
                success: function(result){
                    showPopup(result);
                    $("body").css("cursor", "default");
                }
            });  
        }
    }
JS;

      $this->registerJs($script,
       \yii\web\View::POS_BEGIN,
      'printList');
?>
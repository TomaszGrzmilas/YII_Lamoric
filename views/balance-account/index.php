<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/balanceaccount', 'Balance Accounts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/member', 'Members'), 'url' => ['/member/index']];
$this->params['breadcrumbs'][] = $this->title;




?>
<div class="<?=$item?>-index">
    <div class="row">
        <div class="col-xs-8">
        <?
            Pjax::begin(['id' => $item.'-pjax-table']); 

            echo GridView::widget([
                'id' => $item.'-table',
                'dataProvider' => $dataProvider,
             //   'filterModel' => $searchModel,
                'tableOptions' => ['style' => 'margin-bottom: 0px'],
                'columns' =>  [
                     ['class' => 'kartik\grid\SerialColumn'],
                    'member.company.name',
                    'member.name',
                    'member.contribution:currency',
                    'balance:currency',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'viewOptions' => ['icon'=>'<i class="ace-icon fa fa-eye bigger-130"></i>', 'title' => 'Show', 'data-toggle' => 'tooltip'],
                        'updateOptions' => ['icon'=>'<i class="ace-icon fa fa-pencil bigger-130"></i>', 'title' => 'Edit', 'data-toggle' => 'tooltip', 'class'=>'green'],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'template'=>'{view}'
                    ],
                ],
                'containerOptions' => ['style' => 'overflow: auto'], 
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, 
                'toolbar' =>  [
                    ['content' => 
                        Html::a('<i class="fa fa-retweet"></i>', ['balance-account/index'], ['class' => 'btn btn-warning', 'title' => Yii::t('app', 'Reset Grid')])
                    ],
                    '{export}',
                ],
                'export' => [
                    'fontAwesome' => true
                ],
                'responsive' => false,
                'panel' => [
                    'type' => GridView::TYPE_DANGER ,
                    'heading' => $this->title,
                ],
                'showFooter'=>false,
                'persistResize' => true,
                'toggleDataOptions' => ['minCount' => 10],
                'exportConfig' => [GridView::HTML=>true,
                                GridView::CSV => true],
            ]);
            
            Pjax::end();    
        ?>
        </div>
    </div>
</div>
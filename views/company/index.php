<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/company', 'Companies');
$this->params['breadcrumbs'][] = $this->title;

$addButtonTitle = Yii::t('db/company', 'Create Company');

Url::remember();
?>

<div class="<?=$item?>-index">
    <div class="row">
    <div class="col-xs-8">
        <div>
        <?
            Pjax::begin(['id' => $item.'-pjax-table']); 
            
            echo GridView::widget([
                'id' => $item.'-table',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['style' => 'margin-bottom: 0px'],
                'columns' =>  [
                    'name',
                    'logo' => [
                        'attribute' => 'logo',
                        'value'=> 'uploadedFile.Img',
                        'format' => 'raw',
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'viewOptions' => ['icon'=>'<i class="ace-icon fa fa-eye bigger-130"></i>', 'title' => 'Show', 'data-toggle' => 'tooltip'],
                        'updateOptions' => ['icon'=>'<i class="ace-icon fa fa-pencil bigger-130"></i>', 'title' => 'Edit', 'data-toggle' => 'tooltip', 'class'=>'green'],
                        'deleteOptions' => ['icon'=>'<i class="ace-icon fa fa-trash-o bigger-130"></i>', 'title' => 'Delete', 'data-toggle' => 'tooltip', 'class'=>'red'],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                    ],
                ],
                'containerOptions' => ['style' => 'overflow: auto'], 
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, 
                'toolbar' =>  [
                    ['content' => 
                        //Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => $addButtonTitle, 'class' => 'btn btn-success', 'data-toggle'=>'modal', 'data-target' => Url::toRoute('company/create')]) . ' '.
                        Html::a('<i class="fa fa-plus"></i>', ['company/create'], ['data-pjax' => 0, 'class' => 'btn btn-success', 'title' => $addButtonTitle]) . ' '.
                        Html::a('<i class="fa fa-retweet"></i>', ['company/index'], ['class' => 'btn btn-warning', 'title' => Yii::t('app', 'Reset Grid')])
                    ],
                    '{export}',
                ],
                'export' => [
                    'fontAwesome' => true
                ],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
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
<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::$app->getModule('docmgm')->t('db/document', 'Documents');
$this->params['breadcrumbs'][] = $this->title;

$addButtonTitle = Yii::$app->getModule('docmgm')->t('db/document', 'Create Document');

Url::remember();
?>

<div class="<?=$item?>-index">
    <div class="row">
    <div class="col-xs-10">
        <div>
        <?
            Pjax::begin(['id' => $item.'-pjax-table']);
        
            echo GridView::widget([
                'id' => $item.'-table',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' =>  [
                    'title',
                    'text',
                    'tag',
                    [
                        'attribute' => 'file',
                        'value'=> 'uploadedFile.filelink',
                        'format' => 'raw'
                    
                    ],
                    [
                        'attribute' => 'category_id',
                        'value'=> 'category.name',
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'viewOptions' => ['icon'=>'<i class="ace-icon fa fa-eye bigger-130"></i>', 'title' => 'Show', 'data-toggle' => 'tooltip'],
                        'updateOptions' => ['icon'=>'<i class="ace-icon fa fa-pencil bigger-130"></i>', 'title' => 'Edit', 'data-toggle' => 'tooltip', 'class'=>'green'],
                        'deleteOptions' => ['icon'=>'<i class="ace-icon fa fa-trash-o bigger-130"></i>', 'title' => 'Delete', 'data-toggle' => 'tooltip', 'class'=>'red'],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                    ],
                ],
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, 
                'toolbar' =>  [
                    ['content' => 
                        //Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => $addButtonTitle, 'class' => 'btn btn-success', 'data-toggle'=>'modal', 'data-target' => Url::toRoute('company/create')]) . ' '.
                        Html::a('<i class="fa fa-plus"></i>', ['/docmgm/document/create'], ['data-pjax' => 0, 'class' => 'btn btn-success', 'title' => $addButtonTitle]) . ' '.
                        Html::a('<i class="fa fa-retweet"></i>', ['/docmgm/document/index'], ['class' => 'btn btn-warning', 'title' => Yii::t('app', 'Reset Grid')])
                    ],
                    '{export}',
                ],
                'export' => [
                    'fontAwesome' => true
                ],
                'responsive' => false,
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
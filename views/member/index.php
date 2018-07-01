<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/member', 'Members');
$this->params['breadcrumbs'][] = $this->title;

$addButtonTitle = Yii::t('db/member', 'Create Member');

Url::remember();

?>

 <?= Yii::$app->session->getFlash('error'); ?>

 <?= Yii::$app->session->getFlash('success'); ?>

<div class="<?=$item?>-index">
    <div class="row">
        <div class="col-xs-10">
        <?
            Pjax::begin(['id' => $item.'-pjax-table']); 
            
            echo GridView::widget([
                'id' => $item.'-table',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['style' => 'margin-bottom: 0px'],
                'columns' =>  [
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'viewOptions' => ['icon'=>'<i class="ace-icon fa fa-eye bigger-130"></i>', 'title' => 'Show', 'data-toggle' => 'tooltip'],
                        'updateOptions' => ['icon'=>'<i class="ace-icon fa fa-pencil bigger-130"></i>', 'title' => 'Edit', 'data-toggle' => 'tooltip', 'class'=>'green'],
                        'deleteOptions' => ['icon'=>'<i class="ace-icon fa fa-trash-o bigger-130"></i>', 'title' => 'Delete', 'data-toggle' => 'tooltip', 'class'=>'red'],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                    ],
                    'name',
                    'surname',
                    'pesel',
                    'zip_code',
                    'city',
                    'street',
                    'building',
                    'local',
                    'phone',
                    'email:email',
                    'company.name',
                    'workspace.name',
                    'notes',
                ],
                'containerOptions' => ['style' => 'overflow: auto'], 
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, 
                'toolbar' =>  [
                    ['content' => 
                        Html::button('<i class="fa fa-file-o"></i>', ['type' => 'button', 'title' => Yii::t('app', 'Import'), 'class' => 'btn btn-danger', 'data-toggle'=>'modal', 'data-target' => '#modal-table']) . ' '.                    
                        Html::a('<i class="fa fa-plus"></i>', ['member/create'], ['data-pjax' => 0, 'class' => 'btn btn-success', 'title' => $addButtonTitle]) . ' '.
                        Html::a('<i class="fa fa-retweet"></i>', ['member/index'], ['class' => 'btn btn-warning', 'title' => Yii::t('app', 'Reset Grid')])
                    ],
                    '{export}',
                ],
                'export' => [
                    'fontAwesome' => true
                ],
                'responsive' => false,
                'panel' => [
                    'type' => GridView::TYPE_DANGER,
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


<?= $this->render('_modal_import_form', [
    'model' => $model,
    'title' => Yii::t('app', 'Import')
]) ?>

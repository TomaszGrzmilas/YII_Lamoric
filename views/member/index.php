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

        <?
            Pjax::begin(['id' => $item.'-pjax-table']); 

            echo GridView::widget([
                'id' => $item.'-table',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['style' => 'margin-bottom: 0px'],
                'rowOptions'=> ['class' => 'skip-export'],
                'columns' => [
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'viewOptions' => ['icon'=>'<i class="ace-icon fa fa-eye bigger-130"></i>', 'title' => 'Show', 'data-toggle' => 'tooltip'],
                        'updateOptions' => ['icon'=>'<i class="ace-icon fa fa-pencil bigger-130"></i>', 'title' => 'Edit', 'data-toggle' => 'tooltip', 'class'=>'green'],
                        'deleteOptions' => ['icon'=>'<i class="ace-icon fa fa-trash-o bigger-130"></i>', 'title' => 'Delete', 'data-toggle' => 'tooltip', 'class'=>'red'],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                    ],
                    [
                        'class' => 'kartik\grid\CheckboxColumn',
                        'headerOptions' => ['class' => 'kartik-sheet-style skip-export'],
                        'contentOptions' => ['class' => 'skip-export'],
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
                    [
                        'attribute' => 'notes',
                        'headerOptions' => ['class' => 'skip-export'],
                        'contentOptions' => ['class' => 'skip-export'],
                    ],
                    'contribution:currency',
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
                    'target'=> GridView::TARGET_SELF,
                    'fontAwesome' => true,
                    'showConfirmAlert' => false,
                    'header' => '',
                ],
                'responsive' => false,
                'panel' => [
                    'type' => GridView::TYPE_DANGER,
                    'heading' => $this->title,
                ],
                'showFooter'=>false,
                'persistResize' => true,
                'toggleDataOptions' => ['minCount' => 10],
                'exportConfig' => [GridView::PDF => [
                                    'label' => 'Drukuj listę',
                                    'showHeader' => true,
                                    'showPageSummary' => false,
                                    'showFooter' => false,
                                    'showCaption' => false,
                                   // 'options' => ['title' => Yii::t('kvgrid', 'Portable Document Format')],
                                    'mime' => 'application/pdf',
                                    'config' => [
                                        'mode' => 'utf-8',
                                        'format' => 'A4-L',
                                        'destination' => 'D', 
                                        'marginTop' => 20,
                                        'marginBottom' => 20,
                                        'methods' => [
                                            'SetHeader' => ['Wydruk listy członków'],
                                            'SetFooter' => ['Wydrukował  '. Yii::$app->user->identity->username . ', '. date('Y-m-d H:i:s'). '       Strona: {PAGENO}']
                                        ],
                                        'cssInline' => '.kv-wrap{padding:20px;}' .
                                            '.kv-align-center{text-align:center;}' .
                                            '.kv-align-left{text-align:left;}' .
                                            '.kv-align-right{text-align:right;}' .
                                            '.kv-align-top{vertical-align:top!important;}' .
                                            '.kv-align-bottom{vertical-align:bottom!important;}' .
                                            '.kv-align-middle{vertical-align:middle!important;}' .
                                            '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                                            '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                                            '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
                                        ],
                                        'options' => [
                                            'title' => '$title',
                                            'subject' => 'Subject',
                                            'keywords' => 'keywords'
                                        ],
                                        'contentBefore'=>'',
                                        'contentAfter'=>''
                                    ]
                                ],
                         
            ]);
            //var keys = $('#grid').yiiGridView('getSelectedRows');
            Pjax::end(); 
        ?>

</div>


<?= $this->render('_modal_import_form', [
    'model' => $model,
    'title' => Yii::t('app', 'Import')
]) ?>

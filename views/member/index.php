<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;

$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

$this->title = Yii::t('db/member', 'Member list');
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/member', 'Members'), 'url' => ['/member/index']];
$this->params['breadcrumbs'][] = $this->title;

$addButtonTitle = Yii::t('db/member', 'Create Member');

Url::remember();

?>

 <?= Yii::$app->session->getFlash('error'); ?>

 <?= Yii::$app->session->getFlash('success'); ?>

<div class="<?=$item?>">

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
                        'viewOptions' => ['icon'=>'<i class="ace-icon fa fa-eye fa-2x"></i>', 'title' => 'Show', 'data-toggle' => 'tooltip'],
                        'updateOptions' => ['icon'=>'<i class="ace-icon fa fa-pencil fa-2x"></i>', 'title' => 'Edit', 'data-toggle' => 'tooltip', 'class'=>'green'],
                        'deleteOptions' => ['icon'=>'<i class="ace-icon fa fa-trash-o fa-2x"></i>', 'title' => 'Delete', 'data-toggle' => 'tooltip', 'class'=>'red'],
                        'headerOptions' => ['class' => 'kartik-sheet-style', 'style' => 'width:8%;'],
                        'contentOptions'=> ['style'=>'min-width: 100px;'] // <-- right here
                    ],
                    [
                        'class' => 'kartik\grid\CheckboxColumn',
                        'headerOptions' => ['class' => 'kartik-sheet-style skip-export'],
                        'contentOptions' => ['class' => 'skip-export'],
                        'name' => 'selected',
                        'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id];
                        }
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
                'containerOptions' => ['style' => 'overflow: auto;'], 
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, 
                'toolbar' =>  [
                    ['content' => 
                        Html::button('<i class="fa fa-file-o"></i> '.Yii::t('app', 'Import'), ['type' => 'button', 'title' => Yii::t('app', 'Import'), 'class' => 'btn btn-danger btn-lg', 'data-toggle'=>'modal', 'data-target' => '#modal-table']) . ' '.                    
                        Html::a('<i class="fa fa-plus"></i> '. $addButtonTitle, ['member/create'], ['data-pjax' => 0, 'class' => 'btn btn-success btn-lg', 'title' => $addButtonTitle]) . ' '.
                        Html::a('<i class="fa fa-retweet"></i> '. Yii::t('app', 'Reset Grid'), ['member/index'], ['class' => 'btn btn-warning btn-lg', 'title' => Yii::t('app', 'Reset Grid')]) . ' '.
                        Html::button('<i class="fa fa-print"></i> '. Yii::t('app', 'Print full list'), ['type' => 'button', 'title' => Yii::t('app', 'Print full list'), 'class' => 'btn btn-primary btn-lg', 'onclick'=>'printList(10)']) . ' ' .
                        Html::button('<i class="fa fa-print"></i> '. Yii::t('app', 'Print short list'), ['type' => 'button', 'title' => Yii::t('app', 'Print short list'), 'class' => 'btn btn-primary btn-lg', 'onclick'=>'printList(259)'])
                    ],
                ],
                'export' => [
                    'target'=> GridView::TARGET_SELF,
                    'fontAwesome' => true,
                    'showConfirmAlert' => false,
                    'header' => '',
                ],
                'responsive' => true,
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
            Pjax::end(); 
        ?>

</div>


<?= $this->render('_modal_import_form', [
    'model' => $model,
    'title' => Yii::t('app', 'Import')
    ]);
?>


<?
$popupErr = Yii::t('app', 'Pop-up Blocker is enabled! Please add this site to your exception list.');

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

        var keys = $('#{$item}-table').yiiGridView('getSelectedRows');
        if(keys.length <= 0){   
            var dialog = confirm("Nie wybrano wierszy do wydruku. Wydrukować całą listę ? ");
            if (dialog == true) {
                var ajax = new XMLHttpRequest();
                $.ajax({
                    type: "GET",
                    url: '/member/print-list', 
                    data: {keylist: 'ALL', type: type},
                    success: function(result){
                        showPopup(result);
                    }
                });
            }
        }else{
            keys = JSON.stringify(keys);
            var ajax = new XMLHttpRequest();
            $.ajax({
                type: "GET",
                url: '/member/print-list', 
                data: {keylist: keys, type: type},
                success: function(result){
                //  console.log(result);
                    showPopup(result);
                }
            });
        }
    }
JS;

      $this->registerJs($script,
       \yii\web\View::POS_BEGIN,
	  'printList');

?>


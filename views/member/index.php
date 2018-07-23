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
                        'contentOptions'=>['style'=>'min-width: 100px;'] // <-- right here
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
                        Html::button('<i class="fa fa-file-o"></i>', ['type' => 'button', 'title' => Yii::t('app', 'Import'), 'class' => 'btn btn-danger btn-lg', 'data-toggle'=>'modal', 'data-target' => '#modal-table']) . ' '.                    
                        Html::a('<i class="fa fa-plus"></i>', ['member/create'], ['data-pjax' => 0, 'class' => 'btn btn-success btn-lg', 'title' => $addButtonTitle]) . ' '.
                        Html::a('<i class="fa fa-retweet"></i>', ['member/index'], ['class' => 'btn btn-warning btn-lg', 'title' => Yii::t('app', 'Reset Grid')]) . ' '.
                        Html::button('<i class="fa fa-print"></i>', ['type' => 'button', 'title' => Yii::t('app', 'Print'), 'class' => 'btn btn-primary btn-lg', 'onclick'=>'printList()'])
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
$popupErr = Yii::t('app', 'Pop-up Blocker is enabled! Please add this site to your exception list.')

$script = <<<JS
    function printList(){
        var keys = $('#{$item}-table').yiiGridView('getSelectedRows');
        if(keys.length <= 0){   
            var dialog = confirm("Nie wybrano wierszy do wydruku. Wydrukować całą listę ? ");
            if (dialog == true) {
                var ajax = new XMLHttpRequest();
                $.ajax({
                    type: "GET",
                    url: '/member/print-list', 
                    data: {keylist: 'ALL'},
                    success: function(result){
                       // window.open(result, '_blank');
                        var popup_window=window.open(result,"myWindow","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=yes, width=600, height=600");            
                            try {
                                popup_window.focus();   
                            } catch (e) {
                                alert("Pop-up Blocker is enabled! Please add this site to your exception list.");
                            }
                    }
                });
            }
        }else{
            keys = JSON.stringify(keys);
            var ajax = new XMLHttpRequest();
            $.ajax({
                type: "GET",
                url: '/member/print-list', 
                data: {keylist: keys},
                success: function(result){
                //  console.log(result);
                    window.open(result, '_blank');
                }
            });
        }
    }
JS;

      $this->registerJs($script,
       \yii\web\View::POS_BEGIN,
	  'printList');

?>


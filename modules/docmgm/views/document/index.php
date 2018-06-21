<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use app\assets\TableAsset;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\docmgm\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
TableAsset::register($this); 

$this->title = Yii::$app->getModule('docmgm')->t('db/document', 'Documents');
$this->params['breadcrumbs'][] = $this->title;
$addButtonTitle = Yii::t('db/document', 'Create Document');
$item = $this->context->module->id . '-' . $this->context->id . '-' . $this->context->action->id;

?>

<div class="<?=$item?>-index">
    <div class="row">
    <div class="col-xs-10">
        <div>
        <?php Pjax::begin(['id' => $item.'-pjax-table']); ?>
        <?=
        GridView::widget([
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
                    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => $addButtonTitle, 'class' => 'btn btn-success', 'data-toggle'=>'modal', 'data-target' => '#modal-table']) . ' '.
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'Reset Grid')])
                ],
                '{export}',
             //   '{toggleData}',
            ],
            // set export properties
            'export' => [
                'fontAwesome' => true
            ],
            // parameters from the demo form
            'bordered' => false,
            'striped' => false,
            'condensed' => true,
            'responsive' => false,
            'hover' => false,
            'showPageSummary' => false,
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
 ?>
     <?php Pjax::end(); ?>
        </div>
    </div>
</div>


<?= $this->render('_modal_form', [
    'model' => $model,
    'item' => $item,
    'title' => $addButtonTitle
]) ?>


           
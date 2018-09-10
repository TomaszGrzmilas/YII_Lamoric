<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\docmgm\DocmgmModule;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/docmgm', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Url::remember();
?>
<div class="document-view">
    <div class="row">
        <div class="col-xs-8">
            <p>
                <?= Html::a(Yii::t('app', 'Back'), ['/docmgm/document/index'], ['class' => 'btn btn-info']) ?>            
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->doc_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->doc_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'POST',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'doc_id',
                    'title',
                    'short_text',
                    'text:raw',
                    'tag',
                    [
                        'attribute' => 'file',
                        'value' => isset($model->uploadedFile->name) ? $model->uploadedFile->name : 'Brak',
                    ],
                    [
                        'attribute' => 'category_id',
                        'value' => isset($model->category->name) ? $model->category->name : 'Brak',
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>


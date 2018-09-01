<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/memberdoc', 'Member Docs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Url::remember();
?>
<div class="member-doc-view">
    <div class="row">
        <div class="col-xs-8">

            <p>
                <?= Html::a(Yii::t('app', 'Back'), ['/docmgm/member-doc/index'], ['class' => 'btn btn-info']) ?>            
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->member_doc_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->member_doc_id], [
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
            'title',
            'text:raw',
        ],
    ]) ?>

</div>

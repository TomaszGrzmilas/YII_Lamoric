<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\docmgm\models\Document */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/docmgm', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('db/docmgm', 'Update'), ['update', 'id' => $model->doc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('db/docmgm', 'Delete'), ['delete', 'id' => $model->doc_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('db/docmgm', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'doc_id',
            'title',
            'text:ntext',
            'tag',
            'file',
            'category.name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\docmgm\models\Document */

$this->title = Yii::t('db/docmgm', 'Update Document: ' . $model->title, [
    'nameAttribute' => '' . $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/docmgm', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->doc_id]];
$this->params['breadcrumbs'][] = Yii::t('db/docmgm', 'Update');
?>
<div class="document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

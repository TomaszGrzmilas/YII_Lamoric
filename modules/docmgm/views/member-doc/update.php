<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MemberDoc */

$this->title = Yii::t('db/memberdoc', 'Update Member Doc: ' . $model->member_doc_id, [
    'nameAttribute' => '' . $model->member_doc_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('db/memberdoc', 'Member Docs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->member_doc_id, 'url' => ['view', 'id' => $model->member_doc_id]];
$this->params['breadcrumbs'][] = Yii::t('db/memberdoc', 'Update');
?>
<div class="member-doc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

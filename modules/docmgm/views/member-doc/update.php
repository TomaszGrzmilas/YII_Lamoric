<?php

use yii\helpers\Html;
use app\modules\docmgm\DocmgmModule;

$this->title = DocmgmModule::t('db/memberdoc', 'Update Member Doc: ' . $model->member_doc_id, [
    'nameAttribute' => '' . $model->member_doc_id,
]);

$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/memberdoc', 'Member Docs'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->member_doc_id, 'url' => ['view', 'id' => $model->member_doc_id]];
$this->params['breadcrumbs'][] = DocmgmModule::t('db/memberdoc', 'Update');
?>
<div class="member-doc-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

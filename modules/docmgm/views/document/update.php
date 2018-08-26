<?php

use yii\helpers\Html;
use app\modules\docmgm\DocmgmModule;

$this->title = DocmgmModule::t('db/document', 'Update Document: ' . $model->title, [
    'nameAttribute' => '' . $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->doc_id]];
$this->params['breadcrumbs'][] = DocmgmModule::t('db/document', 'Update');
?>
<div class="document-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

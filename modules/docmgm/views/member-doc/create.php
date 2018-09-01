<?php

use yii\helpers\Html;


$this->title = Yii::$app->getModule('docmgm')->t('db/memberdoc', 'Create Document');
$this->params['breadcrumbs'][] = ['label' => Yii::$app->getModule('docmgm')->t('db/memberdoc', 'Member Docs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="member-doc-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

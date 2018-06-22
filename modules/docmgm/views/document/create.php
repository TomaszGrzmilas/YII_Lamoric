<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\docmgm\models\Document */

$this->title = Yii::$app->getModule('docmgm')->t('db/document', 'Create Document');
$this->params['breadcrumbs'][] = ['label' => Yii::$app->getModule('docmgm')->t('db/document', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

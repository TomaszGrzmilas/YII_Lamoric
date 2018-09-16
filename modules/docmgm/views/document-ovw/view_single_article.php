<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\docmgm\DocmgmModule;

$this->title = $document->title;
$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Documents'), 'url' => ['/docmgm/document-ovw/index']];
$this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => Url::previous()];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('/document/_single_article', [
        'model' => $document,
    ]);
?>
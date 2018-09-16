<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\docmgm\DocmgmModule;

$this->params['breadcrumbs'][] = ['label' => DocmgmModule::t('db/document', 'Documents'), 'url' => ['/docmgm/document-ovw/index']];
$this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => Url::previous()];

echo $this->render('/document/_all_articles', [
        'sender' => 'DOCUMENT',
        'category' => $category,
        'documents' => $documents,
    ]);
?>
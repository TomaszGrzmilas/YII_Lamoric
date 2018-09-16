<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\models\category\Category;
use app\modules\docmgm\models\Document;
use app\modules\docmgm\models\DocCategorySearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


class DocumentOvwController extends Controller
{
    public function actionIndex($id = null)
    {
        $cat   = new Category();
        
        if(is_null($id)){
            $model = new Document();
            $category_id = $model->docRootCategoryId;
        } else {
            $category_id = $id;
        }
        $cat = $cat->findOne($category_id);

        return $this->render('index', [
            'documents' => $cat->documents,
            'categories' => $cat->getSubCategories($category_id),
            'category' => $cat,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

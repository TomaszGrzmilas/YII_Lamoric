<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\models\category\Category;
use app\modules\docmgm\models\Document;
use app\modules\docmgm\models\DocCategorySearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


class RodoOvwController extends Controller
{
    public function actionIndex($id = null)
    {
        $model = new Document();
        $cat   = new Category();
        $cat = $cat->find()->where(['id' => $model->rodoRootCategoryId])->one();
        
        if(is_null($id)){
            $category_id = $model->rodoRootCategoryId;
        } else {
            $category_id = $id;
        }
    
        $categories = $cat->getSubCategories($category_id);
   
        return $this->render('index', [
            'documents' => $cat->documents,
            'categories' => $categories,
            'category' => Category::find()->where(['id' => $category_id])->one(),
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

<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\models\category\Category;
use app\modules\docmgm\models\Document;
use app\modules\docmgm\models\DocCategorySearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class LawOvwController extends Controller
{
    public function actionIndex($id = null)
    {
        $model = new Document();
        $category = new Category();
        
        if(is_null($id)){
            $category_id = $model->lawRootCategoryId;
        } else {
            $category_id = $id;
        }
        $category = $category->find()->where(['id' => $category_id])->one();

        return $this->render('index', [
            'documents' => $category->documents,
            'categories' => $category->getSubCategories(),
            'category' => Category::find()->where(['id' => $category_id])->one(),
        ]);
    }

    public function actionView($id = null)
    {
        $model = new Document();
        $category = new Category();
        
        if(is_null($id)){
            $category_id = $model->lawRootCategoryId;
        } else {
            $category_id = $id;
        }

        $category = $category->find()->where(['id' => $category_id])->one();
   
        return $this->render('view', [
            'documents' => $category->documents,
            'categories' => $category->getSubCategories(),
            'category' => Category::find()->where(['id' => $category_id])->one(),
        ]);
    }
}

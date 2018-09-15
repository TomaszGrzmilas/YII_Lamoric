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
        $cat   = new Category();
        $cat   = $cat->find()->where(['id' => $model->lawRootCategoryId])->one();
        
        if(is_null($id)){
            $category_id = $model->lawRootCategoryId;
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
}

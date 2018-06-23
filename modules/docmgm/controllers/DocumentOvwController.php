<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\models\Category;
use app\modules\docmgm\models\Document;
use app\modules\docmgm\models\DocCategorySearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


class DocumentOvwController extends Controller
{
    public function actionIndex()
    {
        $model = new Document();
        
        $documents = new ActiveDataProvider([
            'query' => $model->find(),
        ]);

        $categories = Category::getSubCategories(10);
   
        return $this->render('index', [
            'documents' => $documents,
            'categories' => $categories,
        ]);
    }

    public function actionShowCategory($category_id)
    {
        $model = new Document();
        
        $documents = new ActiveDataProvider([
            'query' => $model->find(),
        ]);

        $categories = DocCategory::getMainCategories();
   
        return $this->render('index', [
            'documents' => $documents,
            'categories' => $categories,
        ]);
    }
   
}

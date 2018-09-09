<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\models\category\Category;
use app\modules\docmgm\models\Document;
use app\modules\docmgm\models\DocCategorySearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;


class ArticleOvwController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionIndex($id = null)
    {
        $model = new Document();

        if(is_null($id)){
            $category_id = $model->articleRootCategoryId;
        } else {
            $category_id = $id;
        }
        
        $documents = new ActiveDataProvider([
            'query' => $model->find()->where(['category_id' => $category_id])->all(),
        ]);

        $categories = Category::getSubCategories($category_id);
   
        return $this->render('index', [
            'documents' => $documents->query,
            'categories' => $categories,
            'category' => Category::find()->where(['id' => $category_id])->one(),
        ]);
    }
}

<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\models\category\Category;
use app\modules\docmgm\models\Document;
use app\modules\docmgm\models\DocumentSearch;
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
        $category = new Category();
        $docSearch = new \app\modules\docmgm\models\DocumentSearch();

        if(is_null($id)){
            $model = new Document();
            $category_id = $model->articleRootCategoryId;
        } else {
            $category_id = $id;
        }

        $category = $category->findOne($category_id);
        $documents = $docSearch->search(Yii::$app->request->queryParams, $category_id);

        return $this->render('index', [
            'searchModel' => $docSearch,
            'documents' => $documents->query->all(),
            'categories' => $category->getSubCategories(),
            'category' => Category::findOne($category_id),
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

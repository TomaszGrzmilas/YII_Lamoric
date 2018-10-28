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
        $category = new Category();
        $docSearch = new \app\modules\docmgm\models\DocumentSearch();

        if(is_null($id)){
            $model = new Document();
            $category_id = $model->docRootCategoryId;
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
        $category = new Category();

        if(is_null($id)){
            $model = new Document();
            $category_id = $model->docRootCategoryId;
        } else {
            $category_id = $id;
        }

        $category = $category->findOne($category_id);

        return $this->render('view', [
            'documents' => $category->documents,
            'categories' => $category->getSubCategories(),
            'category' => Category::findOne( $category_id),
        ]);
    }

    public function actionViewSingleArticle($category_id, $doc_id)
    {
        $category = new Category();
        $category = $category->findOne($category_id);
        return $this->render('view_single_article', [
            'category' => $category,
            'document' => $this->findModel($doc_id),
        ]);
    }

    public function actionViewAllArticles($id)
    {
        $category = new Category();
        $category = $category->findOne($id);
        return $this->render('view_all_articles', [
            'category' => $category,
            'documents' => $category->documents,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        return new Document();
    }
}

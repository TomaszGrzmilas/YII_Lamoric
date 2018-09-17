<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\models\category\Category;
use app\modules\docmgm\models\Document;
use app\modules\docmgm\models\DocCategorySearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


class TrainingsOvwController extends Controller
{
    public function actionIndex($id = null)
    {
        $category = new Category();
        $model = new Document();

        if(is_null($id)){
            $category_id = $model->traningRootCategoryId;
        } else {
            $category_id = $id;
        }

        $category = $category->findOne($category_id);

        return $this->render('index', [
            'documents' => $category->documents,
            'categories' => $category->getSubCategories(),
            'category' => $category,
        ]);
    }
}
?>
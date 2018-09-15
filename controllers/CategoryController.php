<?php

namespace app\controllers;

use Yii;
use app\models\category\Category;

class CategoryController extends \yii\web\Controller
{
    public function actionAdmin()
    {
        $model = new Category;
        return $this->render('admin',
            [
                'model'=>$model,
            ]);
    }

    public function actionOverviewArticle()
    {
        $root = Category::find()->select('id')->where(['name'=>'Artykuły'])->asArray()->All();
        $root = $root[0];

        return $this->render('overview',
            [
                'root'=>$root,
            ]);
    }

    public function actionOverviewLaw()
    {
        $root = Category::find()->select('id')->where(['name'=>'Prawo'])->asArray()->All();
        $root = $root[0];

        return $this->render('overview',
            [
                'root'=>$root,
            ]);
    }

    public function actionDeleteFile($id)
    {
        if (Yii::$app->request->isAjax && $id != null) 
        {
            $model = new Category();

            $model = $model->find()->where(['id'=>$id])->one();

            $file = \yii\helpers\FileHelper::normalizePath($model->image);

            if(file_exists($file))
            {
                unlink($model->image);
            }

            $model->image = null;
            $model->save();
            return '{}';
      }
    return null;
    }

}

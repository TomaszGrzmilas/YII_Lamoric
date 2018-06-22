<?php

namespace app\controllers;

use Yii;
use app\models\Workplace;
use app\models\WorkplaceSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * WorkplaceController implements the CRUD actions for Workplace model.
 */
class WorkplaceController extends Controller
{
    /*
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
*/

    public function actionIndex()
    {
        $model = new Workplace();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new Workplace();
        }

        $searchModel = new WorkplaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionView($company_id, $workplace_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($company_id, $workplace_id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Workplace();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'company_id' => $model->company_id, 'workplace_id' => $model->workplace_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($company_id, $workplace_id)
    {
        $model = $this->findModel($company_id, $workplace_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'company_id' => $model->company_id, 'workplace_id' => $model->workplace_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($company_id, $workplace_id)
    {
        $this->findModel($company_id, $workplace_id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($company_id, $workplace_id)
    {
        if (($model = Workplace::findOne(['company_id' => $company_id, 'workplace_id' => $workplace_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('db/workplace', 'The requested page does not exist.'));
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Workplace;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkplaceController implements the CRUD actions for Workplace model.
 */
class WorkplaceController extends Controller
{
    public $menuItem;

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
    /**
     * Lists all Workplace models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Workplace::find(),
        ]);

        $this->menuItem = 'workplace-index';

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'menuItem' =>  $this->menuItem,
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

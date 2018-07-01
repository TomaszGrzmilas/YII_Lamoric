<?php

namespace app\controllers;

use Yii;
use app\models\company\Company;
use app\models\company\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ruskid\csvimporter\CSVImporter;
use ruskid\csvimporter\CSVReader;
use ruskid\csvimporter\ARImportStrategy;
use yii\web\UploadedFile;
//use yii\base\Event;

class CompanyController extends Controller
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
        ];
    }

    //public function init(){
    //    Event::on(Company::className(), Company::EVENT_AFTER_INSERT, ['app\components\EventHandler', 'AfterInsert']);
    //    parent::init();
    //}

    public function actionIndex()
    {
        $model = new Company();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new Company();
        }

        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Company();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->company_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionImport()
    {
        $model = new Company();

        if (Yii::$app->request->isPost) {

            $model->importfile = UploadedFile::getInstance($model, 'importfile');
            
                $importer = new CSVImporter;

                $importer->setData(new CSVReader([
                    'filename' => $model->importfile->tempName,
                    'fgetcsvOptions' => [
                        'delimiter' => ';'
                    ]
                ]));

                $numberRowsAffected = $importer->import(new ARImportStrategy([
                    'className' => Company::className(),
                    'configs' => [
                        [
                            'attribute' => 'name',
                            'value' => function($line) {
                                return $line[0];
                            },
                           'unique' => true, 
                        ]
                    ],
                ]));
                
                return $this->redirect(['index']);
        }
        
        return $this->render('_import_form', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('db/company', 'The requested page does not exist.'));
    }
}

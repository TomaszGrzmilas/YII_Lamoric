<?php

namespace app\controllers;

use Yii;
use app\models\member\Member;
use app\models\company\Company;
use app\models\workplace\Workplace;
use app\models\member\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ruskid\csvimporter\CSVImporter;
use ruskid\csvimporter\CSVReader;
use app\classes\ruskid\ARImportStrategy;
use yii\web\UploadedFile;
use yii\base\DynamicModel;
use app\components\CustomUtil;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
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

    public function actionIndex()
    {
        $model = new Member();
      
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new Member();
        }

        $searchModel = new MemberSearch();
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

    public function actionTest()
    {
        $keys = Yii::$app->request->post('keylist');
        
        if (is_array($keys) || $keys === 'ALL' )
        {
            echo 'ok';
        }
        
        return null;
    }

    public function actionCreate()
    {
        $model = new Member();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
        $model = new Member();

        if (Yii::$app->request->isPost) {

            $model->importfile = UploadedFile::getInstance($model, 'importfile');
            
            $importer = new CSVImporter;

            $importer->setData(new CSVReader([
                'filename' => $model->importfile->tempName,
                'fgetcsvOptions' => [
                    'delimiter' => ';'
                ]
            ]));

            $importModel = $importer->import(new ARImportStrategy([
                'className' => Member::className(),
                'configs' => [
                    [
                        'attribute' => 'name',
                        'value' => function($line) {
                            return $line[0];
                        },
                    ],
                    [
                        'attribute' => 'surname',
                        'value' => function($line) {
                            return $line[1];
                        },
                    ],
                    [
                        'attribute' => 'pesel',
                        'value' => function($line) {
                            return $line[2];
                        },
                    ],
                    [
                        'attribute' => 'zip_code',
                        'value' => function($line) {
                            return $line[3];
                        },
                    ],
                    [
                        'attribute' => 'city',
                        'value' => function($line) {
                            return $line[4];
                        },
                    ],
                    [
                        'attribute' => 'street',
                        'value' => function($line) {
                            return $line[5];
                        },
                    ],
                    [
                        'attribute' => 'building',
                        'value' => function($line) {
                            return $line[6];
                        },
                    ],
                    [
                        'attribute' => 'local',
                        'value' => function($line) {
                            return $line[7];
                        },
                    ],
                    [
                        'attribute' => 'phone',
                        'value' => function($line) {
                            return $line[8];
                        },
                    ],
                    [
                        'attribute' => 'email',
                        'value' => function($line) {
                            return $line[9];
                        },
                    ],
                    [
                        'attribute' => 'company_id',
                        'value' => function($line) {
                            $name = $line[10];
                            $company = Company::getDb()->cache(function ($db) use($name) {
                                return Company::find()->where(['name' => $name])->one();
                            });

                            return isset($company) ? $company->company_id : null;
                        },
                    ],
                    [
                        'attribute' => 'workplace_id',
                        'value' => function($line) {

                            $name = $line[10];
                            $company = Company::getDb()->cache(function ($db) use($name) {
                                return Company::find()->where(['name' => $name])->one();
                            });

                            $company_id = isset($company) ? $company->company_id : null;

                            $name = $line[11];
                            $workplace = Workplace::getDb()->cache(function ($db) use($name, $company_id) {
                                return Workplace::find()->where(['name' => $name, 'company_id'=> $company_id])->one();
                            });

                            return isset($workplace) ? $workplace->workplace_id : '';
                        },
                    ],
                ],
            ]));

            if ($importModel->hasErrors()) {
                CustomUtil::setFlash('error', 'Błąd podczas importu linii nr '. $importModel->importLine .':', $importModel->getErrors());
            } else {
                if ($importModel->importLine == 1) {
                    CustomUtil::setFlash('success', 'Dodano 1 rekord.');
                } else if ($importModel->importLine > 1 && $importModel->importLine <=4) {
                    CustomUtil::setFlash('success', 'Dodano '. $importModel->importLine .' rekordy.');
                } else {
                    CustomUtil::setFlash('success', 'Dodano '. $importModel->importLine .' rekordów.');
                    }
                }
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

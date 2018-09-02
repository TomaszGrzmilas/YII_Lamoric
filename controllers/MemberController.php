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
use kartik\mpdf\Pdf;
use app\components\EventHandler;

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
        return $this->render('first');
    }

    public function actionList()
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

    public function actionPrintList($keylist, $type)
    {
        if (Yii::$app->request->isAjax) {
            $file = 'media/download/Lista_Czlonkow_'.time().'.pdf';
            $filePath = $_SERVER['DOCUMENT_ROOT'].'/'.$file;

            if (isset($keylist)) {
                $keys = json_decode($keylist);
                if (!is_array($keys)) {
                    $keys = null;
                }
            } else {
                $keys = null;
            }

            $model = new Member();

            if ($type == 10) {
                $dataProvider = $model->find()->list_members_full($keys)->asArray()->all();
            } else if ($type == 259) {
                $dataProvider = $model->find()->list_members_short($keys)->asArray()->all();
            } else 
            { 
                return null;
            }

            $content = $this->renderPartial('@app/views/_reports/member_list', 
                [
                    'dataProvider' =>$dataProvider,
                    'model'=> $model
                ]
            );

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, 
                'format' => Pdf::FORMAT_A4, 
                'orientation' => Pdf::ORIENT_LANDSCAPE, 
                'destination' => Pdf::DEST_FILE, 
                'filename' => $filePath,
                'content' => $content,  
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '.kv-heading-1{font-size:18px}', 
                'options' => ['title' => 'Lista Członków'],
                'methods' => [ 
                    'SetHeader'=>['Wydruk listy członków'], 
                    'SetHTMLFooter'=>['Wydrukował  '. Yii::$app->user->identity->username . ' w dniu: {DATE j-m-Y} <br> Strona: {PAGENO}'],
                ]
            ]);
        
            $pdf->render();

            if ($type == 10) {
                EventHandler::AfterPrint('trace\member\report', 'Pełna lista członków');
            } else if ($type == 259) {
                EventHandler::AfterPrint('trace\member\report', 'Skrócona lista członków');
            }
            
            return \yii\helpers\Url::home(true) . $file;
        }
    }

    public function actionCreate()
    {
        $model = new Member();

        $addnext = Yii::$app->request->get('addnext');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($addnext == 'true') {
                $model = new Member();
            } 
            else {
                return $this->redirect(['view', 'id' => $model->id]);
            }
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

        return $this->redirect(['list']);
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

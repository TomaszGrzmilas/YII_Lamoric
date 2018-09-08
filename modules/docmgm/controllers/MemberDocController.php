<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\modules\docmgm\models\member_doc\MemberDoc;
use app\modules\docmgm\models\member_doc\MemberDocSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use kartik\mpdf\Pdf;
use app\components\EventHandler;

use app\vendor\Gears\Pdf;


class MemberDocController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new MemberDocSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $model = new MemberDoc();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->member_doc_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->member_doc_id]);
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

    public function actionCreatePdf($memberDocId, $memberId)
    {
   //     if (Yii::$app->request->isAjax) {
            if ($memberDocId != null && $memberId != null)
            {
                $file = 'media/download/member_doc_print/'.time().'.docx';
                $filePath = $_SERVER['DOCUMENT_ROOT'].'/'.$file;

                $model = new MemberDoc();

                $doc = $model->find()->where(['member_doc_id'=>$memberDocId] )->all();

                $templateFilePath = $_SERVER['DOCUMENT_ROOT']. $doc[0]->uploadedFile->getFilePath();

                $phpWord = new \PhpOffice\PhpWord\PhpWord();        
                $template = $phpWord->loadTemplate($templateFilePath);
                $template->setValue('name', 'John Doe');

                $template->saveAs($filePath);

             //   $phpWord2 = \PhpOffice\PhpWord\IOFactory::load('temp.docx'); 
            //    $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord2 , 'PDF');
            //    $xmlWriter->save('result.pdf');  

            //    $file = 'media/download/member_doc_print/'.time().'.pdf';
             //   $filePath = $_SERVER['DOCUMENT_ROOT'].'/'.$file;

                $template->saveAs($filePath);

                return \yii\helpers\Url::home(true) . $file;
 
            }
    //    }
    }

    protected function findModel($id)
    {
        if (($model = MemberDoc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(DocmgmModule::t('db/memberdoc', 'The requested page does not exist.'));
    }
}

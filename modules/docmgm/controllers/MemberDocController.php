<?php

namespace app\modules\docmgm\controllers;

use Yii;
use app\modules\docmgm\models\member_doc\MemberDoc;
use app\modules\docmgm\models\member_doc\MemberDocSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use app\components\EventHandler;


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

    public function actionCreatePdf($id)
    {
      //  if (Yii::$app->request->isAjax) {
            $file = 'media/download/member_do_'.time().'.pdf';
            $filePath = $_SERVER['DOCUMENT_ROOT'].'/'.$file;

            $model = new MemberDoc();

            $doc = $model->find()->where(['member_doc_id'=>$id] )->asArray()->all();
            $content = $doc[0]['text'];
            
            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, 
                'format' => Pdf::FORMAT_A4, 
                'orientation' => Pdf::ORIENT_LANDSCAPE, 
                'destination' => Pdf::DEST_FILE, 
                'filename' => $filePath,
                'content' => $content,  
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '.kv-heading-1{font-size:18px}', 
                'options' => ['title' => null],
                'methods' => [ 
                    'SetHeader'=>[null], 
                 //   'SetHTMLFooter'=>['Wydrukował  '. Yii::$app->user->identity->username . ' w dniu: {DATE j-m-Y} <br> Strona: {PAGENO}'],
                ]
            ]);
        
            return $pdf->render();


           // return \yii\helpers\Url::home(true) . $file;
          // return 'ok';
      //  }
    }

    protected function findModel($id)
    {
        if (($model = MemberDoc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('db/memberdoc', 'The requested page does not exist.'));
    }
}

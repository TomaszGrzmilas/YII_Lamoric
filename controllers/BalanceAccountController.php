<?php

namespace app\controllers;

use Yii;
use app\models\balance_account\BalanceAccount;
use app\models\balance_account\BalanceAccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use app\components\EventHandler;

class BalanceAccountController extends Controller
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
        $searchModel = new BalanceAccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOutstanding()
    {
        $searchModel = new BalanceAccountSearch();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => BalanceAccount::find()->where(['<','balance','0']),
        ]);

        return $this->render('outstanding', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
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
            $file = 'media/download/Lista_Skladek_'.time().'.pdf';
            $filePath = $_SERVER['DOCUMENT_ROOT'].'/'.$file;

            if (isset($keylist)) {
                $keys = json_decode($keylist);
                if (!is_array($keys)) {
                    $keys = null;
                }
            } else {
                $keys = null;
            }

            $model = new BalanceAccount();

            if ($type == 456) {
                $dataProvider = $model->find()->listPayments($keys,'full')->asArray()->all();
            } else if ($type == 789) {
                $dataProvider = $model->find()->listPayments($keys,'outstanding')->asArray()->all();
            } else 
            { 
                return null;
            }
            foreach ($dataProvider as $key =>$doc) {
                if (isset($doc['member']))
                {
                    unset($dataProvider[$key]['member']);
                }
            }

           $content = $this->renderPartial('@app/views/_reports/payment_list', 
                [
                    'dataProvider' =>$dataProvider,
                    'model'=> $model
                ]
            );

            $report_title = $type == 456 ? 'Wydruk listy składek' : 'Wydruk zaległych składek';

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, 
                'format' => Pdf::FORMAT_A4, 
                'orientation' => Pdf::ORIENT_LANDSCAPE, 
                'destination' => Pdf::DEST_FILE, 
                'filename' => $filePath,
                'content' => $content,  
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                'cssInline' => '.kv-heading-1{font-size:18px}', 
                'options' => ['title' => $report_title],
                'methods' => [ 
                    'SetHeader'=>[$report_title], 
                    'SetHTMLFooter'=>['Wydrukował  '. Yii::$app->user->identity->username . ' w dniu: {DATE j-m-Y} <br> Strona: {PAGENO}'],
                ]
            ]);
        
            $pdf->render();
            EventHandler::AfterPrint('trace\balanceaccount\report', $report_title);
            return \yii\helpers\Url::home(true) . $file;
        }
    }

/*
    public function actionTest()
    {
        $now = new \DateTime('now');
        if ($now->format('d') == "01") 
        {
            $members = \app\models\member\Member::find()->all();
            foreach ($members as $member) {
                $member->account->chargeContribution();
            }
        }
        return $this->redirect(['index']); 
    }

    /*
    public function actionCreate()
    {
        $model = new BalanceAccount();

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
    */
    protected function findModel($id)
    {
        if (($model = BalanceAccount::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

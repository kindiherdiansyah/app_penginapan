<?php

namespace frontend\controllers;

use Yii;
use app\models\Pemesanan;
use frontend\models\PemesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use app\models\PaketTambahan;
use app\models\Cradit;


/**
 * PemesananController implements the CRUD actions for Pemesanan model.
 */
class PemesananController extends Controller
{
    /**
     * @inheritdoc
     */
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

    public function actionCetakpemesanan($id) {
 
        // get your HTML raw content without any layouts or scripts
        
        $query = Pemesanan::find();
        $models = $query
        ->where(['id_pemesan' => $id,])
        ->all();

        $content =  $this->render('cetakpemesanan',[
            'models' => $models,
            'model' => $this->findModel($id),
        ]);
         
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content, 
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',

            'options' => [
                'title' => 'CiaterSpa.com'
            ],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['PEMESANAN PENGINAPAN CIATER SPA & RESORT'],
                'SetFooter'=>['ciaterspa.com'],
            ]
        ]);
        // http response
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/pdf');
 
        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    /**
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionLihat()
    {
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lihat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pemesanan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

     public function actionViewkredit($id)
    {
        return $this->render('viewkredit', [
            'model' => $this->findModelkredit($id),
        ]);
    }

    /**
     * Creates a new Pemesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Pemesanan();
        $model->id_pemesan = date('dmythis');
        $model->tanggal_pesan = date('Y-m-d');
        //$model->checkout = date('Y-m-d');
        $model->status = 'Belum Bayar';
        $model->nama_pemesan = Yii::$app->user->identity->nama;
        $model->email_pemasan = Yii::$app->user->identity->email;
        $model->notel = Yii::$app->user->identity->notel;
        $model->alamat_pemesan = Yii::$app->user->identity->alamat;



        $models = $this->findModelpakettambahan($id);
        $model->kd_paket_tambahan = $models->kd_paket_tambahan;
       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pemesan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionPembayarankredit($id)
    {
        $pemesanan = $this->findModel($id);
         $kdPaketTambahan = $this->findModel($id);
        $model = new Cradit();
         $model->nominal = $pemesanan->kdPaketTambahan->tarif;
        $model->keterangan = $pemesanan->id_pemesan;

        $modelPaketTambahan = $this->findModelpakettambahan($pemesanan->kdPaketTambahan->kd_paket_tambahan);
        $modelPaketTambahan->status ='Sudah di Pesan';
        $modelPaketTambahan->save();

        $model->kd_paket_tambahan = $pemesanan->kdPaketTambahan->kd_paket_tambahan;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewkredit', 'id' => $model->id_pembayaran]);
        } else {
            return $this->render('kredit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pemesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pemesan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pemesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pemesanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelpakettambahan($id)
    {
        if (($model = PaketTambahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     protected function findModelkredit($id)
    {
        if (($model = Cradit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }   
}

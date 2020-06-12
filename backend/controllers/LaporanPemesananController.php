<?php

namespace backend\controllers;

use Yii;
use backend\models\LaporanPemesanan;
use backend\models\LaporanPemesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\AccessRules;

/**
 * LaporanPemesananController implements the CRUD actions for LaporanPemesanan model.
 */
class LaporanPemesananController extends Controller
{
     public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'ruleConfig' => [
                            'class' => AccessRules::className(),
                        ],
                        'only' => ['index','create','update','delete','view'],
                        'rules' => [
                            // allow authenticated users
                            [
                'actions' => ['index','create','update','delete','view'],
                                'allow' => true,
                                'roles' => ['2'],
                            ],
                 [
                'actions' => [''],
                                'allow' => true,
                                'roles' => ['?','1'],
                            ],

                  [
                'actions' => [''],
                                'allow' => true,
                                'roles' => ['?','0'],
                            ],

                
                            // everything else is denied
                        ],
                    ],  
        ];
    }

    /**
     * Lists all LaporanPemesanan models.
     * @return mixed
     */
    public function actionIndex()
        {
    $data = Yii::$app->db->createCommand('select 
    kd_paket_tambahan,
    sum(lama_inap) as jml
    from pemesanan
    group by kd_paket_tambahan')->queryAll();
        $searchModel = new LaporanPemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dgrafik' => $data,
        ]);
    }

    /**
     * Displays a single LaporanPemesanan model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LaporanPemesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LaporanPemesanan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pemesan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LaporanPemesanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pemesan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LaporanPemesanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LaporanPemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LaporanPemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaporanPemesanan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use Yii;
use app\models\Pemesanan;
use backend\models\PemesananSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\AccessRules;

/**
 * PemesananController implements the CRUD actions for Pemesanan model.
 */
class PemesananController extends Controller
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
     * @inheritdoc
     */
    

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
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
    
    
    //{
      //  $searchModel = new PemesananSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //return $this->render('index', [
          //  'searchModel' => $searchModel,
         //   'dataProvider' => $dataProvider,
      //  ]);
   // }

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

    /**
     * Creates a new Pemesanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pemesanan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pemesan]);
        } else {
            return $this->render('create', [
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
}

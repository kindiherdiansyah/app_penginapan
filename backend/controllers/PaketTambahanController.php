<?php

namespace backend\controllers;

use Yii;
use app\models\PaketTambahan;
use backend\models\PaketTambahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\AccessRules;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * PaketTambahanController implements the CRUD actions for PaketTambahan model.
 */
class PaketTambahanController extends Controller
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
                                'roles' => ['0'],
                            ],
                 [
                'actions' => [''],
                                'allow' => true,
                                'roles' => ['?','1'],
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
     * Lists all PaketTambahan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaketTambahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PaketTambahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PaketTambahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PaketTambahan();

        if ($model->load(Yii::$app->request->post())) {
            // ambil foto
            $model->foto = UploadedFile::getInstance($model, 'foto');
               
            if ($model->validate()) {
                // upload foto
                $model->foto->saveAs(
                    Url::to('@common/uploads/penginapan/') . $model->foto);
                $model->save(false);
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

     return $this->render('create', [
            'model'=>$model
            ]);
       }

    /**
     * Updates an existing PaketTambahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())) {
            // ambil foto
            $model->foto = UploadedFile::getInstance($model, 'foto');
               
            if ($model->validate()) {
                // upload foto
                $model->foto->saveAs(
                    Url::to('@common/uploads/penginapan/') . $model->foto);
                $model->save(false);
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

     return $this->render('create', [
            'model'=>$model
            ]);
       }

    /**
     * Deletes an existing PaketTambahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PaketTambahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaketTambahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaketTambahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

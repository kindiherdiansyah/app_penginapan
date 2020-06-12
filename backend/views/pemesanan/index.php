<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

use kartik\export\ExportMenu;
use dosamigos\highcharts\HighCharts;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Pemesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-index">


   

 <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
     
    <?php


    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

             //'id_pemesan',
              [
          'label' => 'ID Pemesan',
          'attribute' =>'id_pemesan',
           'pageSummary' => 'Total',

          ],
            'nama_pemesan',
            'alamat_pemesan',
            //'email_pemasan:email',
            'notel',
            'status',
             [
          'label' => 'Nama Paket Penginapan',
          'attribute' =>'kd_paket_tambahan',
          'value' => 'kdPaketTambahan.nama_paket'
          ],
          [
        'label' => 'Tanggal Pesan',
        'attribute' =>'tanggal_pesan',
        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asDate ($model->tanggal_pesan, 'dd-MM-Y');
            }
        ],
            
            [
        'label' => 'Checkin',
        'attribute' =>'checkin',
        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asDate ($model->checkin, 'dd-MM-Y');
            }
        ],
            
            [
              'label' => 'Lama Inap',
              'attribute' => 'lama_inap',
              'value' => function ($model) {
            if($model)
                return ($model->lama_inap . ' Hari');
            }
          ],

            [
        'label' => 'Checkout',
        'attribute' =>'checkout',
        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asDate ($model->checkout, 'dd-MM-Y');
            }
        ],
          
             [
        'label' => 'Biaya',
        'attribute' =>'kd_paket_tambahan',
        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asCurrency ($model->kdPaketTambahan->tarif);
            }
        ],

             [
            'label' => 'Total',
            'attribute' => 'total',
            'pageSummary' => true,
            'pageSummaryOptions' => ['kd_paket_tambahan' => 'tarif'],
            'value' => function ($model) {
            if($model)
                return  $model->lama_inap * $model->kdPaketTambahan->tarif;
            else
                return 0;
            }
        ],

            
        ],
         'showPageSummary' => true,

    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

          
            'nama_pemesan',
            'alamat_pemesan',
            //'email_pemasan:email',
            'notel',
            'status',
             [
          'label' => 'Nama Paket Penginapan',
          'attribute' =>'kd_paket_tambahan',
          'value' => 'kdPaketTambahan.nama_paket',
         
          ],
           [
        'label' => 'Tanggal Pesan',
        'attribute' =>'tanggal_pesan',
        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asDate ($model->tanggal_pesan, 'dd-MM-Y');
            }
        ],
            
            [
        'label' => 'Checkin',
        'attribute' =>'checkin',
        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asDate ($model->checkin, 'dd-MM-Y');
            }
        ],
            
            [
              'label' => 'Lama Inap',
              'attribute' => 'lama_inap',
              'value' => function ($model) {
            if($model)
                return ($model->lama_inap . ' Hari');
            }
          ],

            [
        'label' => 'Checkout',
        'attribute' =>'checkout',
        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asDate ($model->checkout, 'dd-MM-Y');
            }
        ],
          
             [
        'label' => 'Biaya',
        'pageSummary' => 'Total',
        'attribute' =>'kd_paket_tambahan',

        'value' => function ($model) {
            if($model)
                return Yii::$app->formatter->asCurrency ($model->kdPaketTambahan->tarif);
            }

        ],
             [
            'label' => 'Total',
            'attribute' => 'total',
            'pageSummary' => true,
            'pageSummaryOptions' => ['kd_paket_tambahan' => 'tarif'],
            'value' => function ($model) {
            if($model)
                return $model->lama_inap * $model->kdPaketTambahan->tarif;
            else
                return 0;
            }
        ],

          // di bawah ini untuk menampilkan view update delete
            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'showPageSummary' => true,
    ]); ?>




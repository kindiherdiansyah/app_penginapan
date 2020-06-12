<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */

$this->title = $model->status;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-view">

    <center><img src="image/logo1.jpg" width="300" height="110"/> 
    <br>
    <hr>
   <br>
    </center>
    <b><i><p align="center"><font size="5"><?= Html::encode($this->title) ?></i></font></p></b>
    <br>



 <div class="container-fluid ">
<div class="col-lg-6">
    <b><p align="left"><font size="4">Biodata Pemesan</font></p></b>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           'id_pemesan',
            'nama_pemesan',
            'alamat_pemesan',
            'email_pemasan:email',
            'notel',
        ],
    ]) ?>
</div>
    <div class="col-lg-6">
         <b><p align="left"><font size="4">Biodata Pemesanan Penginapan</font></p></b>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
             [
                'label' => 'Nama Penginapan',
                'value' => $model->kdPaketTambahan->nama_paket,
            ],
            [
                'label' => 'Tanggal Pesan',
                'value' => Yii::$app->formatter->asDate($model->tanggal_pesan, 'd-MMMM-Y'),
            ],
            [
                'label' => 'Checkin',
                'value' => Yii::$app->formatter->asDate($model->checkin, 'dd-MMMM-Y'),
            ],
            [
                'label' => 'Checkout',
                'value' => Yii::$app->formatter->asDate($model->checkout, 'dd-MMMM-Y'),
            ],
            [
                'label' => 'Lama Inap',
                'value' => $model->lama_inap . ' Hari',
            ],
             [
                'label' => 'Harga Penginapan',
                'value' => Yii::$app->formatter->asCurrency ($model->kdPaketTambahan->tarif),
            ],
             [
                'label' => 'total Harga',
                'value' => Yii::$app->formatter->asCurrency ($model->lama_inap * $model->kdPaketTambahan->tarif),
            ],

            //[
                //'label' => 'foto',
                //'value' => Html::img(Yii::getAlias('@imageurl')."/penginapan/".$model->kdPaketTambahan->foto, ['width' => '500px']),
                //'format' => 'raw'
           //],

        ],
    ]) ?>

   

</div>
<center><?= Html::a('<span class="glyphicon glyphicon-download-alt"></span> Download Bukti Pemesanan', ['cetakpemesanan', 'id' => $model->id_pemesan], ['class' => 'btn btn-primary','target' => '_blank']) ?></center>
<p>
        <center><?php if ($model->status=='Belum Bayar') { 
            echo Html::a('Bayar via Kartu Kredit', ['pembayarankredit', 'id' => $model->id_pemesan], ['class' => 'btn btn-danger']);
            } else {
                echo '';
                } ?></center>
    </p>

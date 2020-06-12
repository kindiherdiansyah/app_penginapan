<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaketTambahan */

$this->title = $model->kd_paket_tambahan;
$this->params['breadcrumbs'][] = ['label' => 'Paket Tambahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-tambahan-view">

    <center><img src="image/logo1.jpg" width="400" height="150"/> 
    <br>
    <hr>
    <p><b><h3 align="center">Info Penginapan</h3></b></p>
    <br>
    </center>

<div class="container-fluid ">
<div class="col-lg-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => false,
                'value' => Html::img(Yii::getAlias('@imageurl')."/penginapan/".$model->foto, ['width' => '373px']),
                'format' => 'raw'
            ],
        ],
    ]) ?>
</div>
<div class="col-lg-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            
            [
                'label' => 'Kode Penginapan',
                'value' => $model->kode_paket,
            ],

            [
                'label' => 'Nama Penginapan',
                'value' => $model->nama_paket,
            ],
            [
                'label' => 'tarif',
                'value' => Yii::$app->formatter->asCurrency($model->tarif),
            ],
            'status',
            'keterangan:ntext',
        ],
    
     ]) ?>
</div>
</div>
<div class="row">
                <p>
                <center>
                    <?php if ($model->status == 'Tersedia') { ?>
                        <p><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Pesan Penginapan' , ['pemesanan/create', 'id' => $model->kd_paket_tambahan], ['class' => 'btn btn-success']);?></p>
                    <?php } else { ?>
                        <p><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Sudah Di Pesan' , ['pemesanan/create', 'id' => $model->kd_paket_tambahan], ['class' => 'btn btn-danger disabled', 'disabled' => true]);?></p>
                    <?php } ?>
                </center>
                </p>
        </div>

    

</div>

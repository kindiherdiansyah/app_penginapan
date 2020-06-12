<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cradit */

$this->title = $model->id_pembayaran;
$this->params['breadcrumbs'][] = ['label' => 'Cradits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cradit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pembayaran',
            'no_kartu',
            'nama_pemilik',
            'tanggal_valid',
            'cvv',
            'nominal',
            'keterangan',
            'kd_paket_tambahan',
        ],


    ]) ?>
    <br>
     <center><p><a class="btn btn-lg btn-success" href="http://localhost/proyek2/frontend/web/index.php?r=pemesanan%2Findex">Cek Pemesanan</a></p></center>
     <br>

</div>

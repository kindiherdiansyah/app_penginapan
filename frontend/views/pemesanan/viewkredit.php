<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pemesanan */

$this->title = "Info Pembayaran";
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-view">
    <center><img src="image/logo1.jpg" width="300" height="110"/> 
    <br>
    <hr>
    <h2><?= Html::encode($this->title) ?></h2>
    <br>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_pembayaran',
            'no_kartu',
            'nama_pemilik',
            'tanggal_valid',
            'cvv',
            'nominal',
            [
                'label' => 'Id Pemesanan',
                'value' => $model->keterangan,
            ],
        ],
    ]) ?>
    <?= Html::a(Yii::t('app', 'Cek Pemesanan Anda'), ['index'], ['class' => 'btn btn-primary']) ?>
</div>
</div>
</div>

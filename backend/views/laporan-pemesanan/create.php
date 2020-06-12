<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LaporanPemesanan */

$this->title = 'Create Laporan Pemesanan';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Pemesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-pemesanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

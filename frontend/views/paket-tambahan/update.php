<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaketTambahan */

$this->title = 'Update Paket Tambahan: ' . $model->kd_paket_tambahan;
$this->params['breadcrumbs'][] = ['label' => 'Paket Tambahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kd_paket_tambahan, 'url' => ['view', 'id' => $model->kd_paket_tambahan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paket-tambahan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

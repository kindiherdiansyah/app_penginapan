<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LaporanPemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-pemesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pemesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_pemasan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_paket_tambahan')->textInput() ?>

    <?= $form->field($model, 'tanggal_pesan')->textInput() ?>

    <?= $form->field($model, 'checkin')->textInput() ?>

    <?= $form->field($model, 'checkout')->textInput() ?>

    <?= $form->field($model, 'lama_inap')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

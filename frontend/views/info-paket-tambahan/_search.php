<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PaketTambahan;


/* @var $this yii\web\View */
/* @var $model frontend\models\PaketTambahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paket-tambahan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'kd_paket_tambahan')->dropDownList(
        ArrayHelper::map(PaketTambahan::findAll(['status' => 'tersedia']),'kd_paket_tambahan','nama_paket'),
        ['prompt'=>'Pilih Penginapan','style'=>'width:300px','maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>

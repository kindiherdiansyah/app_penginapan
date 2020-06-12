<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\PemesananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'status')->dropDownList(['prompt'=>'Pilih','Sudah Bayar'=>'Sudah Bayar','Belum Bayar'=>'Belum Bayar'],['style'=>'width:500px','maxlength' => true]); ?>
       <?= $form->field($model, 'kd_paket_tambahan', [
    "template" => "<label> Nama Penginapan </label>\n{input}\n{hint}\n{error}"
    ])->dropDownList(['prompt'=>'Pilih','1'=>'President Suite','2'=>'Executive Suite','3'=>'Pine Hill Suite','4'=>'Family Suite','5'=>'Pine Hill Deluxe','6'=>'Flat Deluxe','7'=>' Superior'],['style'=>'width:500px','maxlength' => true]); ?>
     <?= $form->field($model, 'tanggal_pesan', ["template" => "<label> Tanggal Pesan (Y-m-d) </label>\n{input}\n{hint}\n{error}"])->textInput(['maxlength' => true]); ?>




    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

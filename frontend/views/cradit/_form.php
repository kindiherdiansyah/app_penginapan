<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cradit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cradit-form thumbnail padding-baru">

   <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_kartu')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-999-999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
            ])->label('No Kartu')->textInput(['style'=>'width:500px','maxlength' => true])->label("No Kartu") ?>


    <?= $form->field($model, 'nama_pemilik')->textInput(['required' => true,'style'=>'width:500px','maxlength' => true])->label('Nama') ?>

    <?= $form->field($model, 'tanggal_valid')->textInput(['required' => true,'style'=>'width:500px','maxlength' => true])->label('Tanggal Valid') ?>

    <?= $form->field($model, 'cvv')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
    ])->label('CVV')->textInput(['style'=>'width:100px','maxlength' => true])->label("CVV") ?>

    <?= $form->field($model, 'nominal')->textInput(['style'=>'width:500px','maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'keterangan')->textInput(['style'=>'width:500px','maxlength' => true])->label('masukan id pemesanan') ?>

    
    <div class="form-group">
        <center><?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-save"></span> Bayar Sekarang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-default' : 'btn btn-primary']) ?></center>
    </div>

    <?php ActiveForm::end(); ?>

</div>

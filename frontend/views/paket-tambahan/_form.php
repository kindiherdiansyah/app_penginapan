<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaketTambahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paket-tambahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_paket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_paket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarif')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

     <?= $form->field($model, 'foto')->fileinput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

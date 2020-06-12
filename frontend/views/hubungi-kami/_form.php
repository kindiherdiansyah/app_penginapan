<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\HubungiKami */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hubungi-kami-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['style'=>'width:500px','maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['style'=>'width:500px','maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['style'=>'width:500px','maxlength' => true,'rows' => 7]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

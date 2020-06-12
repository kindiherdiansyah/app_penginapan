<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transfer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfer-form">

    <?php $form = ActiveForm::begin(); ?>


     <?= $form->field($model, 'no_rekening')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-999-999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
    ]) ?>


     <?= $form->field($model, 'no_rekening_tujuan')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-999-999',
        'clientOptions' => [
                'removeMaskOnSubmit' => true
                //'unmaskAsNumber'=>true//dont know what this does
            ]
    ]) ?>

    <?= $form->field($model, 'nominal')->textInput(['readOnly'=>true])->label(false) ?>

    <?= $form->field($model, 'keterangan')->textInput(['readOnly'=>true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

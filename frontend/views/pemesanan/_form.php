<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PaketTambahan;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-form thumbnail padding-baru">

    <?php $form = ActiveForm::begin(['id' => 'my-form-id']); ?>

    <?= $form->field($model, 'id_pemesan')->textInput(['readOnly'=>true,'style'=>'width:500px','maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemesan')->textInput(['style'=>'width:500px','maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'email_pemasan')->textInput(['style'=>'width:500px','maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'alamat_pemesan')->textInput(['style'=>'width:500px','maxlength' => true]) ?>

    <?= $form->field($model, 'notel')->textInput(['style'=>'width:500px','maxlength' => true]) ?>

    <?= $form->field($model, 'kd_paket_tambahan')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'tanggal_pesan')->textInput(['readOnly'=>true,'style'=>'width:500px','maxlength' => true]) ?>

    <?php
    $model->checkin = date('Y-m-d');
    $model->lama_inap = 1;
    $model->checkout = date('' , strtotime($model->checkin) + $model->lama_inap * 60 * 60 * 24);
    $checkin = Html::getInputId($model, 'checkin');
    $malam = Html::getInputId($model, 'lama_inap');
    $checkout = Html::getInputId($model, 'checkout');
?>

        <?= $form->field($model, 'checkin')->widget(
        DatePicker::className(),[
            'inline' => true,
            'template' => '<div class="well well-sm" style="background-color:#fff;width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>

     <?= $form->field($model, 'lama_inap')->dropDownList(['prompt'=>'Pilih','1'=>'1','2'=>'2','3'=>'3',],['style'=>'width:100px','maxlength' => true]); ?>

<?php
$js = <<<JS
$("#my-form-id #{$checkin}, #{$malam}").on("change", function (e) {
    var checkin = new Date($("#my-form-id #{$checkin}").val());
    var malam = parseInt($("#my-form-id #{$malam}").val());
    var date = checkin.setDate(checkin.getDate()+malam);
    var month = checkin.getMonth()+1;
    $("#my-form-id #{$checkout}").val(checkin.getFullYear()+"-"+month+"-"+checkin.getDate())
});
JS;
$this->registerJs($js);
?>  

    <?= $form->field($model, 'checkout')->textInput(['readOnly'=>true,'style'=>'width:500px','maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

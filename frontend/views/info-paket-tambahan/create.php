<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaketTambahan */

$this->title = 'Create Paket Tambahan';
$this->params['breadcrumbs'][] = ['label' => 'Paket Tambahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-tambahan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cradit */

$this->title = 'Pembayaran Via Kartu Kredit';
$this->params['breadcrumbs'][] = ['label' => 'Cradits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cradit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

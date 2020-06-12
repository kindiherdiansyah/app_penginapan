<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kontak */

$this->title = 'Update Kontak: ' . $model->id_kontak;
$this->params['breadcrumbs'][] = ['label' => 'Kontaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kontak, 'url' => ['view', 'id' => $model->id_kontak]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kontak-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

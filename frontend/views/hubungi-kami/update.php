<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\HubungiKami */

$this->title = 'Update Hubungi Kami: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Hubungi Kamis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kontak, 'url' => ['view', 'id' => $model->id_kontak]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hubungi-kami-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

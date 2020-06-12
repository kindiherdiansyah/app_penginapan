<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\HubungiKami */

$this->title = $model->id_kontak;
$this->params['breadcrumbs'][] = ['label' => 'Hubungi Kamis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungi-kami-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kontak], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kontak], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kontak',
            'nama',
            'email:email',
            'keterangan:ntext',
        ],
    ]) ?>

</div>

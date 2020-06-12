<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaketTambahan */

$this->title = $model->kd_paket_tambahan;
$this->params['breadcrumbs'][] = ['label' => 'Paket Tambahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-tambahan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kd_paket_tambahan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kd_paket_tambahan], [
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
            'kd_paket_tambahan',
            'kode_paket',
            'nama_paket',
            'tarif',
            'status',
            'keterangan:ntext',

       [
                'label' => 'foto',
                'value' => Html::img(Yii::getAlias('@imageurl')."/penginapan/".$model->foto, ['width' => '500px']),
                'format' => 'raw'
           ],
        ],
    
     ]) ?>

</div>

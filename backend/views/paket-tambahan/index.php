<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PaketTambahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paket Penginapan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-tambahan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Paket Tambahan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'kd_paket_tambahan',
            'kode_paket',
            'nama_paket',
            'tarif',
            'status',
            'keterangan:ntext',
           [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Foto',
            'value' => function ($data) {
                return Html::img(Yii::getAlias('@imageurl') . "/penginapan/" . $data['foto'],
                    ['width' => '200px']);
                },
            ],
     

            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>
</div>

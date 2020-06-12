<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CraditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cradits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cradit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cradit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pembayaran',
            'no_kartu',
            'nama_pemilik',
            'tanggal_valid',
            'cvv',
            // 'nominal',
             'keterangan',
             'kd_paket_tambahan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

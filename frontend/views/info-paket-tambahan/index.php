<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PaketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penginapan Ciater Spa & Resort ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_paket',
    ]) ?>
</div>

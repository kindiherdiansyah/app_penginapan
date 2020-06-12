<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-index">


     <center><img src="image/logo1.jpg" width="300" height="110"/> 
    <br>
    <br>
    </center>
    <p><h3 align="center">Cek Pemesanan yang sudah Anda Pesan</h3></p>
    </center>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

</div>

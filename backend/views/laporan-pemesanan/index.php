<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\highcharts\HighCharts;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LaporanPemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Grafik';
$this->params['breadcrumbs'][] = $this->title;?>
<div class="pemesanan-index">

 <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
   <?php
foreach($dgrafik as $values){
      $a[0]= ($values['kd_paket_tambahan']);
      $c[]= ($values['kd_paket_tambahan']);
      $b[]= array('type'=> 'column', 'name' =>$values['kd_paket_tambahan'], 'data' => array((int)$values['jml']));
   }
   echo
   Highcharts::widget([
      'clientOptions' => [
         'chart'=>[
            'type'=>'pie'
         ],
         'title' => ['text' => 'Data Penginapan yang banyak dipesan'],
         'xAxis' => [
            'categories' => ['Penginapan']
         ],
         'yAxis' => [
            'title' => ['text' => 'Banyak Pemesan']
         ],
        'series' => $b

      
   ]
]);
?>


<?php
// konfigurasi database
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "dbproject_yii2";
// perintah php untuk akses ke database
$koneksi = mysqli_connect($host, $user, $password, $database);
?>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<h4>Keterangan :</h4>
<table border="1">
  <tr>
    <th>NO ID</th>
    <th>NAMA PENGINAPAN</th>
        <?php
    $menu = mysqli_query($koneksi, "SELECT * from paket_tambahan");
    $no=1;
    foreach ($menu as $row){
        echo "<tr>
            <td>$no</td>
            <td>".$row['nama_paket']."</td>
              </tr>";
        $no++;
    }
    ?>
</table>

<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
?>

<p><b><h3 align="center"><img src="image/logo1.jpg" width="400" height="150"/> </h3></b></p>
    <br>
    <p align="center"><font size="5">Ini adalah bukti pemesanan anda!</font></p>
    <hr>
    </center>

<?php
//var_dump($dataProvider);

$total=0;
foreach ($models as $x) {
  	$kode = $x->id_pemesan;
    $nama = $x->nama_pemesan;
    $alamat = $x->alamat_pemesan;
    $email = $x->email_pemasan;
    $notel = $x->notel;
    $status = $x->status;
    $kd_paket_tambahan = $x->kd_paket_tambahan;
    $checkin = $x->checkin;
    $checkout = $x->checkout;
    $lama_inap = $x->lama_inap;
    $tanggal_pesan = $x->tanggal_pesan;
    $foto = $x->kdPaketTambahan->foto;

}

?>

<b><p align="center"><font size="5">Status Pembayaran : <i><?= $status ?></i></font></p></b>

<table class="table table-sm">
  <thead>
    <tr>
      <th>Kode Pemesanan</th>
      <th><?= $kode ?></th>
    </tr>
    <tr>
      <th>Nama Penginapan</th>
      <th><?= $model->kdPaketTambahan->nama_paket ?></th>
    </tr>
   </thead>
  <tbody>
    <tr>
      <td>
        <p><b><?= $nama ?></b></p>
        <p><?= $email ?></p>
        <p><?= $alamat ?></p>
        <p>Tanggal Pesan : <?= Yii::$app->formatter->asDate($tanggal_pesan, 'dd MMM yyyy') ?></p>
      </td>
    </tr>
  </tbody>
</table>
<table class="table table-sm">
  <thead>
    <tr>
      <th><center>No Telepon</center></th>
      <th><center>checkin</center></th>
      <th><center>Lama Inap</center></th>
      <th><center>checkout</center></th>
      <th><center>harga</center></th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><center><?= $model->notel?></center></th>
      <td><center><?= Yii::$app->formatter->asDate($checkout, 'dd-MM-Y') ?></center></td>
      <td><center><?= $model->lama_inap, ' Hari' ?></center></td>
      <td><center><?= Yii::$app->formatter->asDate($checkout, 'dd-MM-Y') ?></center></td>
      <td><center><?= Yii::$app->formatter->asCurrency ($model->kdPaketTambahan->tarif) ?></center></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <th>Total :</th>
      <th><?=  Yii::$app->formatter->asCurrency($model->lama_inap * $model->kdPaketTambahan->tarif) ?></th>
    </tr>
  </tbody>
</table>
 <th><p align="center"><?= Html::img(Yii::getAlias('@imageurl')."/Penginapan/".$model->kdPaketTambahan->foto, ['width' => '300px']) ?></th></font></p>
<p><i>*NB : </i></p>
    <p><i>-Simpan Untuk Bukti Pemesanan</i></p>
    <br>





<?php
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>
<head>
<style>
p.serif {
    font-family: "Times New Roman", Times, serif;
}

p.sansserif {
    font-family: Arial, Helvetica, sans-serif;
}
p.small {
    font-variant: small-caps;
}
</style>
</head>
<body>
<h1>Cara Pesan Sebagai Berikut :</h1>
<br>
<p class="small">
<H3>Langkah Langkah</h3>
<li>Untuk melakukan pemesanan terlebih dahulu membuat daftar user jika tidak memiliki akun</li>
<br>
<li>Setelah login, Pengunjung memilih / mencari penginapan tersedia di sistem informasi</li>
<br>
<li>Kemudian Pengunjung memilih menu Pemesanan untuk memesan penginapan yang tersedia</li>
<br>
<li>jika sudah mengisi semua data pemesanan kemudian lanjut ke pembayaran via kredit</li>
<br>
<li>setelah membayar, lanjut ke Cek pemesanan dan masukan id pemesanan</li>
<br>
<li>Setelah itu download bukti pemesanan anda</li>
<br>
<li>Selesai, dan selamat menikmati penginapan di Ciater Spa & Resort</li>
<br>
<li>Selesai</li> 
</p>
<div class="form-group">
   
       <?= Html::a(Yii::t('app', 'Kembali ke sebelumnya'), ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

	</body>
</html>

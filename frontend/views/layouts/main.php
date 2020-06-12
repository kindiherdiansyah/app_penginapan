<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="image/logo2.jpg" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'CIATER SPA & RESORT',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],

/*[
    'label' => 'Gallery',   
    'items' => [
        ['label' => 'Ciater Spa ', 'url' => ['/site/ciater']],
        ['label' => 'Rekreasi', 'url' => ['/site/rekreasi']],
        ['label' => 'Akomodasi', 'url' => ['/site/akomodasi']],
        ],
    ],*/

[
    'label' => 'Info Paket',
    'items' => [
        //['label' => 'Kategori Paket', 'url' => ['/kategori-paket/index']],
        //['label' => 'Paket Rekreasi', 'url' => ['/rekreasi/index']],
        ['label' => 'Paket Penginapan', 'url' => ['/info-paket-tambahan/index']],
        ],
    ],
        
    ];
    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Daftar User', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];

    } else {
       $menuItems = [
       ['label' => 'Home', 'url' => ['/site/index']],
    /*[
    'label' => 'Gallery',
    'items' => [
        ['label' => 'Ciater Spa ', 'url' => ['/site/ciater']],
        ['label' => 'Rekreasi', 'url' => ['/site/rekreasi']],
        ['label' => 'Akomodasi', 'url' => ['/site/akomodasi']],
        ],
    ],*/

        ['label' => 'Paket Penginapan', 'url' => ['/paket-tambahan/index']],

        ['label' => 'Cek Pemesanan', 'url' => ['/pemesanan/index']],


    //[
    //'label'=> 'Transaksi',
    //'items'=> [
        //['label' => 'Transaksi Paket Rekreasi', 'url' => ['/transaksi-rekreasi/create']],
        //['label' => 'Transaksi Paket Penginapan', 'url' => ['/transaksi-penginapan/index']],
        //],
   // ],
        ['label' => 'Hubungi Kami', 'url' => ['/hubungi-kami/create']],
    ];

        $menuItems [] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Ciater Spa & Resort <?= date('Y') ?></p>

        <p class="pull-right"> create by  : Fadillah Firdaus</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

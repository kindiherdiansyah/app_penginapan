<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    ];
    
    if (Yii::$app->user->isGuest) {
      
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];

    } else {
       $menuItems = [
      ['label' => 'Home', 'url' => ['/site/index']],


        ['label' => 'Paket Penginapan', 'url' => ['/paket-tambahan/index']],



       // ['label' => 'Laporan Keuangan', 'url' => ['/pemesanan/index']],

          [
    'label'=> 'Laporan Keuangan',
    'items'=> [
        ['label' => 'Laporan Pemesanan', 'url' => ['/pemesanan/index']],
        //['label' => 'Bank', 'url' => ['/bank/index']],
        ['label' => 'Grafik', 'url' => ['/laporan-pemesanan/index']],
        ],
    ],
         
          [
    'label'=> 'Bank',
    'items'=> [
        ['label' => 'Nasabah', 'url' => ['/nasabah/index']],
        //['label' => 'Bank', 'url' => ['/bank/index']],
        ['label' => 'Cradit', 'url' => ['/cradit/index']],
        ],
    ],
    
    [
    'label'=> 'Data User',
    'items'=> [
        ['label' => 'User', 'url' => ['/user/index']],
        ['label' => 'Kontak User', 'url' => ['/kontak/index']],
        ],
    ],
        
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

        <p class="pull-right"> create by  : Fadil & Kindi </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

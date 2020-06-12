<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="image/logo1.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>ADMIN</p>
            </div>
        </div>

        <!-- search form -->
        <!--form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],

[
    'label' => 'Info Paket',
    'items' => [
        ['label' => 'Rekreasi', 'url' => ['/rekreasi/index']],
        ['label' => 'Paket Tambahan', 'url' => ['/paket-tambahan/index']],
        ],
    ],

[
    'label'=> 'Laporan Pemesanan',
    'items'=> [
        ['label' => 'Pemesanan Rekreasi', 'url' => ['/pemesanan-rekreasi/index']],
        ['label' => 'Pemesanan Paket', 'url' => ['/pemesanan-paket/index']],
        ],
    ],
        ['label' => 'Data User', 'url' => ['/user/index']],
      
  [
        'label'=> 'Bukti Transaksi',
        'items'=> [
        ['label' => 'Transaksi Rekreasi', 'url' => ['/transaksi-rekreasi/index']],
        ['label' => 'Transaksi Paket', 'url' => ['/transaksi-penginapan/index']],
      ],
  ],



                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

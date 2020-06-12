<?php
use yii\helpers\Html;
use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Product */ ?>
<style type="text/css">
    .image-new {
        height: 150px;
        width: 200px;
    }
    .padding-anyar {
        padding-top: 20px;
    }
</style>
<div class="col-lg-4">
<center>
<div class="thumbnail shadow">
    <div class="container-fluid">
    <p>
         <div class="row">
        <h4><?= Html::img(Yii::getAlias('@imageurl')."/penginapan/".$model->foto,['width' => '320px','height'=> '200px'],['class' => 'image-new']) ?></h4>
    </div>
        <h4><b><?= Html::encode($model->nama_paket) ?></b></h4>
        <h6><b><font color"#C71585"><?= Html::encode($model->status) ?></font></b></h6>
        <h6><b><font color"#FF0000"><?= Html::encode(Yii::$app->formatter->asCurrency($model->tarif)) ?></font></b></h6>
        
        <div class="row">
                <p>
                <center>
                    <p><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Lihat Detail Penginapan' , ['view', 'id' => $model->kd_paket_tambahan], ['class' => 'btn btn-primary']);?></p>
                </center>
                </p>
        </div>
    </p>
    </div>
    </div>
    </center>
</div>
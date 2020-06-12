<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cradit".
 *
 * @property integer $id_pembayaran
 * @property string $no_kartu
 * @property string $nama_pemilik
 * @property string $tanggal_valid
 * @property integer $cvv
 * @property string $nominal
 * @property string $keterangan
 *
 * @property Nasabah $namaPemilik
 * @property Nasabah $cvv0
 * @property Nasabah $tanggalVal
 * @property Nasabah $noKartu
 * @property Pemesanan $keterangan0
 */
class Cradit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cradit';
    }
     public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_kartu', 'nama_pemilik', 'tanggal_valid', 'cvv', 'nominal', 'keterangan', 'kd_paket_tambahan'], 'required'],
            [['no_kartu', 'cvv', 'nominal', 'keterangan', 'kd_paket_tambahan'], 'integer'],
            [['tanggal_valid'], 'safe'],
            [['nama_pemilik'], 'string', 'max' => 500],
            [['nama_pemilik'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::className(), 'targetAttribute' => ['nama_pemilik' => 'nama']],
            [['cvv'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::className(), 'targetAttribute' => ['cvv' => 'cvv']],
            [['tanggal_valid'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::className(), 'targetAttribute' => ['tanggal_valid' => 'tanggal_valid']],
            [['no_kartu'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::className(), 'targetAttribute' => ['no_kartu' => 'no_kartu']],
            [['keterangan'], 'exist', 'skipOnError' => true, 'targetClass' => Pemesanan::className(), 'targetAttribute' => ['keterangan' => 'id_pemesan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran' => 'Id Pembayaran',
            'no_kartu' => 'No Kartu',
            'nama_pemilik' => 'Nama Pemilik',
            'tanggal_valid' => 'Tanggal Valid',
            'cvv' => 'Cvv',
            'nominal' => 'Nominal',
            'keterangan' => 'Keterangan',
            'kd_paket_tambahan' => 'kode paket tambahan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamaPemilik()
    {
        return $this->hasOne(Nasabah::className(), ['nama' => 'nama_pemilik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCvv0()
    {
        return $this->hasOne(Nasabah::className(), ['cvv' => 'cvv']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTanggalVal()
    {
        return $this->hasOne(Nasabah::className(), ['tanggal_valid' => 'tanggal_valid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoKartu()
    {
        return $this->hasOne(Nasabah::className(), ['no_kartu' => 'no_kartu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeterangan0()
    {
        return $this->hasOne(Pemesanan::className(), ['id_pemesan' => 'keterangan']);
    }
}

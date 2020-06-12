<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "paket_tambahan".
 *
 * @property integer $kd_paket_tambahan
 * @property string $kode_paket
 * @property string $nama_paket
 * @property integer $tarif
 * @property string $status
 * @property string $keterangan
 *
 * @property PemesananPaket[] $pemesananPakets
 */
class PaketTambahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paket_tambahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_paket', 'nama_paket', 'tarif', 'status', 'keterangan', 'foto'], 'required'],
            [['tarif'], 'integer'],
            [['keterangan'], 'string'],
            [['kode_paket'], 'string', 'max' => 30],
            [['nama_paket'], 'string', 'max' => 40],
            [['status'], 'string', 'max' => 20],
             ['foto', 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 512000, 'tooBig' => 'batas 500KB'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_paket_tambahan' => 'Kd Paket Tambahan',
            'kode_paket' => 'Kode Paket',
            'nama_paket' => 'Nama Paket',
            'tarif' => 'Tarif',
            'status' => 'Status',
            'keterangan' => 'Keterangan',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesananPakets()
    {
        return $this->hasMany(PemesananPaket::className(), ['kd_paket_tambahan' => 'kd_paket_tambahan']);
    }
}

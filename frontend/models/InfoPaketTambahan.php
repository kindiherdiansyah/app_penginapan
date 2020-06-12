<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "paket_tambahan".
 *
 * @property int $kd_paket_tambahan
 * @property string $kode_paket
 * @property string $nama_paket
 * @property int $tarif
 * @property string $status
 * @property string $keterangan
 * @property string $foto
 *
 * @property Pemesanan[] $pemesanans
 */
class InfoPaketTambahan extends \yii\db\ActiveRecord
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
            [['foto'], 'string', 'max' => 255],
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
    public function getPemesanans()
    {
        return $this->hasMany(Pemesanan::className(), ['kd_paket_tambahan' => 'kd_paket_tambahan']);
    }
}

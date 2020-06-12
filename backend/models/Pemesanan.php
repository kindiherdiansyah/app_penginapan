<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemesanan".
 *
 * @property string $id_pemesan
 * @property string $nama_pemesan
 * @property string $alamat_pemesan
 * @property string $email_pemasan
 * @property string $notel
 * @property string $status
 * @property integer $kd_paket_tambahan
 * @property string $checkin
 * @property string $checkout
 * @property integer $lama_inap
 *
 * @property Cradit[] $cradits
 * @property PaketTambahan $kdPaketTambahan
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemesanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pemesan', 'nama_pemesan', 'alamat_pemesan', 'email_pemasan', 'notel', 'kd_paket_tambahan','tanggal_pesan', 'checkin', 'checkout', 'lama_inap'], 'required'],
            [['id_pemesan', 'kd_paket_tambahan', 'lama_inap'], 'integer'],
            [['tanggal_pesan', 'checkin', 'checkout'], 'safe'],
            [['nama_pemesan'], 'string', 'max' => 255],
            [['alamat_pemesan', 'email_pemasan'], 'string', 'max' => 500],
            [['notel'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 100],
            [['kd_paket_tambahan'], 'exist', 'skipOnError' => true, 'targetClass' => PaketTambahan::className(), 'targetAttribute' => ['kd_paket_tambahan' => 'kd_paket_tambahan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pemesan' => 'Id Pemesan',
            'nama_pemesan' => 'Nama Pemesan',
            'alamat_pemesan' => 'Alamat Pemesan',
            'email_pemasan' => 'Email Pemasan',
            'notel' => 'Notel',
            'status' => 'Status',
            'kd_paket_tambahan' => 'Kd Paket Tambahan',
            'tanggal_pesan' => 'Tanggal Pesan',
            'checkin' => 'Checkin',
            'checkout' => 'Checkout',
            'lama_inap' => 'Lama Inap',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCradits()
    {
        return $this->hasMany(Cradit::className(), ['id_pemesan' => 'id_pemesan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdPaketTambahan()
    {
        return $this->hasOne(PaketTambahan::className(), ['kd_paket_tambahan' => 'kd_paket_tambahan']);
    }
}

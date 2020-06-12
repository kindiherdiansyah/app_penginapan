<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nasabah".
 *
 * @property string $no_rekening
 * @property string $no_kartu
 * @property string $tanggal_valid
 * @property string $nama
 * @property integer $cvv
 * @property integer $saldo
 * @property string $status_kartu
 * @property integer $bank_id
 *
 * @property Cradit[] $cradits
 * @property Cradit[] $cradits0
 * @property Transfer[] $transfers
 */
class Nasabah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nasabah';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
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
            [['no_rekening', 'no_kartu', 'tanggal_valid', 'nama', 'cvv', 'saldo', 'bank_id'], 'required'],
            [['no_rekening', 'no_kartu', 'cvv', 'saldo', 'bank_id'], 'integer'],
            [['tanggal_valid'], 'safe'],
            [['nama'], 'string', 'max' => 500],
            [['status_kartu'], 'string', 'max' => 20],
            [['no_kartu'], 'unique'],
            [['tanggal_valid'], 'unique'],
            [['cvv'], 'unique'],
            [['nama'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no_rekening' => 'No Rekening',
            'no_kartu' => 'No Kartu',
            'tanggal_valid' => 'Tanggal Valid',
            'nama' => 'Nama',
            'cvv' => 'Cvv',
            'saldo' => 'Saldo',
            'status_kartu' => 'Status Kartu',
            'bank_id' => 'Bank ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCradits()
    {
        return $this->hasMany(Cradit::className(), ['cvv' => 'cvv']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCradits0()
    {
        return $this->hasMany(Cradit::className(), ['no_kartu' => 'no_kartu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['no_rekening' => 'no_rekening']);
    }
}

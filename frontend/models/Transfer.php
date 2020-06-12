<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transfer".
 *
 * @property integer $id_pembayaran
 * @property string $no_rekening
 * @property string $no_rekening_tujuan
 * @property integer $nominal
 * @property string $keterangan
 *
 * @property Nasabah $noRekening
 */
class Transfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfer';
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
            [['no_rekening', 'no_rekening_tujuan', 'nominal', 'keterangan'], 'required'],
            [['no_rekening', 'no_rekening_tujuan', 'nominal'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
            [['no_rekening'], 'exist', 'skipOnError' => true, 'targetClass' => Nasabah::className(), 'targetAttribute' => ['no_rekening' => 'no_rekening']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pembayaran' => 'Id Pembayaran',
            'no_rekening' => 'No Rekening',
            'no_rekening_tujuan' => 'No Rekening Tujuan',
            'nominal' => 'Nominal',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoRekening()
    {
        return $this->hasOne(Nasabah::className(), ['no_rekening' => 'no_rekening']);
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kontak".
 *
 * @property int $id_kontak
 * @property string $nama
 * @property string $email
 * @property string $keterangan
 */
class HubungiKami extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kontak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['nama', 'email'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kontak' => 'Id Kontak',
            'nama' => 'Nama',
            'email' => 'Email',
            'keterangan' => 'Keterangan',
        ];
    }
}

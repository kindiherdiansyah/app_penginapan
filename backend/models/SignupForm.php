<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nama_pengunjung;
    public $jenis_identitas;
    public $no_identitas;
    public $telp;
    public $alamat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['nama_pengunjung', 'required'], 
            ['jenis_rekening', 'required'], 
            ['no_rekening', 'required'],
            ['telp', 'required'],
            ['alamat', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->nama_pengunjung = $this->nama_pengunjung;
        $user->jenis_rekening = $this->jenis_rekening;
        $user->no_rekening = $this->no_rekening;
        $user->telp = $this->telp;
        $user->alamat = $this->alamat;
        
        return $user->save() ? $user : null;
    }
}

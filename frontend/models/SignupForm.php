<?php
namespace frontend\models;

use common\models\Users;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $passwordRepeat;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'email', 'password', 'passwordRepeat'], 'trim'],
            [['username', 'email', 'password', 'passwordRepeat'], 'required'],

            ['username', 'string', 'min' => 3, 'max' => 36],

            ['email', 'email'],
            ['email', 'string', 'min' => 3, 'max' => 128],
            ['email', 'unique', 'targetClass' => '\common\models\Users', 'message' => 'This email address has already been taken.'],

            [['password', 'passwordRepeat'], 'string', 'min' => 6, 'max' => 30],

            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'operator' => '==='],

            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return Users|null the saved model or null if saving fails
     */
    public function signup() {
        if ($this->validate()) {
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}

<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Users;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $verifyCode;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required', 'message' => '请填写邮箱'],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['email', 'validateUser'],

            ['password', 'trim'],
            ['password', 'required', 'message' => '请填写密码'],
            ['password', 'validatePassword'],

            ['verifyCode', 'captcha', 'message' => '验证码不正确'],

            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * 检查用户是否存在
     * @param string $attribute
     * @param array $params
     */
    public function validateUser($attribute, $params) {
        if (!$this->hasErrors()) {
            if ($this->getUser() === null) {
                $this->addError($attribute, '账户不存在');
            }
        }
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user->validatePassword($this->password)) {
                $this->addError($attribute, '密码不正确');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return Users|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findByEmail($this->email);
        }

        return $this->_user;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => '邮箱',
            'password' => '密码',
            'rememberMe' => '自动登录',
            'verifyCode' => '验证码',
        ];
    }
}

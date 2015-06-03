<?php
/**
 * Created by PhpStorm.
 * User: RockyLiang
 * Date: 15/6/2
 * Time: 17:26
 */
namespace backend\models;

use yii\base\Model;

class ResetPasswdForm extends Model {

    public $email;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['email', 'trim'],
            ['email', 'required', 'message' => '请填写邮箱'],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['verifyCode', 'captcha', 'message' => '验证码错误'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'email' => '邮箱',
            'verifyCode' => '验证码',
        ];
    }

}
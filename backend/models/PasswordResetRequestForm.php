<?php
/**
 * Created by PhpStorm.
 * User: RockyLiang
 * Date: 15/6/2
 * Time: 17:26
 */
namespace backend\models;

use common\models\Users;
use yii\base\Model;

class PasswordResetRequestForm extends Model {

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
            ['email', 'exist',
                'targetClass' => '\common\models\Users',
                'filter' => ['status' => Users::STATUS_ACTIVE],
                'message' => '账户不存在',
            ],

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

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user Users */
        $user = Users::findOne([
            'status' => Users::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!Users::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
                    ->setTo($this->email)
                    ->setSubject(\Yii::$app->name . '-密码重置邮件')
                    ->send();
            }
        }

        return false;
    }

}
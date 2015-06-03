<?php
/**
 * Created by PhpStorm.
 * User: RockyLiang
 * Date: 15/6/2
 * Time: 17:08
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model backend\models\ResetPasswdForm */

$this->title = '忘记密码';
?>

<div class="pwd-reset well center-block" style="width: 500px;">
    <div>
        <?= Html::a('返回首页', ['site/index']) ?>
    </div>
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'reset-pwd-form']); ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
                'imageOptions' => ['alt' => '点击换图','title' => '点击换图', 'style' => 'cursor:pointer'],
            ]) ?>
            <div class="form-group">
                <?= Html::submitButton('发送邮件', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
            </div>
            <?php $form->end(); ?>
        </div>
    </div>
</div>
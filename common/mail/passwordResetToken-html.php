<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>您好，尊敬的 <span style="text-decoration: underline;"><?= Html::encode($user->username) ?></span>,</p>

    <p>请点击下面的链接重置密码：</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>

    <p>注意：如果你没有发起过重置密码请求，请忽略此邮件。</p>
</div>

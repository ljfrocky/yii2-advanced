<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
你好，尊敬的 <?= $user->username ?>,

请点击下面的链接重置密码：

<?= $resetLink ?>

注意：如果你没有发起过重置密码请求，请忽略此邮件。
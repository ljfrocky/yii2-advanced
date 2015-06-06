<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Archives;
use common\models\Categories;
use ijackua\lepture\Markdowneditor;
use ijackua\lepture\MarkdowneditorAssets;

/* @var $this yii\web\View */
/* @var $model common\models\Archives */
/* @var $form yii\widgets\ActiveForm */

MarkdowneditorAssets::register($this);
?>

<div class="archives-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 1024]) ?>

    <?= $form->field($model, 'cateId')->dropDownList(Categories::getDropDownList()) ?>

    <?= $form->field($model, 'type')->dropDownList(Archives::$typeList) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->radioList(Archives::$statusList) ?>

    <?= Markdowneditor::widget(['model' => $model, 'attribute' => 'body']) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => 1024]) ?>

    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

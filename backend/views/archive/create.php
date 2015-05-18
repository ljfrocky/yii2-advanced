<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Archives */

$this->title = 'Create Archives';
$this->params['breadcrumbs'][] = ['label' => 'Archives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archives-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

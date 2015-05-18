<?php
/**
 * Created by PhpStorm.
 * User: RockyLiang
 * Date: 15/5/18
 * Time: 15:44
 */

namespace backend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class ArchiveController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
    }

}
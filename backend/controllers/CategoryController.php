<?php
/**
 * Created by PhpStorm.
 * User: RockyLiang
 * Date: 15/5/18
 * Time: 15:37
 */
namespace backend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class CategoryController extends Controller
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
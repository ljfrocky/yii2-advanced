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

    /**
     * 创建新栏目
     */
    public function actionCreate() {}

    /**
     * 修改栏目信息
     * @param int $id 栏目id
     */
    public function actionUpdate($id) {}

    /**
     * 删除栏目
     * @param int $id 栏目id
     */
    public function actionDelete($id) {}

}
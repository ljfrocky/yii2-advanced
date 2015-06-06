<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog_categories".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Archives[] $archives
 */
class Categories extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '栏目编号',
            'name' => '栏目名称',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchives()
    {
        return $this->hasMany(Archives::className(), ['cate_id' => 'id']);
    }

    public static function getDropDownList()
    {
        $list = static::find()->asArray()->all();
        return ArrayHelper::map($list, 'id', 'name');
    }
}

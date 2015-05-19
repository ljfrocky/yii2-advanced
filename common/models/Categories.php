<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog_categories".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Archives[] $archives
 */
class Categories extends \yii\db\ActiveRecord
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
}

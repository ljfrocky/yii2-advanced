<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blog_archives".
 *
 * @property integer $id
 * @property string $author
 * @property integer $type
 * @property string $content
 * @property integer $time
 * @property integer $views
 * @property integer $cate_id
 * @property string $tags
 * @property integer $status
 * @property string $title
 *
 * @property Categories $cate
 * @property Comments[] $comments
 */
class Archives extends ActiveRecord
{

    public static $typeList = [
        '0' => '原创',
        '1' => '转载',
    ];

    public static $statusList = [
        '0' => '显示',
        '1' => '隐藏',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_archives';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'content', 'tags'], 'trim'],
            [['author', 'content', 'cate_id', 'title', 'type', 'status'], 'required'],
            [['type', 'time', 'views', 'cate_id', 'status'], 'integer'],
            ['status', 'in', 'range' => [0, 1]],
            ['type', 'in', 'range' => [0, 1]],
            [['content'], 'string'],
            [['author'], 'string', 'max' => 255],
            [['tags', 'title'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '文章编号',
            'author' => '作者',
            'type' => '文章类型',
            'content' => '正文',
            'time' => '发布时间',
            'views' => '阅读数',
            'cate_id' => '所属栏目',
            'tags' => '标签',
            'status' => '状态',
            'title' => '标题',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['archive_id' => 'id']);
    }
}

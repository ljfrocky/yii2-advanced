<?php

namespace common\models;

use Yii;

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
class Archives extends \yii\db\ActiveRecord
{
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
            [['author', 'content', 'cate_id', 'title'], 'required'],
            [['type', 'time', 'views', 'cate_id', 'status'], 'integer'],
            [['content'], 'string'],
            [['author'], 'string', 'max' => 255],
            [['tags', 'title'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Author',
            'type' => 'Type',
            'content' => 'Content',
            'time' => 'Time',
            'views' => 'Views',
            'cate_id' => 'Cate ID',
            'tags' => 'Tags',
            'status' => 'Status',
            'title' => 'Title',
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

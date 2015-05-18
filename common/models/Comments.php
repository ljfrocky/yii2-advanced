<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog_comments".
 *
 * @property integer $id
 * @property string $nickname
 * @property integer $reply_id
 * @property string $content
 * @property integer $time
 * @property string $email
 * @property integer $archive_id
 *
 * @property Archives $archive
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nickname', 'content', 'archive_id'], 'required'],
            [['reply_id', 'time', 'archive_id'], 'integer'],
            [['nickname'], 'string', 'max' => 128],
            [['content'], 'string', 'max' => 2048],
            [['email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'reply_id' => 'Reply ID',
            'content' => 'Content',
            'time' => 'Time',
            'email' => 'Email',
            'archive_id' => 'Archive ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchive()
    {
        return $this->hasOne(Archives::className(), ['id' => 'archive_id']);
    }
}

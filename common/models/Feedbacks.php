<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog_feedbacks".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $time
 * @property string $email
 */
class Feedbacks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_feedbacks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['time'], 'integer'],
            [['title'], 'string', 'max' => 512],
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
            'title' => 'Title',
            'content' => 'Content',
            'time' => 'Time',
            'email' => 'Email',
        ];
    }
}

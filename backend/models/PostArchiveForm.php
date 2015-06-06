<?php
/**
 * Created by PhpStorm.
 * User: RockyLiang
 * Date: 15/6/5
 * Time: 15:15
 */

namespace backend\models;

use common\models\Archives;
use yii\base\Model;

class PostArchiveForm extends Model
{
    /* 标题 */
    public $title;
    /* 所属栏目id */
    public $cateId;
    /* 文章类型 */
    public $type;
    /* 作者 */
    public $author;
    /* 标签 */
    public $tags;
    /* 状态 */
    public $status = 0;
    /* 正文 */
    public $body;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => '标题',
            'cateId' => '所属栏目',
            'type' => '文章类型',
            'author' => '作者',
            'tags' => '标签',
            'status' => '状态',
            'body' => '正文',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'labels', 'body'], 'trim'],

            ['title', 'required', 'message' => '请填写标题'],
            ['title', 'string', 'max' => 512, 'tooLong' => '标题太长了'],

            ['cateId', 'required', 'message' => '请选择栏目'],
            ['cateId', 'exist',
                'targetClass' => '\common\models\Categories',
                'message' => '所选栏目不存在',
            ],

            ['type', 'required', 'message' => '请选择文章类型'],
            ['type', 'in', 'range' => array_keys(Archives::$typeList), 'message' => '非法的文章类型'],

            ['author', 'required', 'message' => '请填写作者名称'],
            ['author', 'string', 'max' => 255, 'message' => '作者名称太长了'],

            ['labels', 'string', 'max' => 255, 'message' => '太多关键字了'],

            ['status', 'required', 'message' => '请选择状态'],
            ['status', 'in', 'range' => array_keys(Archives::$statusList), 'message' => '非法的状态值'],

            ['body', 'required', 'message' => '请填写正文内容'],
            ['body', 'string'],

        ];
    }

    /**
     * 创建一篇新文章，创建成功返回新对象，否则返回null
     * @return Archives|null
     */
    public function create()
    {
        if ($this->validate()) {
            $archive = new Archives();
            $archive->title = $this->title;
            $archive->author = $this->author;
            $archive->cate_id = $this->cateId;
            $archive->status = $this->status;
            $archive->type = $this->type;
            $archive->time = time();
            $archive->tags = $this->tags;
            $archive->content = $this->body;
            if ($archive->save()) {
                return $archive;
            }
        }

        return null;
    }

}
<?php

namespace app\modules\blog\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\BaseStringHelper;
/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $img
 */
class Post extends \yii\db\ActiveRecord
{
    public $image;
    public $filename;
    public $string;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'text'], 'required'],
            [['description', 'text','title'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'text' => 'Text',
            'img' => 'Img',
        ];
    }
    public function beforeSave($insert)
    {
       // $post = new Post;
        if ($this->isNewRecord) {
            $this->string  = substr(uniqid('img'),0,12);
            $this->image = UploadedFile::getInstance($this,'img');
            $this->filename = 'static/images/' . $this->string . '.' . $this->image->extension;
            $this->image->saveAs($this->filename);

            //save
            $this->img = '/' . $this->filename;
        }else{
            $this->image = UploadedFile::getInstance($this, 'img');
            if($this->image){
                $this->image->saveAs(substr($this->img, 1));
            }
        }

        return parent::beforeSave($insert);
    }
}


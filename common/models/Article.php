<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id
 * @property string $category_id
 * @property string $type
 * @property string $title
 * @property string $sub_title
 * @property string $summary
 * @property string $thumb
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $status
 * @property string $sort
 * @property string $user_id
 * @property string $scan_count
 * @property integer $can_comment
 * @property integer $visibility
 * @property string $tag
 * @property integer $flag_headline
 * @property integer $flag_recommend
 * @property integer $flag_slide_show
 * @property integer $flag_special_recommend
 * @property integer $flag_roll
 * @property integer $flag_bold
 * @property integer $flag_picture
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ArticleContent[] $articleContents
 */
class Article extends \common\components\BaseModel
{

    public $content = '';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['id', 'category_id', 'type', 'status', 'sort', 'user_id', 'scan_count', 'can_comment', 'visibility', 'flag_headline', 'flag_recommend', 'flag_slide_show', 'flag_special_recommend', 'flag_roll', 'flag_bold', 'flag_picture', 'created_at', 'updated_at'], 'integer'],
            [['title', 'sub_title', 'summary', 'thumb', 'seo_title', 'seo_keywords', 'seo_description', 'tag'], 'string', 'max' => 255],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category Id'),
            'type' => Yii::t('app', 'Type'),
            'title' => Yii::t('app', 'Title'),
            'sub_title' => Yii::t('app', 'Sub Title'),
            'summary' => Yii::t('app', 'Summary'),
            'thumb' => Yii::t('app', 'Thumb'),
            'content' => Yii::t('app', 'Content'),
            'seo_title' => Yii::t('app', 'Seo Title'),
            'seo_keywords' => Yii::t('app', 'Seo Keywords'),
            'seo_description' => Yii::t('app', 'Seo Description'),
            'status' => Yii::t('app', 'Status'),
            'sort' => Yii::t('app', 'Sort'),
            'user_id' => Yii::t('app', 'User ID'),
            'scan_count' => Yii::t('app', 'Scan Count'),
            'can_comment' => Yii::t('app', 'Can Comment'),
            'visibility' => Yii::t('app', 'Visibility'),
            'tag' => Yii::t('app', 'Tag'),
            'flag_headline' => Yii::t('app', 'Is Headline'),
            'flag_recommend' => Yii::t('app', 'Is Recommend'),
            'flag_slide_show' => Yii::t('app', 'Is Slide Show'),
            'flag_special_recommend' => Yii::t('app', 'Is Special Recommend'),
            'flag_roll' => Yii::t('app', 'Is Roll'),
            'flag_bold' => Yii::t('app', 'Is Bold'),
            'flag_picture' => Yii::t('app', 'Is Picture'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleContents()
    {
        return $this->hasMany(ArticleContent::className(), ['article_id' => 'id']);
    }
}
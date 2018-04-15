<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $route
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class AdminLog extends \common\components\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['route'], 'string', 'max' => 255],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function afterFind()
    {
        $this->description = str_replace([
            '{{%ADMIN_USER%}}',
            '{{%BY%}}',
            '{{%CREATED%}}',
            '{{%UPDATED%}}',
            '{{%DELETED%}}',
            '{{%ID%}}',
            '{{%RECORD%}}'            
        ], [
            yii::t('app', 'Admin user'),
            yii::t('app', 'through'),
            yii::t('app', 'created'),
            yii::t('app', 'updated'),
            yii::t('app', 'deleted'),
            yii::t('app', 'id'),
            yii::t('app', 'record')
        ], $this->description);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => Yii::t('app', 'Route'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'user_id' => Yii::t('app', 'User'),
        ];
    }
}

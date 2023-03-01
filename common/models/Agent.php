<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yeesoft\models\User;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "agent".
 *
 * @property int $id
 * @property string $address
 * @property string $name
 * @property string $address2
 * @property string $description
 * @property string $img
 * @property string $img2
 * @property string $img3
 * @property int $status 0-pending,1-published
 * @property string $language
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Agent extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 0;
    const STATUS_PUBLISHED = 1;

    const LANGUAGE_ZH = 'zh';
    const LANGUAGE_ID = 'id';
    const LANGUAGE_EN = 'en';

    public function init()
    {
        parent::init();

        if ($this->isNewRecord && $this->className() == Agent::className()) {
            $this->language = self::LANGUAGE_ZH;
            do{
                $slug = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            }while(self::find()->where(['slug' => $slug ])->one());
            $this->slug = $slug;
        }

    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['description'], 'string'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['address', 'img', 'img2', 'img3','img4', 'slug','address2','address3','nickname'], 'string', 'max' => 255],
            [['name', 'address2'], 'string', 'max' => 127],
            [['language'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'address' => '地址',
            'name' => '機構名稱',
            'nickname' => '列表機構名稱',
            'address2' => '機構位置',
            'address3' => '列表機構區域',
            'description' => '機構特色',
            'img' => '圖１',
            'img2' => '圖２',
            'img3' => '圖３',
            'img4' => '列表縮圖',
            'status' => 'Status',
            'language' => 'Language',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    /**
     * getTypeList
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_PENDING => Yii::t('yee', 'Pending'),
            self::STATUS_PUBLISHED => Yii::t('yee', 'Published'),
        ];
    }

    /**
     * getStatusOptionsList
     * @return array
     */
    public static function getStatusOptionsList()
    {
        return [
            [self::STATUS_PENDING, Yii::t('yee', 'Pending'), 'default'],
            [self::STATUS_PUBLISHED, Yii::t('yee', 'Published'), 'primary']
        ];
    }
    public static function getLanguageOptionsList()
    {
        return [
            [self::LANGUAGE_ZH, Yii::t('yee', 'Chinese'), 'default'],
            [self::LANGUAGE_ID, Yii::t('yee', 'Bahasa Indonesia'), 'primary'],
            [self::LANGUAGE_EN, Yii::t('yee', 'English'), 'warning']
        ];
    }

    /**
     * getCommentStatusList
     * @return array
     */
    public static function getLanguageStatusList()
    {
        return [
            self::LANGUAGE_ZH => Yii::t('yee', 'Chinese'),
            self::LANGUAGE_ID => Yii::t('yee', 'Bahasa Indonesia'),
            self::LANGUAGE_EN => Yii::t('yee', 'English')
        ];
    }
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    public function getPublishedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->published_at);
    }

    public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getPublishedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->published_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getPublishedDatetime()
    {
        return "{$this->publishedDate} {$this->publishedTime}";
    }

    public function getCreatedDatetime()
    {
        return "{$this->createdDate} {$this->createdTime}";
    }

    public function getUpdatedDatetime()
    {
        return "{$this->updatedDate} {$this->updatedTime}";
    }

    public function getStatusText()
    {
        return $this->getStatusList()[$this->status];
    }

    public static function getAgentsList()
    {
        $agents = static::find()->select(['id', 'name'])->asArray()->all();
        return ArrayHelper::map($agents, 'id', 'name');
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        Yii::$app->frontendCache->delete('agent_agents'); //type 內全部的agent全清除

    }
    public function afterDelete()
     {
         parent::afterDelete();
         Yii::$app->frontendCache->delete('agent_agents'); //type 內全部的agent全清除
     }
}

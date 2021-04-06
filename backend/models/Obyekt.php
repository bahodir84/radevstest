<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obyekt".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property string|null $task_ids
 * @property string|null $image
 *
 * @property Obyekt $parent
 * @property Obyekt[] $obyekts
 */
class Obyekt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obyekt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['name', 'image'], 'string', 'max' => 50],
            [['task_ids'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Obyekt::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'task_ids' => 'Task Ids',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Obyekt::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Obyekts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObyekts()
    {
        return $this->hasMany(Obyekt::className(), ['parent_id' => 'id']);
    }
}

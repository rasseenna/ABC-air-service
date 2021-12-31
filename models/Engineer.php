<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "engineer".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $component
 *
 * @property Maintenance[] $maintenances
 */
class Engineer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'engineer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'component'], 'required'],
            [['name', 'type', 'component'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Engineer Name',
            'type' => 'Type',
            'component' => 'Component',
        ];
    }

    /**
     * Gets query for [[Maintenances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenances()
    {
        return $this->hasMany(Maintenance::className(), ['engineer' => 'id']);
    }
}

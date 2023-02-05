<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $street
 * @property int $house_num
 * @property int $flat_num
 * @property int $user_id
 *
 * @property User $id0
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['street', 'house_num', 'flat_num', 'user_id'], 'required'],
            [['house_num', 'flat_num', 'user_id'], 'integer'],
            [['street'], 'string', 'max' => 35],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id' => 'city_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'street' => 'Улица',
            'house_num' => 'Номер дома',
            'flat_num' => 'Номер квартиры',
            'user_id' => 'ID пользователя',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::class, ['city_id' => 'id']);
    }
}

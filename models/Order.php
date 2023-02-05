<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $total
 * @property int $discount
 * @property int $card_id
 * @property string $created_at
 *
 * @property Card $card
 * @property OrderList $id0
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total', 'discount', 'card_id', 'created_at'], 'required'],
            [['total', 'discount', 'card_id'], 'integer'],
            [['created_at'], 'safe'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderList::class, 'targetAttribute' => ['id' => 'order_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total' => 'Итог',
            'discount' => 'Скидка',
            'card_id' => 'ID карты',
            'created_at' => 'Создано',
        ];
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Card::class, ['id' => 'card_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(OrderList::class, ['order_id' => 'id']);
    }
}

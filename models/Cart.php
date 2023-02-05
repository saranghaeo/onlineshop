<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $quantity
 * @property int $product_list_id
 *
 * @property User $id0
 * @property ProductList $productList
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'product_list_id'], 'required'],
            [['quantity', 'product_list_id'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id' => 'cart_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity' => 'Количество',
            'product_list_id' => 'ID продуктов',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::class, ['cart_id' => 'id']);
    }

    /**
     * Gets query for [[ProductList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductList()
    {
        return $this->hasOne(ProductList::class, ['id' => 'product_list_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property int $phone
 * @property int $city_id
 * @property int $currency_id
 * @property string $sex
 * @property string $photo_url
 * @property string $first_name
 * @property string $last_name
 * @property int $cart_id
 * @property int $favourite_id
 * @property int $order_list_id
 * @property string $data_of_birth
 *
 * @property Cart $cart
 * @property City $city
 * @property Currency $currency
 * @property Favourite $favourite
 * @property Card $id0
 * @property ManagerList[] $managerLists
 * @property OrderList $orderList
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email', 'phone', 'city_id', 'currency_id', 'sex', 'photo_url', 'first_name', 'last_name', 'cart_id', 'favourite_id', 'order_list_id', 'data_of_birth'], 'required'],
            [['phone', 'city_id', 'currency_id', 'cart_id', 'favourite_id', 'order_list_id'], 'integer'],
            [['sex'], 'string'],
            [['data_of_birth'], 'safe'],
            [['login'], 'string', 'max' => 10],
            [['password', 'email', 'first_name', 'last_name'], 'string', 'max' => 15],
            [['photo_url'], 'string', 'max' => 500],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Card::class, 'targetAttribute' => ['id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Электроная почта',
            'phone' => 'Номер телефона',
            'city_id' => 'ID города',
            'currency_id' => 'ID валюты',
            'sex' => 'Пол',
            'photo_url' => 'ссылка на фотографию',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'cart_id' => 'ID корзины',
            'favourite_id' => 'ID избранное',
            'order_list_id' => 'ID списка заказов',
            'data_of_birth' => 'дата дня рождения',
        ];
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['id' => 'cart_id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }

    /**
     * Gets query for [[Favourite]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourite()
    {
        return $this->hasOne(Favourite::class, ['id' => 'favourite_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Card::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[ManagerLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManagerLists()
    {
        return $this->hasMany(ManagerList::class, ['manager_id' => 'id']);
    }

    /**
     * Gets query for [[OrderList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderList()
    {
        return $this->hasOne(OrderList::class, ['id' => 'order_list_id']);
    }
}

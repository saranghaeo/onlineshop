<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $characteristics
 * @property int $company_id
 * @property int $rating
 * @property int $category_id
 * @property int $price
 * @property int $is_discounted
 * @property int $discount
 * @property int $new_price
 * @property string $create_at
 * @property string $modificated_at
 * @property int $created_by
 *
 * @property Category $category
 * @property Company $company
 * @property Review $id0
 * @property ProductList[] $productLists
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'characteristics', 'company_id', 'rating', 'category_id', 'price', 'is_discounted', 'discount', 'new_price', 'create_at', 'modificated_at', 'created_by'], 'required'],
            [['company_id', 'rating', 'category_id', 'price', 'is_discounted', 'discount', 'new_price', 'created_by'], 'integer'],
            [['create_at', 'modificated_at'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['description', 'characteristics'], 'string', 'max' => 500],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Review::class, 'targetAttribute' => ['id' => 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'characteristics' => 'Характеристики',
            'company_id' => 'ID компании',
            'rating' => 'Рейтинг',
            'category_id' => 'ID категории',
            'price' => 'Цена',
            'is_discounted' => 'Есть скидка',
            'discount' => 'Скидка',
            'new_price' => 'Новая цена',
            'create_at' => 'Создано',
            'modificated_at' => 'Изменено',
            'created_by' => 'Создал',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Review::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductLists()
    {
        return $this->hasMany(ProductList::class, ['product_id' => 'id']);
    }
}

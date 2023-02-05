<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $photo_url
 * @property int $inn
 * @property string $created_at
 * @property string $modificated_at
 * @property int $created_by
 * @property int $product_list_id
 * @property int $manager_list_id
 *
 * @property Product $id0
 * @property ManagerList $managerList
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'photo_url', 'inn', 'created_at', 'modificated_at', 'created_by', 'product_list_id', 'manager_list_id'], 'required'],
            [['inn', 'created_by', 'product_list_id', 'manager_list_id'], 'integer'],
            [['created_at', 'modificated_at'], 'safe'],
            [['name'], 'string', 'max' => 25],
            [['photo_url'], 'string', 'max' => 500],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id' => 'company_id']],
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
            'photo_url' => 'Ссылка на фотографию',
            'inn' => 'Инн',
            'created_at' => 'Создано',
            'modificated_at' => 'Изменено',
            'created_by' => 'Создал',
            'product_list_id' => 'ID продуктов',
            'manager_list_id' => 'ID менеджеров'
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Product::class, ['company_id' => 'id']);
    }

    /**
     * Gets query for [[ManagerList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManagerList()
    {
        return $this->hasOne(ManagerList::class, ['id' => 'manager_list_id']);
    }
}

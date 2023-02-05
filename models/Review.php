<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $advantage
 * @property string $disadvantage
 * @property string $description
 * @property int $likes
 * @property int $dislikes
 * @property string $created_at
 * @property string $modificated_at
 * @property int $created_by
 * @property int $product_id
 * @property string $photo_url
 * @property string $video_url
 *
 * @property Product $product
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advantage', 'disadvantage', 'description', 'likes', 'dislikes', 'created_at', 'modificated_at', 'created_by', 'product_id', 'photo_url', 'video_url'], 'required'],
            [['likes', 'dislikes', 'created_by', 'product_id'], 'integer'],
            [['created_at', 'modificated_at'], 'safe'],
            [['advantage', 'disadvantage', 'description', 'photo_url', 'video_url'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'advantage' => 'Преимущества',
            'disadvantage' => 'Недостатки',
            'description' => 'Описание',
            'likes' => 'Нравится',
            'dislikes' => 'Не нравится',
            'created_at' => 'Создано',
            'modificated_at' => 'Изменино',
            'created_by' => 'Создал',
            'product_id' => 'ID продукта',
            'photo_url' => 'Ссылка на фоторафию',
            'video_url' => 'Ссылка на видео',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}

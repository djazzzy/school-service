<?php

namespace djazzy\admin\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $title
 * @property int $parent_id
 * @property int $price
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'common_id', 'weight', 'price', 'category'], 'required'],
            [['common_id', 'weight', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'common_id' => 'Общее ID',
            'weight' => 'Вес',
            'price' => 'Цена',
            'category' => 'Категория',
            'active' => 'Доступность'
        ];
    }

    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'food_id']);
    }

    public function getCategory(){
        return $this->hasOne(MenuCategory::className(), ['id' => 'category']);
    }
}

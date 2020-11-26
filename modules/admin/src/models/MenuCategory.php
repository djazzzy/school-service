<?php

namespace djazzy\admin\models;

use Yii;

/**
 * This is the model class for table "menu_category".
 *
 * @property int $id
 * @property string $title
 */
class MenuCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название категории',
        ];
    }

    public function getMenu(){
        return $this->hasMany(Menu::className(), ['category' => 'id']);
    }
}

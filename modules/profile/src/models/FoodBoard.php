<?php

namespace djazzy\profile\models;

use Yii;

/**
 * This is the model class for table "food_board".
 *
 * @property int $id
 * @property int $student_id
 * @property int $food_id
 * @property string $date
 */
class FoodBoard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_board';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'food_id', 'count', 'category'], 'required'],
            [['student_id', 'food_id'], 'integer'],
            [['date', 'category', 'snils', 'price'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'food_id' => 'Блюдо',
            'category' => 'Время приема пищи',
            'count' => 'Количество',
            'date' => 'Date',
            'snils' => 'СНИЛС',
        ];
    }



    public function getStudent(){
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }

    public function getMenu(){
        return $this->hasOne(Menu::className(), ['id' => 'food_id']);
    }
}

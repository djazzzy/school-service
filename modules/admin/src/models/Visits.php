<?php

namespace djazzy\admin\models;

use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property int $id
 * @property int $student_id
 * @property string $school
 * @property string $date
 * @property string $event
 */
class Visits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'school', 'event'], 'required'],
            [['student_id'], 'integer'],
            [['date', 'snils'], 'safe'],
            [['school', 'event'], 'string', 'max' => 255],
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
            'school' => 'Школа',
            'date' => 'Date',
            'event' => 'Событие',
        ];
    }

    public static $event = array(
        'Выход'=>'Выход',
        'Вход'=>'Вход',
    );

    public function getStudent(){
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }
}

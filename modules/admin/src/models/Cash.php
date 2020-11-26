<?php

namespace djazzy\admin\models;

use Yii;

/**
 * This is the model class for table "cash".
 *
 * @property int $id
 * @property int $student_id
 * @property int $value
 * @property string $date
 */
class Cash extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cash';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['snils', 'value'], 'required'],
            [['value', 'status'], 'integer'],
            [['date', 'value'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'snils' => 'Снилс',
            'value' => 'Сумма',
            'date' => 'Дата',
            'status' => 'status',
        ];
    }

    public function getStudent(){
        return $this->hasOne(Students::className(), ['login' => 'snils']);
    }
}

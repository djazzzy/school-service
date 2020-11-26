<?php

namespace djazzy\admin\models;

use Yii;

/**
 * This is the model class for table "scholls".
 *
 * @property int $id
 * @property string $title
 * @property string $address
 */
class Schools extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schools';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'address'], 'required'],
            [['title', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'address' => 'Адресс',
        ];
    }
}

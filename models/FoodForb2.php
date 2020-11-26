<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food_forb2".
 *
 * @property int $id
 * @property string $title
 * @property string $snils
 * @property int $forbidden
 */
class FoodForb2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_forb2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'snils'], 'safe'],
//            [['forbidden'], 'integer'],
            [['id'], 'integer'],
//            [['title', 'snils'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'snils' => 'Snils',
        ];
    }

    public function saveForb()
    {
        $login = Yii::$app->user->identity->login;
        $test = FoodForb2::find()->where(['title' => 'Борщ', 'snils' => $login])->all();
        if($this->title){
            foreach ($this->title as $title) {
                $menu = FoodForb2::find()->where(['snils' => $login])->andWhere(['not like', 'title', $title])->all();
                foreach ($menu as $menu1) {
                    $menu1->delete();
                }
            }
        }else{
            $menu = FoodForb2::find()->where(['snils' => $login])->all();
            foreach ($menu as $menu1) {
                $menu1->delete();
            }
        }
        if($this->title){
            foreach ($this->title as $title){
                if(!FoodForb2::find()->where(['snils' => $login])->andWhere(['title' => $title])->one()){
                    $menu = new FoodForb2();
                    $menu->snils = $login;
                    $menu->title = $title;
                    $menu->save(false);
                }
            }
        }

    }
}

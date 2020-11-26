<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\FoodBoard;
use app\models\Menu;

class FoodForm extends Model
{
    public $date;
    public $snils;
    public $name;
    public $price;
    public $quantity;


    public function rules()
    {
        return [
            [['date', 'quantity', 'snils', 'name', 'price'], 'required'],
            [['date', 'quantity', 'snils', 'name', 'price'], 'trim'],
//            [['quantity', 'price'], 'integer'],
            [['date'], 'date', 'format' => 'yyyy-M-d H:m:s'],
        ];
    }

    public function saveFood()
    {
        $food = new FoodBoard;
        $this->loadAttributes($food);
        $food->save(false);

        return $food;
    }

    protected function loadAttributes($food)
    {
        $food->setAttributes($this->attributes);
        $food->count = $this->quantity;
        $food->name = $this->name;

        if($menu = Menu::find()->where(['name' => $this->name])->one()){
            $food->food_id = $menu->common_id;
        }else{
            $menu = new Menu;
            $menu->name = $this->name;
            if($menu->save(false)){
                $food->food_id = $menu->common_id;
            }
        }
    }
}

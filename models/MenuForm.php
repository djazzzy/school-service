<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Menu;

class MenuForm extends Model
{
    public $name;
    public $id;
    public $weight;
    public $price;
    public $category;


    public function rules()
    {
        return [
            [['name', 'id', 'weight', 'price', 'category'], 'required'],
            [['name', 'id', 'weight', 'price', 'category'], 'trim'],
        ];
    }

    public function saveMenu()
    {
        $menu = new Menu;
        $this->loadAttributes($menu);
        $menu->save(false);

        return $menu;
    }

    public function updateMenu()
    {
        $menu = Menu::find()->where(['common_id'=>$this->id])->one();
        $this->loadAttributes($menu);
        $menu->save(false);

        return $menu;
    }

    protected function loadAttributes($menu)
    {
        $menu->setAttributes($this->attributes);
        $menu->common_id = $this->id;

        if($menucat = MenuCategory::find()->where(['title' => $this->category])->one()){
            $menu->category = $menucat->id;
        }else{
            $menucat = new MenuCategory;
            $menucat->title = $this->category;
            if($menucat->save(false)){
                $menu->category = $menucat->id;
            }
        }
    }
}

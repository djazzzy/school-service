<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Visits;

class CashForm extends Model
{
    public $date;
    public $snils;
    public $status;


    public function rules()
    {
        return [
            [['date'], 'required'],
            [['snils', 'status'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    protected function loadAttributes($visit)
    {
        $visit->setAttributes($this->attributes);
//        $visit->school = $this->snils;
    }
}

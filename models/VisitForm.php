<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Visits;

class VisitForm extends Model
{
    public $date;
    public $snils;
    public $address;
    public $event;


    public function rules()
    {
        return [
            [['date', 'address', 'snils', 'event'], 'required'],
            [['date'], 'date', 'format' => 'yyyy-M-d H:m:s'],
            ['event', 'in', 'range' => ['Выход', 'Вход'], 'message' => "Должно быть либо 'Вход' либо 'Выход'"]
        ];
    }

    public function saveVisit()
    {
        $visit = new Visits;
        $this->loadAttributes($visit);
        $visit->save(false);

        return $visit;
    }

    protected function loadAttributes($visit)
    {
        $visit->setAttributes($this->attributes);
        $visit->school = $this->address;
    }
}

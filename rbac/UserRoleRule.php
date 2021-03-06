<?php

namespace app\rbac;

use Yii;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\rbac\Rule;

class UserRoleRule extends Rule
{
	public $name = 'userRole';
	public function execute($user, $item, $params)
	{
		//Получаем массив пользователя из базы
		$user = ArrayHelper::getValue($params, 'user', User::findOne($user));
		if ($user) {
			$role = $user->role; //Значение из поля role базы данных
			if ($item->name === 'admin') {
				return $role == User::ROLE_ADMIN;
			} elseif ($item->name === 'moder') {
				//moder является потомком admin, который получает его права
				return $role == User::ROLE_ADMIN
                    || $role == User::ROLE_MODER;

			} elseif ($item->name === 'teacher') {
				return $role == User::ROLE_ADMIN
                    || $role == User::ROLE_MODER
                    || $role == User::ROLE_TEACHER;

            }elseif ($item->name === 'worker') {
                return $role == User::ROLE_ADMIN
                    || $role == User::ROLE_MODER
                    || $role == User::ROLE_TEACHER
                    || $role == User::ROLE_WORKER;

            }elseif ($item->name === 'user') {
                return $role == User::ROLE_ADMIN
                    || $role == User::ROLE_MODER
                    || $role == User::ROLE_TEACHER
                    || $role == User::ROLE_USER;
        }
		}
		return false;
	}
}
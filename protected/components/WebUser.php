<?php

/**
 * Методы для получения данных о пользователе через Yii::app
 *
 */
class WebUser extends CWebUser
{
    private $_model = null;

    private function _getModel()
    {
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = User::model()->findByPk($this->id, 'status = ' . User::STATUS_ACTIVE);
        }

        return $this->_model;
    }

    public function getEmail()
    {
        return $this->_getStateForKey('email');
    }

    public function getFio()
    {
        return $this->_getStateForKey('fio');
    }

    public function getRole()
    {
        return $this->_getStateForKey('role');
    }

    public function getIsAdmin()
    {
        return $this->getRole() == User::ADMIN ? true : false;
    }

    public function getIsGross()
    {
        return $this->getRole() == User::WHOLESALE ? true : false;
    }

    public function getIsAdminOrGross()
    {
        $role = $this->getRole();
        return ($role == User::WHOLESALE || $role == User::ADMIN) ? true : false;
    }

    private function _getStateForKey($key)
    {
        $model = $this->_getModel();
        if (empty($model) && !$this->isGuest) {
            Yii::app()->user->logout(true);
            Yii::app()->user->loginRequired();
            return false;

        } elseif (empty($model)){
            return false;
        }

        $modelValue = $model->{$key};
        if (is_null($modelValue)) {
            $modelValue = false;
        }

        return $modelValue;
    }
}
<?php

/**
 * Идентификация пользователей
 *
 */
class UserIdentity extends CUserIdentity
{
    public $_id;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Данный метод вызывается один раз при аутентификации пользователя.
     *
     * @return bool
     */
    public function authenticate()
    {
        // Производим стандартную аутентификацию
        $condition = 'LOWER(email)="' . strtolower($this->username) . '" AND status=' . User::STATUS_ACTIVE;
        $user = User::model()->find($condition);
        if (empty($user) || (md5($this->password) != $user->password)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;

        } else {
            $this->_id = $user->id;
            $this->username = $user->email;
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    /**
     * Вызов id пользователя через Yii::app
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
}
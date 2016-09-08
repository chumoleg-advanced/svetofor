<?php

class LoginForm extends CFormModel
{
    public $email;
    public $password;
    public $rememberMe;

    public function rules()
    {
        return array(
            array('email, password', 'required'),
            array('email', 'email'),
            array('rememberMe', 'safe')
        );
    }

    public function attributeLabels()
    {
        return array(
            'email'      => 'Email',
            'password'   => 'Пароль',
            'rememberMe' => 'Запомнить меня'
        );
    }
}

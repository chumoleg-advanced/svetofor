<?php

class UserController extends CController
{
    public function filters()
    {
        return array(
            'isUserLogin + login, register'
        );
    }

    public function filterIsUserLogin($filterChain)
    {
        if (!Yii::app()->user->isGuest) {
            $this->redirect('/');
        }

        $filterChain->run();
    }

    public function actionLogin()
    {
        $data = Yii::app()->request->getRestParams();
        $form = new LoginForm();
        $form->attributes = CHtml::value($data, 'LoginForm');
        if (!$form->validate()) {
            $error = current($form->getErrors());
            MyJson::answerError($error[0]);
        }

        $userIdentity = new UserIdentity($form->email, $form->password);
        if ($userIdentity->authenticate()) {
            $duration = !empty($form->rememberMe) ? 3600 * 24 * 30 : 0;
            Yii::app()->user->login($userIdentity, $duration);
            MyJson::answerHtml('ok');
        }

        MyJson::answerError('Неверный логин или пароль');
    }

    public function actionRegister()
    {
        parse_str(Yii::app()->request->getRestParams(), $formData);
        MyJson::answerHtml('ok');
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect('/');
    }
}

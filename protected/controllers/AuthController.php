<?php

class AuthController extends Controller
{
    public function init()
    {
        $this->_hideAllElements();
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate()) {
                $userIdentity = new UserIdentity($model->email, $model->password);
                if ($userIdentity->authenticate()) {
                    $duration = !empty($model->rememberMe) ? 3600 * 24 * 30 : 0;
                    Yii::app()->user->login($userIdentity, $duration);
                    $this->_redirect();
                } else {
                    $model->addError('email', 'Неправильно указан логин или пароль');
                }
            }
        }

        $this->render('login', array('model' => $model));
    }

    private function _redirect()
    {
        if (Yii::app()->user->isAdmin) {
            $this->redirect('/siteAdmin');
        } elseif (Yii::app()->user->isGross){
            $this->redirect('/cabinet/index');
        } else {
            $this->redirect('/');
        }
    }

    public function actionRegister()
    {
        $model = new User();
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()) {
               $this->redirect('/auth/finalRegister');
            }
        }

        $this->render('register', array('model' => $model));
    }

    public function actionFinalRegister()
    {
        $this->render('final');
    }
}
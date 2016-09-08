<?php

class SiteAdminModule extends CWebModule
{
    public function init()
    {
        $this->setImport(array(
            'siteAdmin.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (!parent::beforeControllerAction($controller, $action) || !Yii::app()->user->isAdmin){
            return false;
        }

        Yii::app()->name = 'Администрирование';
        return true;
    }
}

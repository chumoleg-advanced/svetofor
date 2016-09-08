<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the index layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';

    public $showMainSlider = true;
    public $showCategories = true;
    public $showLastProducts = true;
    public $showRecommendedProducts = true;
    public $showHeader = true;

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * Массив с главной хлебной крошкой для контроллера
     *
     * @var array = array('name' => 'Отображение', 'url' => 'URL')
     */
    public $breadCrumbsData = array();

    /**
     * Проверка, авторизован или нет
     *
     * @param CAction $action
     *
     * @return bool
     */
    public function beforeAction($action)
    {
        $this->_setUniqueCode();
        $this->_setBreadCrumbs();
        return true;
    }

    /**
     * Хлебные крошки
     *
     * @param string $view
     *
     * @return bool
     */
    public function beforeRender($view)
    {
        Yii::app()->getController()->breadcrumbs[] = $this->pageTitle;
        return true;
    }

    /**
     * @return array
     */
    public function filters()
    {
        return array(
            'accessControl',
            array(
                'application.components.YXssFilter',
                'clean'   => '*',
                'tags'    => 'strict',
                'actions' => 'all'
            )
        );
    }

    protected function _hideAllElements()
    {
        $this->showMainSlider = false;
        $this->showCategories = false;
        $this->showLastProducts = false;
        $this->showRecommendedProducts = false;
    }

    protected function _setUniqueCode()
    {
        $uniqueUserCode = Yii::app()->user->getState('uniqueCode');
        if (empty($uniqueUserCode)) {
            Yii::app()->user->setState('uniqueCode', md5(mktime() . Yii::app()->session->sessionId));
        }
    }

    protected function _setBreadCrumbs()
    {
        if (!empty($this->breadCrumbsData) && $this->breadCrumbsData['name'] && $this->breadCrumbsData['url']) {
            Yii::app()->getController()->breadcrumbs[$this->breadCrumbsData['name']] = $this->breadCrumbsData['url'];
        }
    }
}
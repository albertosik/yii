<?php
/*
 * Переопределяем $loginUrl, на котовый будет кидать
 * неавторизованного пользователя
 */
class WebUser extends CWebUser
{
	public $loginUrl = array('/auth/login');


	protected $_model = null;
  
    function getRole()
    {
        return $this->model->role;
    }
  
    function getModel()
    {
        if (!$this->isGuest && $this->_model === null)
        {
            $this->_model = User::model()->findByPk(Yii::app()->user->id);
        }
        return $this->_model;
	}   
} 
?>
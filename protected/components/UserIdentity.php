<?php

class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$users = User::model()->find("name='".$this->username."'");
		if($users)
		{
			//if(CPasswordHelper::verifyPassword($this->password, $users->pass))
                        if($this->password==$users->password)
			{
				//$this->setState('id',$users->id);
				$this->_id = $users->id;
				$this->setState('name',$users->name);
				$this->errorCode=self::ERROR_NONE;
			}
			else
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}		
		
		return !$this->errorCode;
	}
	
	private $_id;
	
	public function getId()
	{
		return $this->_id;
	}
}
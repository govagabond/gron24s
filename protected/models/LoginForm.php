<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
		public $username;
		public $password;
		public $rememberMe;


		/**
		 * @return array validation rules for model attributes.
		 */
		public function rules()
		{
			// NOTE: you should only define rules for those attributes that
			// will receive user inputs.
			return array(
				array('username, password', 'required'),
				array('username', 'length', 'max'=>120),
			    // rememberMe needs to be a boolean
			    array('username', 'email'),
			    array('rememberMe', 'boolean'),
			    // password needs to be authenticated
			    array('password', 'authenticate'),
			);
		}
        
        public function attributeLabels()
        {
        	return array(
        		'rememberMe'=>'Remember me next time',
        	);
        }


		/**
		 * Authenticates the password.
		 * This is the 'authenticate' validator as declared in rules().
		 */
		public function authenticate($attribute,$params)
		{
			if(!$this->hasErrors())
			{
				$identity=new UserIdentity($this->username,$this->password);
	            $identity->authenticate();
	            switch($identity->errorCode)
	            {
	                case UserIdentity::ERROR_NONE:
	                    $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
	                    Yii::app()->user->login($identity,$duration);
	                    break;
	                case UserIdentity::ERROR_USERNAME_INVALID:
	                    $this->addError('username','Username is incorrect.');
	                    break;
	                case UserIdentity::ERROR_UNKNOWN_IDENTITY:
	                    $this->addError('username','Account not active.');
	                    break;
	                case UserIdentity::ERROR_PASSWORD_INVALID:// UserIdentity::ERROR_PASSWORD_INVALID
	                    $this->addError('password','Password is incorrect.');
	                    break;
/*	                default: // UserIdentity::ERROR_PASSWORD_INVALID
	                    $this->addError('password','SIW.');
	                    break;*/
	            }
			}
		}
}

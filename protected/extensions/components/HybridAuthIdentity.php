<?php

class HybridAuthIdentity extends CUserIdentity
{
    const VERSION = '2.1.2';
 
    public $id;

    /**
     * 
     * @var Hybrid_Auth
     */
    public $hybridAuth;
 
    /**
     * 
     * @var Hybrid_Provider_Adapter
     */
    public $adapter;
 
    /**
     * 
     * @var Hybrid_User_Profile
     */
    public $userProfile,$userstatus;
 
    public $allowedProviders = array('facebook');  //, 'linkedin', 'yahoo', 'live',
 // /'google',
    protected $config;
 
    function __construct() 
    {
        $path = Yii::getPathOfAlias('ext.HybridAuth');
        require_once $path . '/hybridauth-' . self::VERSION . '/hybridauth/Hybrid/Auth.php';  //path to the Auth php file within HybridAuth folder
 
        $this->config = array(
            "base_url" => Yii::app()->createUrl('/site/socialLogin'), 
 
            "providers" => array(
                // "Google" => array(
                //     "enabled" => true,
                //     "keys" => array(
                //         "id" => "google client id", 
                //         "secret" => "google secret",
                //     ),
                //     "scope" => "https://www.googleapis.com/auth/userinfo.profile " . "https://www.googleapis.com/auth/userinfo.email",
                //     "access_type" => "online",
                // ),  
                "Facebook" => array (
                   "enabled" => true,
                   "keys" => array ( 
                       "id" => "401383609967072", 
                       "secret" => "5592eade4f3159214d94b8fc94cd699b",
                   ),
                   //"scope" => "email, user_about_me, user_birthday, user_hometown,publish_stream",
                   "display" => "popup",
                ),
            ),
 
            "debug_mode" => true, 
 
            // to enable logging, set 'debug_mode' to true, then provide here a path of a writable file 
            "debug_file" => Yii::app()->basePath.'/runtime/authdebug.log',             
        );
 
        $this->hybridAuth = new Hybrid_Auth($this->config);
    }
 
    /**
     *
     * @param string $provider
     * @return bool 
     */
    public function validateProviderName($provider)
    {
        if (!is_string($provider))
            return false;
        if (!in_array($provider, $this->allowedProviders))
            return false;
 
        return true;
    }

    public function login($id,$role,$user_step)
    {
        $this->username = $this->userProfile->emailVerified;  //CUserIdentity
        $this->id = $id;
        Yii::app()->session['valuerohan'] = $id;
        $this->setState('role', $role); 
        $this->setState('user_step', $user_step); 

        Yii::app()->user->login($this, 0);
        
    }
 
    public function authenticate() 
    {
        
        return true;
    }

    public function getId()
    {
        return $this->id;
    }
 
}
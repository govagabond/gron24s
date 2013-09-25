<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	// public function actionIndex()
	// {
		
	// 	// renders the view file 'protected/views/site/index.php'
	// 	// using the default layout 'protected/views/layouts/main.php'
	// 	$this->render('index');
	// }''

	public function actionLoginlogic($redirect_path)
	{ 
      //if(Yii::app()->user())
		$id = Yii::app()->user->id;
		$role = Yii::app()->user->getState('role');
		$user_step = Yii::app()->user->getState('user_step');

		if($role==0)
		{
			$this->redirect(Yii::app()->createUrl('admin/index'));
		}
	    else if($user_step!=3)
		{
            
          if($role==1)
           {
            $this->redirect(Yii::app()->createUrl('user/step'));
		   }
		  else if($role==2)
           {
            $this->redirect(Yii::app()->createUrl('admin/index'));
		   }
		}
        else
		{
			$this->redirect(Yii::app()->createUrl('user/create'));
		}
		
	}

	public function actionIndex()
	{
		$this->actionCurrency();
		$this->layout =false;

		$user = new User; $userd = new UserDetail;
		$loginform = new LoginForm; $user1 = new LoginForm;
        

		// LOGIN

		$this->loginTemp($loginform);


		//REGISTER

		if(isset($_POST['ajax']) && $_POST['ajax']==='signup-form')
		{
			echo CActiveForm::validate(array($user,$userd));
			Yii::app()->end();
		}


	    if(isset($_POST['User'], $_POST['UserDetail']))
	    {     
	        $user->attributes=$_POST['User'];
	        $userd->attributes=$_POST['UserDetail']; 

	        $valid=$user->validate();
            //$valid=$userd->validate() && $valid;

	        if($valid)    
	        {  
	            $user->activation_key = sha1(mt_rand(10000, 99999).time().$user->username);
	            $user->provider = 0;
	            $user->user_step = 1;
	            $activation_url = $this->createAbsoluteUrl('site/validate', array('username'=>$user->username,'axpz'=>$user->activation_key)); 
	            if($user->save(false))  
	            {  
	                
	                $userd->user_id = $user->id;  
	                $userd->save(false);  
	                //$this->redirect(Yii::app()->createUrl('/site/login'));  
                    
	                $message = new YiiMailMessage;
	                $message->view = 'register';
	                $message->setBody(array('url'=>Yii::app()->request->baseUrl,'name'=>$userd->first_name,'activationurl'=>$activation_url), 'text/html');
	                $message->subject = 'Govagabond Registration';
	                $message->addTo($user->username);
	                $message->from = Yii::app()->params['adminEmail'];
	                Yii::app()->mail->send($message);	
	                $this->render('index',array('user'=>$user,'userd'=>$userd,'gender'=>$this->gender,'loginform'=>$loginform,'errorhead'=>'Registration Complete','errordesc'=>'Please check your email address for a confirmation link to activate your account.'));
	                return;
	                
                }  
	        }

	    }
      

	    //FORGOT

		if(isset($_POST['ajax']) && $_POST['ajax']==='forgot-form')
		{
			echo CActiveForm::validate(array($loginform),array('username'));
			Yii::app()->end();
		}
        

	    if(isset($_POST['LoginForm']))
	    {     
	        $user1->attributes=$_POST['LoginForm'];

	        $valid=$user1->validate(array('username'));
            //$valid=$userd->validate() && $valid;

	        if($valid)    
	        {  
	            $user1 = User::model()->with('UserDetail')->find(array('condition'=>'username=:username','params'=>array(':username'=>$_POST['LoginForm']['username'])));
	            if($user1)
	            {
	            $user1->forgot_key = sha1(mt_rand(10000, 99999).time().$user1->username);
	            $activation_url = $this->createAbsoluteUrl('site/validatePassword', array('username'=>$user1->username,'axpz'=>$user1->forgot_key)); 
	            
	            //Yii::app()->session['user'] = $user1;

	              if($user1->save(false))  
	              {  
	                $this->render('index',array('user'=>$user,'userd'=>$userd,'gender'=>$this->gender,'loginform'=>$loginform,'errorhead'=>'Forgot Password','errordesc'=>'Please check your email address for a confirmation link to change your password.'));
	                $message = new YiiMailMessage;
	                $message->view = 'forgot-password';
	                $message->setBody(array('url'=>Yii::app()->request->baseUrl,'name'=>$user1->UserDetail->first_name,'activationurl'=>$activation_url), 'text/html');
	                $message->subject = 'GuideTrip - Change your password';
	                $message->addTo($user1->username);
	                $message->from = Yii::app()->params['adminEmail'];
	                Yii::app()->mail->send($message);	
	                return;
	                
                   }
                }
                else { 
                    $this->render('index',array('user'=>$user,'userd'=>$userd,'gender'=>$this->gender,'loginform'=>$loginform,'errorhead'=>'Change Unsuccessful','errordesc'=>'The username you entered doesn\'t exist in our records'));
                 }  
	        }

	    }
	 
	    $this->render('index',array('user'=>$user,'userd'=>$userd,'gender'=>$this->gender,'loginform'=>$loginform));

	}

	public function loginTemp($loginform)
    {
    	if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($loginform);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$loginform->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($loginform->validate()) 
			//$this->redirect(Yii::app()->user->returnUrl);
			$this->redirect(Yii::app()->createUrl('user/dashboard'));
		}
    }

    public function actionLogin()
    {
       $this->layout = false;
       $loginform = new LoginForm; 	
       $this->loginTemp($loginform);
       $this->render('login',array('loginform'=>$loginform));
    }


	public function validatePassword()
	{
				$user = new User; $userd = new UserDetail;
				$activation_key = Yii::app()->request->getQuery('axpz');
				$username = Yii::app()->request->getQuery('username');

				if(isset($username,$activation_key))
				{
                   $user = User::model()->find('username=:username', array(':username'=>$username));   
                   if($user->forgot_key == $activation_key)
                   {
				  		Yii::app()->session['forgotname']= $username;
				  		$this->redirect(Yii::app()->createUrl('/site/confirmPassword'));

				  	}
				  	else
				  	{
				  	   $this->render('index',array('user'=>$user,'userd'=>$userd,'gender'=>$this->gender,'loginform'=>$loginform,'errorhead'=>'Bad link!','errordesc'=>'Contact the administrator to know the solution to your problem.'));
				  	}
	
                }
                else
                {
                   $this->render('index',array('user'=>$user,'userd'=>$userd,'gender'=>$this->gender,'loginform'=>$loginform,'errorhead'=>'Bad link!','errordesc'=>'Contact the administrator to know the solution to your problem.'));
                }
	}

	public function actionConfirmPassword()
	{
       	if(isset(Yii::app()->session['forgotname']))
       	{	
       		$user = new LoginForm;

       		if(isset($_POST['ajax']) && $_POST['ajax']==='password-form')
       		{
       			echo CActiveForm::validate(array($user),array('password','password_repeat'));
       			Yii::app()->end();
       		}
               


       	    if(isset($_POST['LoginForm']))
       	    {     
       	        $user->attributes=$_POST['LoginForm'];
       	        $valid=$user->validate(array('password','password_repeat'));
                   //$valid=$userd->validate() && $valid;

       	        if($valid)    
       	        {  
       	            $user = User::model()->find(array('condition'=>'username=:username','params'=>array(':username'=>Yii::app()->session['forgotname'])));
       	            $user->password = $_POST['LoginForm']['Password'];
       	            $user->save(false); unset(Yii::app()->session['forgotname']);
       	            $this->redirect(Yii::app()->createUrl('/user/create'));
                           	          
       	        }
       	        else
       	        {
                    Yii::app()->user->setFlash('Password couldn\'t be changed.');
       	        }
	        }
	 
	    	$this->render('confirmPassword',array('user'=>$user));
	        
	    }
	    else
	    {
	 	  $user=new User; $userd=new UserDetail;
	      $this->render('index',array('user'=>$user,'userd'=>$userd,'gender'=>$this->gender,'loginform'=>$loginform,'errorhead'=>'Permission Denied','errordesc'=>'You don\'t have the permission to access the page'));
	    }
    }

	

	public function actionValidate()
	{
	
	    $activation_key = Yii::app()->request->getQuery('axpz');
	    $username = Yii::app()->request->getQuery('username'); 
	    
	     // collect user input data
	     if(isset($username,$activation_key))
	     {
	          
	      $user = User::model()->find('username=:username', array(':username'=>$username));   
	      
	      if($user->activation_key == $activation_key){           
            $user->is_activated = 1; 
            $user->save(false);
	        $identity=new UserIdentity($user->username,$user->password);
	        $identity->setParams();
	        Yii::app()->user->login($identity,0); 
	        $this->redirect(Yii::app()->createUrl('/user/create'));
	      }
	                
	     }
	     else
	     {
            $this->render('site/index');
	     }
	
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
/*	public function actionContact()
	{   $user->flash(preg_match('', subject))
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
    */
	/**
	 * Displays the login page
	 */
	// public function actionLogin()
	// {
		

	// 	// display the login form
	// 	$this->render('login',array('model'=>$model));
	// }

    public function actionLoginfacebook()
     {
         if (!isset($_GET['provider'])) 
         {
             $this->redirect(Yii::app()->createUrl('/site/index'));
             return;
         }
    
         try
         {
             Yii::import('ext.components.HybridAuthIdentity');
             $haComp = new HybridAuthIdentity();
             if (!$haComp->validateProviderName($_GET['provider']))
                 throw new CHttpException ('500', 'Invalid Action. Please try again.');
 
             $haComp->adapter = $haComp->hybridAuth->authenticate($_GET['provider']);
             $haComp->userProfile = $haComp->adapter->getUserProfile();
    
             Yii::app()->session['profile'] = $haComp->userProfile; 
             //$haComp->adapter->setUserStatus('I am registered on Govagabond, a website for breathtaking experiences from every corner of the world!');

             $user = User::model()->findByAttributes(array('username'=>$haComp->userProfile->emailVerified));
             if ($user===null) 
             { 
            
                $user = new User;  $userd = new UserDetail;
                $user->username = $haComp->userProfile->emailVerified;
                $user->provider = 1;
                $user->is_activated = 1;
                $user->user_step = 7;



                $userd->first_name = $haComp->userProfile->firstName; 
                $userd->last_name = $haComp->userProfile->lastName; 
                $userd->gender = ($haComp->userProfile->gender=='male')?0:1; 
                $userd->dob = $haComp->userProfile->birthDay.'-'.$haComp->userProfile->birthMonth.'-'.$haComp->userProfile->birthYear; 
                $userd->location = $haComp->userProfile->region; 
                $userd->imagemarker = 1;  
                $userd->image_url = $haComp->userProfile->photoURL;  
                // $userd->first_name = $haComp->userProfile->firstName; 
             
                if($user->save(false))
                {
                	$userd->user_id = $user->id;
                	$userd->save(false);
                }
                $haComp->login($user->id,1,7);

             } 
             else
             {
               
               if(!in_array(1, explode(",",$user->provider)))
             	 { 
             	   $initial = array();
             	   $initial = explode(",",$user->provider);
             	   array_push($initial,1);
             	   $user->provider = implode(",",$initial);
             	   $user->save(false);
                 }

             	$haComp->login($user->id,$user->group,$user->user_step);

             }
       
             echo "<script>
                 window.opener.location.href=\"".Yii::app()->createUrl('/user/facebookConfirm')."\";
                 window.close();
                  </script>";

                    
             return;

             //$this->redirect(Yii::app()->createUrl('/user/create'));  //redirect to the user logged in section..
         }
         catch (Exception $e)  
         {
         	 Yii::app()->session['error'] = $e->__toString();
             //process error message as required or as mentioned in the HybridAuth 'Simple Sign-in script' documentation

             $this->redirect(Yii::app()->createUrl('/site/index'));
             return;
         }
     }

     public function logException($exception)
    {
        $category = 'exception.' . get_class($exception);
        if ($exception instanceof CHttpException)
            $category .= '.' . $exception->statusCode;
        // php <5.2 doesn't support string conversion auto-magically
        $message = $exception->__toString();
        if (isset($_SERVER['REQUEST_URI']))
            $message .= ' REQUEST_URI=' . $_SERVER['REQUEST_URI'];
        Yii::log($message, CLogger::LEVEL_ERROR, $category);
    }

	public function actionSocialLogin()
	    {
	        Yii::import('ext.components.HybridAuthIdentity');
	        $path = Yii::getPathOfAlias('ext.HybridAuth');
	        require_once $path . '/hybridauth-' . HybridAuthIdentity::VERSION . '/hybridauth/index.php';
	   
	    }   

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionForm() {
		$this->layout =false;
		
	    $model=new UserDetail;
	    // $path = str_replace("govagabond/protected","govagabond",Yii::app()->basePath) . '/images/uploads/tmp/';
	    // $publicPath = Yii::app( )->getBaseUrl( )."/images/uploads/tmp/";

	    /*if(isset($_POST['ajax']) && $_POST['ajax']==='upload-form')
		{
			echo CActiveForm::validate($model,array('image_source'));
			Yii::app()->end();
		}

        if(isset($_POST['UserDetail']))
        {
            $model->attributes=$_POST['UserDetail'];
            $model->user_id = 1;
            $model->image_source=CUploadedFile::getInstance($model,'image_source');
   
            
            if($model->validate(array('image_source'))) 
            {
               //(optional) Generate a random name for our file
               $filename = $model->image_source->getName();
               //$filename .= ".".$model->image_source->getExtensionName();

               if($model->save(false))
               {
                   $model->image_source->saveAs($path.$filename);
                   chmod($path.$filename,0777);
                   // redirect to success page
                   $this->render('form', array('model'=>$model,'path'=>$publicPath.$filename,'vc'=>1));
                   
                   // $image = Yii::app()->image->load($path.$filename);
                   // $image->resize(50,50);
                   // $image->save(); // or $image->save('images/small.jpg');
               }
            }
        }*/
        //$this->render('form', array('model'=>$model,'path'=>$path));
        $this->render('form');	
	}

	// public function actionUpload()
	// {
	//         $path = str_replace("govagabond/protected","govagabond",Yii::app()->basePath) . '/images/uploads/tmp/';
	//         $publicPath = Yii::app( )->getBaseUrl( )."/images/uploads/tmp/";

	//         // $tempFolder=Yii::getPathOfAlias('webroot').'/upload/temp/';
 
 //            //mkdir($path, 0777, TRUE);
 //            //mkdir($path.'chunks', 0777, TRUE);
            
 //            Yii::import("ext.EFineUploader.qqFileUploader");
            
 //            $uploader = new qqFileUploader();
 //            $uploader->allowedExtensions = array('jpg','jpeg','png');
 //            $uploader->sizeLimit = 2 * 1024 * 1024;//maximum file size in bytes
 //            //$uploader->chunksFolder = $path.'chunks';
            
 //            $result = $uploader->handleUpload($path);
 //            $result['filename'] = $publicPath.$uploader->getUploadName();
 //            //$result['folder'] = $webFolder;
            
 //            $uploadedFile=$path.$uploader->getUploadName();
            
 //            $image = Yii::app()->image->load($uploadedFile);
 //            $image->resize(400,400);
 //            $image->save(); // or $image->save('images/small.jpg');
            

 //            header("Content-Type: text/plain");
 //            $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 //            echo $result;
 //            Yii::app()->end();
	// }


	/*public function actionUpload() {
	    Yii::import( "xupload.models.XUploadForm" );
	    //Here we define the paths where the files will be stored temporarily
	    $path = str_replace("govagabond/protected","govagabond",Yii::app()->basePath) . '/images/uploads/tmp/';
	    $publicPath = Yii::app( )->getBaseUrl( )."/images/uploads/tmp/";
	 
	    //This is for IE which doens't handle 'Content-type: application/json' correctly
	    header( 'Vary: Accept' );
	    if( isset( $_SERVER['HTTP_ACCEPT'] ) 
	        && (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
	        header( 'Content-type: application/json' );
	    } else {
	        header( 'Content-type: text/plain' );
	    }
	 
	    //Here we check if we are deleting and uploaded file
	    if( isset( $_GET["_method"] ) ) {
	        if( $_GET["_method"] == "delete" ) {
	            if( $_GET["file"][0] !== '.' ) {
	                $file = $path.$_GET["file"];
	                if( is_file( $file ) ) {
	                    unlink( $file );
	                }
	            }
	            echo json_encode( true );
	        }
	    } else {
	        $model = new XUploadForm;
	        $model->file = CUploadedFile::getInstance( $model,'file');
	        //We check that the file was successfully uploaded
	        if( $model->file !== null ) {
	            //Grab some data
	            $model->mime_type = $model->file->getType( );
	            $model->size = $model->file->getSize( );
	            $model->name = $model->file->getName( );
	            //(optional) Generate a random name for our file
	            $filename = md5( Yii::app( )->user->id.microtime( ).$model->name);
	            $filename .= ".".$model->file->getExtensionName( );
	            if( $model->validate( ) ) {
	                //throw new CHttpException( 500,$path);
	                //Move our file to our temporary dir
	                $model->file->saveAs( $path.$filename );
	                chmod( $path.$filename, 0777 );
	                //here you can also generate the image versions you need 
	                //using something like PHPThumb
	 
	 
	                //Now we need to save this path to the user's session
	                if( Yii::app( )->user->hasState( 'images' ) ) {
	                    $userImages = Yii::app( )->user->getState( 'images' );
	                } else {
	                    $userImages = array();
	                }
	                 $userImages[] = array(
	                    "path" => $path.$filename,
	                    //the same file or a thumb version that you generated
	                    "thumb" => $path.$filename,
	                    "filename" => $filename,
	                    'size' => $model->size,
	                    'mime' => $model->mime_type,
	                    'name' => $model->name,
	                );
	                Yii::app( )->user->setState( 'images', $userImages );
	 
	                //Now we need to tell our widget that the upload was succesfull
	                //We do so, using the json structure defined in
	                // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
	                echo json_encode( array( array(
	                        "name" => $model->name,
	                        "type" => $model->mime_type,
	                        "size" => $model->size,
	                        "url" => $publicPath.$filename,
	                        "thumbnail_url" => $publicPath."$filename",
	                        "delete_url" => $this->createUrl( "upload", array(
	                            "_method" => "delete",
	                            "file" => $filename
	                        ) ),
	                        "delete_type" => "POST"
	                    ) ) );
	            } else {
	                //If the upload failed for some reason we log some data and let the widget know
	                echo json_encode( array( 
	                    array( "error" => $model->getErrors( 'file' ),
	                ) ) );
	                Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ),
	                    CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction" 
	                );
	            }
	        } else {
	            throw new CHttpException( 500, "Could not upload file" );
	        }
	    }
	}*/



}
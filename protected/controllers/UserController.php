<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	
	// public function beforeAction()
	// {
	//   $step = Yii::app()->user->getState('user_step');
	//   if($step)
	// }

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			// array('allow',  // allow all users to perform 'index' and 'view' actions
			// 	'actions'=>array('*'),
			// 	'users'=>array('*'),
			// ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('facebookConfirm','step1','step2','profile1','crop','profile2','weburl'),
				'roles'=>array(1,2),
			     //'users'=>array('*'),
			),
		/*	array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
   

   /*
      facebook confirmed - 7
   */

    public function actionfacebookConfirm()
	{
	 
	 $user = User::model()->findByAttributes(array('id'=>Yii::app()->user->id));
	 
	 $arr = explode(',',$user->provider);
	  if((count($arr<1)) && in_array(1, $arr) && Yii::app()->user->getState('user_step')==7)	
	  {	
		
		$facebookform = UserDetail::model()->find('user_id=:id',array(':id'=>Yii::app()->user->id));

		if(isset($_POST['ajax']) && $_POST['ajax']==='facebook-form')
		{
			echo CActiveForm::validate($facebookform,array('location','mobile_number','country_code'));
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['UserDetail'])) 
		{
			$facebookform->attributes=$_POST['UserDetail'];
			// validate user input and redirect to the previous page if valid
			if($facebookform->validate(array('location','mobile_number','country_code'))) 
			{
				$facebookform->save(false);
				$user->user_step = 1; $user->save(false);
				Yii::app()->user->setState('user_step',1);
				$this->redirect(Yii::app()->createUrl('user/step1'));
			}
		}

        
		$this->layout = false;
		$this->render('/user/facebookConfirm',array('userd'=>$facebookform));
	   
	   }
	   else
	   {
	   	 $this->redirect(array('user/dashboard'));
	   }
	}

    public function actionStep1()
	{
	  if(Yii::app()->user->getState('user_step')==1)	
	   {	

	   	if(Yii::app()->request->getQuery('i')) 
		{        
           $user=User::model()->findByPk(Yii::app()->user->id);
           $user->group = Yii::app()->request->getQuery('i');
           Yii::app()->user->setState('role',Yii::app()->request->getQuery('i'));
           
           if(Yii::app()->request->getQuery('i') == 1)
           {
             $user->user_step = 8;
             $user->save(); // save the change to database
             Yii::app()->user->setState('user_step',8);
             $this->redirect(array('/user/dashboard'));
		   }
		   else if(Yii::app()->request->getQuery('i') == 2)
		   {
              $user->user_step = 2;
              $user->save(); // save the change to database
              Yii::app()->user->setState('user_step',2);
              $this->redirect(array('/user/step2'));
		   }
		 }

		$this->layout = false;
		$this->render('/user/step1');
	   }
	   else
	   {
	   	 $this->redirect(array('user/dashboard'));
	   }
	}

	public function actionStep2()
	{
	  if(Yii::app()->user->getState('user_step')==2)	
	   {	
        $guide = new Guide;

        if(isset($_POST['ajax']) && $_POST['ajax']==='step2-form')
		{
			echo CActiveForm::validate($guide,array('brief_profile','reference_1_name','reference_1_email','reference_2_name','reference_2_email','languages','expertise'));
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['Guide'])) 
		{
			$guide->attributes=$_POST['Guide'];
			// validate user input and redirect to the previous page if valid
			if($guide->validate(array('brief_profile','reference_1_name','reference_1_email','reference_2_name','reference_2_email','languages','expertise'))) 
			{
				$guide->user_id = Yii::app()->user->id;
				$guide->save(false);
				User::model()->updateByPk(Yii::app()->user->id, array('user_step'=>8));
				Yii::app()->user->setState('user_step',8);
				$this->redirect(Yii::app()->createUrl('user/dashboard'));
			}
		}

		
		$this->layout = false;
		$this->render('/user/step2',array('guide'=>$guide,'languages'=>$this->langarray()));
	   }
	   else
	   {
	   	 $this->redirect(array('user/dashboard'));
	   }
	}

	public function actionProfile1()
	{
       $this->layout = false;
       $user = User::model()->with('UserDetail')->findByPk(Yii::app()->user->id);
       $user1 = new User; $userd = new UserDetail;

       if(isset($_POST['yt1']))
	   {

       if(isset($_POST['ajax']) && $_POST['ajax']==='general-form')
       {
       	echo CActiveForm::validate($userd,array('first_name','last_name','location','country_code','mobile_number','gender','address','zipcode','time_call'));
       	Yii::app()->end();
       }

       if(isset($_POST['UserDetail']))
	    {     

	        $userd = UserDetail::model()->find('user_id=:id',array(':id'=>Yii::app()->user->id));
	        $userd->attributes=$_POST['UserDetail']; 

	        $valid=$userd->validate(array('first_name','last_name','location','country_code','mobile_number','gender','address','zipcode','time_call'));

	        if($valid)    
	        {  
	            $userd->save(false);
	            $this->render('/user/profile1',array('user'=>$user,'userd'=>$userd,'errorhead'=>'Profile Updated','errordesc'=>'Your profile details have been updated.'));
	            return;
	        }

	    } }
	    if(isset($_POST['UserDetail'],$_POST['yt0']))
	    {     
	       $this->refresh();
	       return;

	    }

       
       $this->render('/user/profile1',array('user'=>$user,'userd'=>$user->UserDetail));
	}

	public function actionWeburl()
	{
       $this->layout = false;
       $user = User::model()->with('UserDetail')->findByPk(Yii::app()->user->id);
       $user1 = new User; $userd = new UserDetail;

       if(isset($_POST['ajax']) && $_POST['ajax']==='url-form')
       {
       	echo CActiveForm::validate($userd,array('image_url'));
       	Yii::app()->end();
       }

       if(isset($_POST['UserDetail']))
	    {     

	        $userd = $user->UserDetail;
	        $userd->attributes=$_POST['UserDetail']; 
	        $userd->imagemarker=1; 

	        $valid=$userd->validate(array('image_url'));

	        if($valid)    
	        {  
	            $userd->save(false);
	            $this->redirect('/user/profile1',array('user'=>$user,'userd'=>$userd,'errorhead'=>'Profile Picture Updated','errordesc'=>'Your profile picture have been updated to the web url specified.'));
	            return;
	        }

	    } 

       
       $this->redirect('/user/profile1',array('user'=>$user,'userd'=>$user->UserDetail));
	}


	public function actionProfile2()
	{
       $this->layout = false;
       $user = User::model()->findByPk(Yii::app()->user->id);
       $user1 = new User;

       if(isset($_POST['yt1']))
	   {

       if(isset($_POST['ajax']) && $_POST['ajax']==='password-form')
       {
       	echo CActiveForm::validate($user1,array('password','password_repeat'));
       	Yii::app()->end();
       }

       if(isset($_POST['User']))
	    {     
	        $_POST['User']['password'] = md5($_POST['User']['password']);
	        $_POST['User']['password_repeat'] = md5($_POST['User']['password_repeat']);
	        $user->attributes=$_POST['User']; 

	        $valid=$user->validate(array('password','password_repeat'));

	        if($valid)    
	        {  
	            $user->save(false,array('password'));
	            $this->render('/user/profile2',array('user'=>$user1,'errorhead'=>'Password Changed','errordesc'=>'You will be able to login to your GuideTrip account using the updated password form the next session.'));
	            return;
	        }

	    } }
	    if(isset($_POST['User'],$_POST['yt0']))
	    {     
	       $this->refresh();
	       return;

	    }

       
       $this->render('/user/profile2',array('user'=>$user1));
	}


	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		if(isset($_POST['User']))
		{
			$_POST['User']['password'] = SHA1($_POST['User']['password']);
			$model->attributes=$_POST['User'];
			
			if($model->save())
			   $this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	 

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}

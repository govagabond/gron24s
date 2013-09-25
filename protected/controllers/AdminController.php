<?php

class AdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
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
			// array('allow',  // allow all users to perform 'index' and 'view' actions
			// 	'actions'=>array('step1','step2'),
			// 	'roles'=>array(1,2),
			//      //'users'=>array('*'),
			// ),
		/*	array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('allow',  // deny all users
				'users'=>array('*'),
			),
		);
	}



	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		Yii::app()->bootstrap->register();

		$dataProvider=new CActiveDataProvider('Guide',
        array(
                'pagination'=>array('pageSize'=>9),
                'criteria'=>array(
                	'condition'=>'status=1',
                    'with'=>array(
                        'user','user.UserDetail'
                    ),
                    'together'=>true,

                ),
            )
        );

        $this->render('index',array( 
			'dataProvider'=>$dataProvider,
		));		
	}

	public function changeStatus($id,$status)
	{
      $guide = Guide::model()->with('user','user.UserDetail')->findByPk($id);
      $guide->status = $status;
      $guide->save(false);

      if($status==2)
      {
      	$message = new YiiMailMessage;
      	$message->view = 'guide-approve';
      	$message->setBody(array('url'=>Yii::app()->request->baseUrl,'name'=>$guide->user->UserDetail->first_name), 'text/html');
      	$message->subject = 'GuideTrip - Local Expert Application Approved!';
      	$message->addTo($guide->user->username);
      	$message->from = Yii::app()->params['adminEmail'];
      	Yii::app()->mail->send($message);	
      	$this->redirect(Yii::app()->createUrl('/admin/approved'));
      }
      else if($status==3)
      { 
      	$message = new YiiMailMessage;
      	$message->view = 'guide-waitlist';
      	$message->setBody(array('url'=>Yii::app()->request->baseUrl,'name'=>$guide->user->UserDetail->first_name), 'text/html');
      	$message->subject = 'GuideTrip - Local Expert Application Status';
      	$message->addTo($guide->user->username);
      	$message->from = Yii::app()->params['adminEmail'];
      	Yii::app()->mail->send($message);	
      	$this->redirect(Yii::app()->createUrl('/admin/waitlisted'));
      }
      else if($status==4)
      {
      	$message = new YiiMailMessage;
      	$message->view = 'guide-reject';
      	$message->setBody(array('url'=>Yii::app()->request->baseUrl,'name'=>$guide->user->UserDetail->first_name), 'text/html');
      	$message->subject = 'GuideTrip - Local Expert Application Status';
      	$message->addTo($guide->user->username);
      	$message->from = Yii::app()->params['adminEmail'];
      	Yii::app()->mail->send($message);	
      	$this->redirect(Yii::app()->createUrl('/admin/rejected'));
      }
	}

	public function actionApproved()
	{
		Yii::app()->bootstrap->register();

		$dataProvider=new CActiveDataProvider('Guide',
        array(
                'pagination'=>array('pageSize'=>9),
                'criteria'=>array(
                	'condition'=>'status=2',
                    'with'=>array(
                        'user','user.UserDetail'
                    ),
                    'together'=>true,

                ),
            )
        );

        $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}

	public function actionWaitlisted()
	{
		Yii::app()->bootstrap->register();
		$this->updateCache();

		$dataProvider=new CActiveDataProvider('Guide',
        array(
                'pagination'=>array('pageSize'=>9),
                'criteria'=>array(
                	'condition'=>'status=3',
                    'with'=>array(
                        'user','user.UserDetail'
                    ),
                    'together'=>true,

                ),
            )
        );

        $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}

	public function actionRejected()
	{
		Yii::app()->bootstrap->register();
		$this->updateCache();

		$dataProvider=new CActiveDataProvider('Guide',
        array(
                'pagination'=>array('pageSize'=>9),
                'criteria'=>array(
                	'condition'=>'status=4',
                    'with'=>array(
                        'user','user.UserDetail'
                    ),
                    'together'=>true,

                ),
            )
        );

        $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}

	public function actionGuideDetails()
	{
		//$id = Yii::app()->request->getQuery('id');
		$str = '';
		Yii::app()->bootstrap->register();

		$guide = Guide::model()->with('user','user.UserDetail')->findByPk(2);
		foreach (explode(",",$guide->languages) as $lang) 
		{
           $str = $str.$this->languages[$lang][0]." "; 
        }
		//$guide = Guide::model()->find('condition'=>'id=:id','params'=>array(':id'=>2));
		$this->render('guideDetails',array(
			'guide'=>$guide,
			'str'=>$str
		));
	}

	
}

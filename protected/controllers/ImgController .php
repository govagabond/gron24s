<?php

class ImgController extends Controller
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
				'actions'=>array('upload','crop'),
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

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionUpload()
	{
	        $path = str_replace("govagabond/protected","govagabond",Yii::app()->basePath) . '/images/uploads/tmp/';
	        $publicPath = Yii::app( )->getBaseUrl( )."/images/uploads/tmp/";

	        // $tempFolder=Yii::getPathOfAlias('webroot').'/upload/temp/';
 
            //mkdir($path, 0777, TRUE);
            //mkdir($path.'chunks', 0777, TRUE);
            
            Yii::import("ext.EFineUploader.qqFileUploader");
            
            $uploader = new qqFileUploader();
            $uploader->allowedExtensions = array('jpg','jpeg','png');
            $uploader->sizeLimit = 2 * 1024 * 1024;//maximum file size in bytes
            //$uploader->chunksFolder = $path.'chunks';
            
            $result = $uploader->handleUpload($path);
            $result['filename'] = $publicPath.$uploader->getUploadName();
            //$result['folder'] = $webFolder;
            
            $uploadedFile=$path.$uploader->getUploadName();
            
            $image = Yii::app()->image->load($uploadedFile);
            $image->resize(400,400);
            $image->save(); // or $image->save('images/small.jpg');
            

            header("Content-Type: text/plain");
            $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
            echo $result;
            Yii::app()->end();
	}

	public function actionCrop()
	{
		echo "hi";
	}
}

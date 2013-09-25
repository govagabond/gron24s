<?php

class ImageController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	public function actionUpload()
	{
	        $path = str_replace("govagabond/protected","govagabond",Yii::app()->basePath) . '/images/uploads/tmp/'.Yii::app()->user->id.'/';
	        $publicPath = Yii::app( )->getBaseUrl( )."/images/uploads/tmp/".Yii::app()->user->id.'/';

	        // $tempFolder=Yii::getPathOfAlias('webroot').'/upload/temp/';
 
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
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
            Yii::app()->session['picture'] = $uploader->getUploadName();;
            
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
	   $pathold = str_replace("govagabond/protected","govagabond",Yii::app()->basePath) . '/images/uploads/tmp/'.Yii::app()->user->id.'/';
	   $path = str_replace("govagabond/protected","govagabond",Yii::app()->basePath) . '/images/uploads/profile/'.Yii::app()->user->id.'/';
	   $publicPath = Yii::app( )->getBaseUrl( )."/images/uploads/profile/".Yii::app()->user->id.'/';

	   if (!file_exists($path)) {
	       mkdir($path, 0777, true);
	   }
	   $coordinates = $_POST['coordinates'];

	   $image = Yii::app()->image->load($pathold.Yii::app()->session['picture']);
	   $image->crop(ceil($coordinates['w']),ceil($coordinates['h']),ceil($coordinates['y']),ceil($coordinates['x']));
	   $image->save($path.Yii::app()->session['picture']); // or $image->save('images/small.jpg');
       echo $publicPath.Yii::app()->session['picture']."?w=vre";
	   User::model()->updateByPk(Yii::app()->user->id, array('image_source'=>Yii::app()->session['picture']));
	   unset(Yii::app()->session['picture']);
	}
}
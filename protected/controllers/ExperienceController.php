<?php

class ExperienceController extends Controller
{
	public $language = array();

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		// return array(
		// 	'accessControl', // perform access control for CRUD operations
		// 	'postOnly + delete', // we only allow deletion via POST request
		// );
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		// return array(
		// 	array('allow',  // allow all users to perform 'index' and 'view' actions
		// 		'actions'=>array('index','view'),
		// 		'users'=>array('*'),
		// 	),
		// 	array('allow', // allow authenticated user to perform 'create' and 'update' actions
		// 		'actions'=>array('create','update'),
		// 		'users'=>array('*'),
		// 	),
		// 	array('allow', // allow admin user to perform 'admin' and 'delete' actions
		// 		'actions'=>array('admin','delete'),
		// 		'users'=>array('admin'),
		// 	),
		// 	array('deny',  // deny all users
		// 		'users'=>array('*'),
		// 	),
		// );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	

    public function actionAjaxindex()
	{
		$rating = array(
        	  5=>'<span class="fixedrating" id="5">&nbsp;</span>',
        	  4=>'<span class="fixedrating" id="4">&nbsp;</span>',
        	  3=>'<span class="fixedrating" id="3">&nbsp;</span>',
        	  2=>'<span class="fixedrating" id="2">&nbsp;</span>',
        	  1=>'<span class="fixedrating" id="1">&nbsp;</span>',
        	  0=>'&nbsp;Fcuk rated yet'
        	);

		$lang = array();

        foreach($this->languages as $key=>$value)
        {
        	array_push($lang,'<span class="flag '.$value[1].'"></span><span>'.$value[0].'.</span>
                   <span class="language-filter-count filter-count-hidden" style="display:inline;">('.Experience::model()->findNumber($key,1).')</span>');

        }


        $duration = array(
        	  0=>'0 - 4 hours
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(0,2).')</span>',
        	  1=>'4 - 8 hours
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(1,2).')</span>',
        	  2=>'8 - 12 hours
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(2,2).')</span>',
        	  3=>'12 - 24 hours
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(3,2).')</span>',
        	  4=>'24 hours +
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(4,2).')</span>',
        	);

        $locationautocomplete = explode(',',$_GET['locationlist']);

		//$this->layout=false; 
		//$this->currencyCheck();
      
        /*if( count( $data ) > 0 )*/ //{ Yii::app()->session['rohan'] = $_GET['ratinglist']; }

		$criteria = new CDbCriteria();
        $criteria->with = array(
                        'comments','fixedPrices','personPrices','tourPrices','user','user.UserDetail','user.guide');
        $criteria->together = true;
        
        if(isset($_GET['locationlist'],$locationautocomplete[0])  && ( strlen( $_GET['locationlist'] ) > 0 ))
        {
          $criteria->compare('loc',$locationautocomplete[0],true,'OR',true);
        }

        if(isset($_GET['locationlist'],$locationautocomplete[1])  && ( strlen( $_GET['locationlist'] ) > 0 ))
        {
          $criteria->compare('loc',$locationautocomplete[1],true,'OR',true);
        }

        if(isset($_GET['locationlist'],$locationautocomplete[3])  && ( strlen( $_GET['locationlist'] ) > 0 ))
        {
          $criteria->compare('loc',$locationautocomplete[3],true,'OR',true);
        }

        if(isset($_GET['ratinglist'])  && ( count( $_GET['ratinglist'] ) > 0 ))
        {
          $criteria->addInCondition('rate',$_GET['ratinglist'],'AND');
        }

        if(isset($_GET['languagelist'])  && ( count( $_GET['languagelist'] ) > 0 ))
        {
          $criteria->addInCondition('languages',$_GET['languagelist'],'AND');
        }

        if(isset($_GET['durationlist'])  && ( count( $_GET['durationlist'] ) > 0 ))
        {
          $criteria->addInCondition('duration_category',$_GET['durationlist'],'AND');
        }

        if(isset($_GET['categorylist'])  && ( count( $_GET['categorylist'] ) > 0 ))
        {
          $criteria->compare('category',$_GET['categorylist'],'AND');
        }

		$dataProvider=new CActiveDataProvider('Experience',
        array(
                'pagination'=>array('pageSize'=>9),
                'criteria'=> $criteria,
            )
        );

        //Yii::app()->session['test'] = $dataProvider;

        $this->render('index',array(
			'dataProvider'=>$dataProvider,
			'rating'=>$rating,
			'lang'=>$lang,
			'duration'=>$duration,
			'categories'=>$this->categories,
		));

	}


	public function actionIndex(array $data = array())
	{
		$this->layout=false; 
		$this->currencyCheck();
        
        $rating = array(
        	  5=>'<span class="fixedrating" id="5">&nbsp;</span>',
        	  4=>'<span class="fixedrating" id="4">&nbsp;</span>',
        	  3=>'<span class="fixedrating" id="3">&nbsp;</span>',
        	  2=>'<span class="fixedrating" id="2">&nbsp;</span>',
        	  1=>'<span class="fixedrating" id="1">&nbsp;</span>',
        	  0=>'&nbsp;Not rated yet'
        	);

        $lang = array();

        foreach($this->languages as $key=>$value)
        {
        	array_push($lang,'<span class="flag '.$value[1].'"></span><span>'.$value[0].'.</span>
                   <span class="language-filter-count filter-count-hidden" style="display:inline;">('.Experience::model()->findNumber($key,1).')</span>');

        }


        $duration = array(
        	  0=>'0 - 4 hours
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(0,2).')</span>',
        	  1=>'4 - 8 hours
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(1,2).')</span>',
        	  2=>'8 - 12 hours
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(2,2).')</span>',
        	  3=>'12 - 24 hours
        	      <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(3,2).')</span>',
        	  4=>'24 hours +
                  <span class="duration-filter-count filter-count-hidden" style="display: inline;">('.Experience::model()->findNumber(4,2).')</span>',
            );

        
        // /*if( count( $data ) > 0 )*/ { Yii::app()->session['rohan'] = $data; }

		$dataProvider=new CActiveDataProvider('Experience',
        array(
                'pagination'=>array('pageSize'=>9),
                'criteria'=>array(
                    'with'=>array(
                        'comments','fixedPrices','personPrices','tourPrices','user','user.UserDetail','user.guide'
                    ),
                    'together'=>true,
                ),
            )
        );

        Yii::app()->session['coo'] = Country::model()->lCollective();

        $this->render('index',array(
			'dataProvider'=>$dataProvider,
			'rating'=>$rating,
			'lang'=>$lang,
			'duration'=>$duration,
			'categories'=>$this->categories,
            'loclist' => Country::model()->lCollective(),
		));

	}

	
}

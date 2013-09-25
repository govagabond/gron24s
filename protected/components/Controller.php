<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $gender = array(
          'Male', 'Female'
		);

	public $currency = array(
          'INR' => 'Indian Rupees(INR)',
          'USD' => 'US Dollar(INR)',
          'EUR' => 'Euro(EUR)',
          'THB' => 'Thai Baht(THB)',
		);

  public $languages = array(
          array(0=>'English',1=>'flag-gb'),
          array(0=>'French',1=>'flag=-fr'),
          array(0=>'German',1=>'flag-de'),
          array(0=>'Russian',1=>'flag-ru'),
          array(0=>'Spanish',1=>'flag-es'),
          array(0=>'Portugese',1=>'flag-pt'),
          array(0=>'Italian',1=>'flag-it'),
          array(0=>'Chinese',1=>'flag-cn'),
          array(0=>'Japanese',1=>'flag-jp'),
          array(0=>'Korean',1=>'flag-kr'),
          array(0=>'Danish',1=>''),
          array(0=>'Dutch',1=>'flag-nl '),
          array(0=>'Arabic',1=>'flag-sa'),
          array(0=>'Malaysian',1=>''),
          array(0=>'Hindi',1=>'flag-in'),
          array(0=>'Korean',1=>''),
          array(0=>'Viatnamese',1=>'flag flag-vn'),
          array(0=>'Sinhalese',1=>''),
          array(0=>'Indonesian',1=>''),
          array(0=>'Filipino',1=>''),

    );

  public $categories = array('City','Cultural','Youth and Family','Religion and Spiritualism','Volunteer','Food and Wine','Art and Fashion','Water Based Activities','Sports and Related Activities','Nightlife','Photography and Films','Transcendental & Metaphysical','Shopping','Shore Excursions','Nature, Forestry & Wildlife','Hiking & Walking','Wellness','Trekking and Mountaineering','Rural Life');

	public function currencyCheck(){
      if(!isset(Yii::app()->session['currency']))
      {
        $this->actionCurrency();
      }
    }  

  public  function updateCache() {
      if(Yii::app()->request->getParam('cache', 'true') === 'false')
          Yii::app()->setComponent('cache', new CDummyCache());
  }

    public function currencyConvert($amount,$a,$b){
      
      Yii::import('ext.ECurrencyHelper');

      $cc = new ECurrencyHelper();
      return $cc->convert($a,$b,$amount); //ECurrencyHelper::USE_GOOGLE
    }  

	function get_ip_address() {
	    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
	        if (array_key_exists($key, $_SERVER) === true) {
	            foreach (explode(',', $_SERVER[$key]) as $ip) {
	                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
	                    return $ip;
	                }
	            }
	        }
	    }
	}

	public function actionCurrency()
	{
      Yii::import('ext.EGeoIP');
       
      $geoIp = new EGeoIP();
       
      $geoIp->locate('120.59.186.201'); // use your IP

      Yii::app()->session['currency'] = $geoIp->currencyCode;
      Yii::app()->session['currency_symbol'] = $geoIp->currencySymbol;
      Yii::app()->session['currency_rate'] = $this->currencyConvert(1,'USD',$geoIp->currencyCode);

      /*echo 'Information regarding IP: <b>'.$geoIp->ip.'</b><br/>';
      echo 'City: '.$geoIp->city.'<br>';
      echo 'Region: '.$geoIp->region.'<br>';
      echo 'Area Code: '.$geoIp->areaCode.'<br>';
      echo 'DMA: '.$geoIp->dma.'<br>';
      echo 'Country Code: '.$geoIp->countryCode.'<br>';
      echo 'Country Name: '.$geoIp->countryName.'<br>';
      echo 'Continent Code: '.$geoIp->continentCode.'<br>';
      echo 'Latitude: '.$geoIp->latitude.'<br>';
      echo 'Longitude: '.$geoIp->longitude.'<br>';
      echo 'Currency Symbol: '.$geoIp->currencySymbol.'<br>';
      echo 'Currency Code: '.$geoIp->currencyCode.'<br>';
      echo 'Currency Converter: '.$geoIp->currencyConverter.'<br/>';
       
      echo 'Converting $10.00 to '.$geoIp->currencyCode.': <b>'.$geoIp->currencyConvert(10).'</b><br/>';*/
	}

  public function langarray()
  {
    $language = array();
    foreach($this->languages as $lang)
    {
       array_push($language, $lang[0]);
    }
    
    return $language;
  }

  // 1 - facebook - web url
  // 2 - computer url

}
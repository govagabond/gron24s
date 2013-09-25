<?php

/**
 * This is the model class for table "experience".
 *
 * The followings are the available columns in table 'experience':
 * @property string $id
 * @property string $title
 * @property string $display_title
 * @property string $img_src
 * @property string $city
 * @property string $region
 * @property string $country
 * @property integer $max_people
 * @property string $duration
 * @property integer $handicap_friendly
 * @property integer $child_friendly
 * @property integer $cashneeded
 * @property string $cashneeded_purpose
 * @property string $inclusions
 * @property string $detailed_description
 * @property string $category
 * @property string $where_when
 * @property integer $is_custom
 * @property integer $cloneof_experience
 * @property integer $rate
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property BookedTour[] $bookedTours
 * @property Comment[] $comments
 * @property User $user
 * @property FixedPrice[] $fixedPrices
 * @property Image[] $images
 * @property PersonPrice[] $personPrices
 * @property TourPrice[] $tourPrices
 */
class Experience extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ex the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'experience';
	}

	public function findNumber($list,$a)
	{
		$criteria = new CDbCriteria;
		$criteria->with = array(
                        'user','user.guide');
        $criteria->together = true;
		
        if($a == 1)
		$criteria->compare('languages',$list,'OR');
        
        else if($a == 2)
        $criteria->compare('duration_category',$list,'OR');

		return $this->model()->count($criteria);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, display_title, img_src, city, region, country, max_people, duration, handicap_friendly, child_friendly, cashneeded, cashneeded_purpose, inclusions, detailed_description, category, where_when, cloneof_experience, rate, user_id', 'required'),
			array('max_people, handicap_friendly, child_friendly, cashneeded, is_custom, cloneof_experience, rate', 'numerical', 'integerOnly'=>true),
			array('title, city, region, country', 'length', 'max'=>100),
			array('display_title', 'length', 'max'=>60),
			array('img_src, cashneeded_purpose, category', 'length', 'max'=>255),
			array('duration', 'length', 'max'=>40),
			array('user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, display_title, img_src, city, region, country, max_people, duration, handicap_friendly, child_friendly, cashneeded, cashneeded_purpose, inclusions, detailed_description, category, where_when, is_custom, cloneof_experience, rate, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bookedTours' => array(self::HAS_MANY, 'BookedTour', 'experience_id'),
			'comments' => array(self::HAS_MANY, 'Comment', 'experience_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'fixedPrices' => array(self::HAS_ONE, 'FixedPrice', 'experience_id'),
			'images' => array(self::HAS_MANY, 'Image', 'experience_id'),
			'personPrices' => array(self::HAS_ONE, 'PersonPrice', 'experience_id'),
			'tourPrices' => array(self::HAS_ONE, 'TourPrice', 'experience_id'),
			'city' => array(self::BELONGS_TO, 'City', 'experience_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'display_title' => 'Display Title',
			'img_src' => 'Img Src',
			'city' => 'City',
			'region' => 'Region',
			'country' => 'Country',
			'max_people' => 'Max People',
			'duration' => 'Duration',
			'handicap_friendly' => 'Handicap Friendly',
			'child_friendly' => 'Child Friendly',
			'cashneeded' => 'Cashneeded',
			'cashneeded_purpose' => 'Cashneeded Purpose',
			'inclusions' => 'Inclusions',
			'detailed_description' => 'Detailed Description',
			'category' => 'Category',
			'where_when' => 'Where When',
			'is_custom' => 'Is Custom',
			'cloneof_experience' => 'Cloneof Experience',
			'rate' => 'Rating',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('display_title',$this->display_title,true);
		$criteria->compare('img_src',$this->img_src,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('max_people',$this->max_people);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('handicap_friendly',$this->handicap_friendly);
		$criteria->compare('child_friendly',$this->child_friendly);
		$criteria->compare('cashneeded',$this->cashneeded);
		$criteria->compare('cashneeded_purpose',$this->cashneeded_purpose,true);
		$criteria->compare('inclusions',$this->inclusions,true);
		$criteria->compare('detailed_description',$this->detailed_description,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('where_when',$this->where_when,true);
		$criteria->compare('is_custom',$this->is_custom);
		$criteria->compare('cloneof_experience',$this->cloneof_experience);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
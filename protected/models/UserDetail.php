<?php

/**
 * This is the model class for table "user_detail".
 *
 * The followings are the available columns in table 'user_detail':
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $gender
 * @property string $dob
 * @property string $location
 * @property integer $country_code
 * @property integer $mobile_number
 * @property string $home_number
 * @property string $alternative_number
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserDetail extends CActiveRecord
{
	public $terms;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserDetail the static model class
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
		return 'user_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, dob,location, country_code, mobile_number', 'required'),
			array('gender, country_code, mobile_number,zipcode', 'numerical', 'integerOnly'=>true), //home_number, alternative_number,
			array('first_name, last_name', 'length', 'max'=>70),
			array('location,address', 'length', 'max'=>255),
			array('home_number, user_id', 'length', 'max'=>10),
			array('alternative_number', 'length', 'max'=>11),
			array('image_url', 'url', 'validSchemes'=>array('http', 'https')),
			array('terms', 'safe'),
			array('terms', 'required','message'=>'^ Please accept the terms and conditions & privacy policy to continue.'),
            
			//array('image_source','safe'),
			array('image_source','file', 'types'=>'jpg, gif, png','safe'=>true),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, gender, dob, location, country_code, mobile_number, home_number, alternative_number, user_id', 'safe', 'on'=>'search'),
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
			'User' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'gender' => 'Gender',
			'dob' => 'Dob',
			'location' => 'Location',
			'country_code' => 'Extension',
			'mobile_number' => 'Mobile Number',
			'home_number' => 'Home Number',
			'alternative_number' => 'Alternative Number',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('country_code',$this->country_code);
		$criteria->compare('mobile_number',$this->mobile_number);
		$criteria->compare('home_number',$this->home_number,true);
		$criteria->compare('alternative_number',$this->alternative_number,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
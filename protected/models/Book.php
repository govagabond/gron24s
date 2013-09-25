<?php

/**
 * This is the model class for table "booked_tour".
 *
 * The followings are the available columns in table 'booked_tour':
 * @property string $id
 * @property integer $people
 * @property integer $price_plan
 * @property string $date
 * @property string $start_time
 * @property string $meeting_details
 * @property string $experience_id
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property Experience $experience
 * @property User $user
 */
class Book extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Book the static model class
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
		return 'booked_tour';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('people, price_plan, date, start_time, meeting_details, experience_id, user_id', 'required'),
			array('people, price_plan', 'numerical', 'integerOnly'=>true),
			array('date, start_time', 'length', 'max'=>50),
			array('meeting_details', 'length', 'max'=>255),
			array('experience_id, user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, people, price_plan, date, start_time, meeting_details, experience_id, user_id', 'safe', 'on'=>'search'),
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
			'experience' => array(self::BELONGS_TO, 'Experience', 'experience_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'people' => 'People',
			'price_plan' => 'Price Plan',
			'date' => 'Date',
			'start_time' => 'Start Time',
			'meeting_details' => 'Meeting Details',
			'experience_id' => 'Experience',
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
		$criteria->compare('people',$this->people);
		$criteria->compare('price_plan',$this->price_plan);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('meeting_details',$this->meeting_details,true);
		$criteria->compare('experience_id',$this->experience_id,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
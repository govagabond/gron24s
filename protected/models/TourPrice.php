<?php

/**
 * This is the model class for table "tour_price".
 *
 * The followings are the available columns in table 'tour_price':
 * @property string $id
 * @property integer $base_price
 * @property integer $per_person
 * @property string $experience_id
 *
 * The followings are the available model relations:
 * @property Experience $experience
 */
class TourPrice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TourPrice the static model class
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
		return 'tour_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('base_price, per_person, experience_id', 'required'),
			array('base_price, per_person', 'numerical', 'integerOnly'=>true),
			array('experience_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, base_price, per_person, experience_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'base_price' => 'Base Price',
			'per_person' => 'Per Person',
			'experience_id' => 'Experience',
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
		$criteria->compare('base_price',$this->base_price);
		$criteria->compare('per_person',$this->per_person);
		$criteria->compare('experience_id',$this->experience_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property integer $group
 * @property integer $is_activated
 * @property string $created
 *
 * The followings are the available model relations:
 * @property UserDetail[] $userDetails
 */
class User extends CActiveRecord
{
	 public $password_repeat;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('group, is_activated', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>255),
            array('username', 'unique'),
			array('username', 'email'),
			array('password_repeat', 'safe'),
			//array('password', 'compare','compareAttribute' => 'password_repeat','message'=>'Passwords do not match.'),
			array('password_repeat', 'compare','compareAttribute' => 'password','message'=>'Passwords do not match.'),
			// array('password_repeat', 'required'), 
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, group, is_activated, created', 'safe', 'on'=>'search'),
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
            'bookedTours' => array(self::HAS_MANY, 'BookedTour', 'user_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
            'experiences' => array(self::HAS_MANY, 'Experience', 'user_id'),
            'guide' => array(self::HAS_ONE, 'Guide', 'user_id'),
            'UserDetail' => array(self::HAS_ONE, 'UserDetail', 'user_id'),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'group' => 'Group',
			'is_activated' => 'Is Activated',
			'created' => 'Created',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('group',$this->group);
		$criteria->compare('is_activated',$this->is_activated);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property string $id
 * @property string $subject
 * @property string $body`
 * @property integer $from_userid
 * @property integer $to_userid
 * @property integer $is_read
 * @property integer $is_draft
 * @property string $sent_date
 */
class Message extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
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
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, body, from_userid, to_userid, is_read, is_draft', 'required'),
			array('from_userid, to_userid, is_read, is_draft', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>355),
			array('sent_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subject, body, from_userid, to_userid, is_read, is_draft, sent_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject' => 'Subject',
			'body' => 'Body',
			'from_userid' => 'From Userid',
			'to_userid' => 'To Userid',
			'is_read' => 'Is Read',
			'is_draft' => 'Is Draft',
			'sent_date' => 'Sent Date',
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
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('from_userid',$this->from_userid);
		$criteria->compare('to_userid',$this->to_userid);
		$criteria->compare('is_read',$this->is_read);
		$criteria->compare('is_draft',$this->is_draft);
		$criteria->compare('sent_date',$this->sent_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
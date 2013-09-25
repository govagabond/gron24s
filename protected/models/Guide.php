<?php

/**
 * This is the model class for table "guide".
 *
 * The followings are the available columns in table 'guide':
 * @property string $id
 * @property string $skype
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $brief_profile
 * @property string $languages
 * @property string $reference_1_name
 * @property string $reference_2_name
 * @property string $reference_1_email
 * @property string $reference_2_email
 * @property string $expertise
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Guide extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guide the static model class
	 */
	//public $languagearray;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'guide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skype, facebook, twitter, linkedin, brief_profile, languages, reference_1_name, reference_2_name, reference_1_email, reference_2_email, expertise, user_id', 'required'),
			array('skype', 'length', 'max'=>30),
			array('facebook, twitter, linkedin, reference_1_email, reference_2_email', 'length', 'max'=>100),
			array('reference_1_email,reference_2_email', 'email'),
			array('brief_profile', 'length', 'max'=>250),
			array('reference_1_name, reference_2_name', 'length', 'max'=>255),
			array('user_id', 'length', 'max'=>10),
			//array('languagearray', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, skype, facebook, twitter, linkedin, brief_profile, languages, reference_1_name, reference_2_name, reference_1_email, reference_2_email, expertise, user_id', 'safe', 'on'=>'search'),
		);
	}

	// public function afterFind() {
	//   $this->languagearray=explode(',',$this->languages);
	// }

	// public function beforeSave() {
	//   $this->languagearray=implode(',',$this->languages);
	// }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
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
			'skype' => 'Skype',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'linkedin' => 'Linkedin',
			'brief_profile' => 'Brief introduction',
			'languages' => 'Languages Spoken',
			'reference_1_name' => 'Reference 1 Name',
			'reference_2_name' => 'Reference 2 Name',
			'reference_1_email' => 'Reference 1 Email',
			'reference_2_email' => 'Reference 2 Email',
			'expertise' => 'Travel Experience',
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
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('brief_profile',$this->brief_profile,true);
		$criteria->compare('languages',$this->languages,true);
		$criteria->compare('reference_1_name',$this->reference_1_name,true);
		$criteria->compare('reference_2_name',$this->reference_2_name,true);
		$criteria->compare('reference_1_email',$this->reference_1_email,true);
		$criteria->compare('reference_2_email',$this->reference_2_email,true);
		$criteria->compare('expertise',$this->expertise,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
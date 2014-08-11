<?php

/**
 * This is the model class for table "{{provinces}}".
 *
 * The followings are the available columns in table '{{provinces}}':
 * @property integer $id
 * @property string $provinceid
 * @property string $province
 * @property string $shortname
 */
class Provinces extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Provinces the static model class
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
		return '{{provinces}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('provinceid, province', 'required'),
			array('provinceid', 'length', 'max'=>20),
			array('province', 'length', 'max'=>50),
			array('shortname', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, provinceid, province, shortname', 'safe', 'on'=>'search'),
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
			'provinceid' => 'Provinceid',
			'province' => 'Province',
			'shortname' => 'Shortname',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('provinceid',$this->provinceid,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('shortname',$this->shortname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
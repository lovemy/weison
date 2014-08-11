<?php

/**
 * This is the model class for table "{{areas}}".
 *
 * The followings are the available columns in table '{{areas}}':
 * @property integer $id
 * @property string $areaid
 * @property string $area
 * @property string $cityid
 */
class Areas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Areas the static model class
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
		return '{{areas}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('areaid, area, cityid', 'required'),
			array('areaid, cityid', 'length', 'max'=>20),
			array('area', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, areaid, area, cityid', 'safe', 'on'=>'search'),
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
			'areaid' => 'Areaid',
			'area' => 'Area',
			'cityid' => 'Cityid',
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
		$criteria->compare('areaid',$this->areaid,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('cityid',$this->cityid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
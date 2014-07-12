<?php

/**
 * This is the model class for table "{{site_setting}}".
 *
 * The followings are the available columns in table '{{site_setting}}':
 * @property integer $id
 * @property string $frontend_icon
 * @property string $frontend_logo
 * @property string $backend_icon
 * @property string $backend_logo
 * @property string $frontend_name
 * @property string $backend_name
 * @property string $copyright
 */
class SiteSetting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SiteSetting the static model class
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
		return '{{site_setting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('frontend_icon, frontend_logo, backend_icon, backend_logo, frontend_name, backend_name, copyright', 'required'),
			array('frontend_icon, frontend_logo, backend_icon, backend_logo, frontend_name, backend_name', 'length', 'max'=>128),
			array('copyright', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, frontend_icon, frontend_logo, backend_icon, backend_logo, frontend_name, backend_name, copyright', 'safe', 'on'=>'search'),
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
			'frontend_icon' => '网站前台图标',
			'frontend_logo' => '网站前台Logo',
			'backend_icon' => '网站后台图标',
			'backend_logo' => '网站后台Logo',
			'frontend_name' => '网站前台标题',
			'backend_name' => '网站后台标题',
			'copyright' => '网站版权信息',
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
		$criteria->compare('frontend_icon',$this->frontend_icon,true);
		$criteria->compare('frontend_logo',$this->frontend_logo,true);
		$criteria->compare('backend_icon',$this->backend_icon,true);
		$criteria->compare('backend_logo',$this->backend_logo,true);
		$criteria->compare('frontend_name',$this->frontend_name,true);
		$criteria->compare('backend_name',$this->backend_name,true);
		$criteria->compare('copyright',$this->copyright,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
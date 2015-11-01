<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property string $gender
 * @property string $birthday
 * @property integer $height
 * @property integer $weight
 * @property string $blood_type
 * @property string $ceallphone
 * @property string $personal_id
 * @property string $photo
 * @property integer $nationality
 * @property integer $race
 * @property integer $religion
 * @property string $skill
 * @property double $salary
 * @property integer $department_id
 * @property integer $user_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 * @property string $tumbon_id
 * @property string $aumphur_id
 * @property string $province_id
 */
class Employee extends \yii\db\ActiveRecord
{
    public function getFullname(){
      return $this->title.$this->name.' '.$this->surname;
    }

    public function behaviors()
    {
      return [
          TimestampBehavior::className(),
          BlameableBehavior::className(),
      ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender'], 'string'],
            [['birthday'], 'safe'],
            [['height', 'weight', 'nationality', 'race', 'religion', 'department_id', 'user_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['salary'], 'number'],
            [['title'], 'string', 'max' => 100],
            [['name', 'surname'], 'string', 'max' => 150],
            [['blood_type'], 'string', 'max' => 10],
            [['ceallphone'], 'string', 'max' => 15],
            [['personal_id'], 'string', 'max' => 17],
            [['photo'], 'string', 'max' => 120],
            [['skill'], 'string', 'max' => 255],
            [['tumbon_id', 'aumphur_id', 'province_id'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname'=>'ชื่อ-นามสกุล',
            'title' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'surname' => 'นามสกุล',
            'gender' => 'เพศ',
            'genderName' => 'เพศ',
            'birthday' => 'วันเกิด',
            'height' => 'ส่วนสูง',
            'weight' => 'น้ำหนัก',
            'blood_type' => 'กรุ๊ฟเลือด',
            'ceallphone' => 'เบอร์โทร',
            'personal_id' => 'หมายเลขบัตรประชาชน',
            'photo' => 'ภาพถ่าย',
            'nationality' => 'สัญชาติ',
            'race' => 'เชื้อชาติ',
            'religion' => 'ศาสนา',
            'skill' => 'ทักษะ',
            'salary' => 'เงินเดือน',
            'department_id' => 'แผนก',
            'user_id' => 'รหัส account พนักงาน',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'tumbon_id' => 'Tumbon ID',
            'aumphur_id' => 'Aumphur ID',
            'province_id' => 'Province ID',
        ];
    }

    /**
     * @inheritdoc
     * @return EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeQuery(get_called_class());
    }

    public function itemAlias($type){
      $items = [
        'gender'=> [
          'm'=>'ชาย',
          'w'=>'หญิง'
        ],
        'bloodType' => [
          'a' => 'A',
          'o' => 'O',
          'ab' => 'AB',
          'b' => 'B'
        ]
      ];
      return array_key_exists($type, $items) ?  $items[$type] : [];
    }

    public function getGenderName(){
      $items = $this->itemAlias('gender');
      return array_key_exists($this->gender, $items) ? $items[$this->gender] : null;
    }

}

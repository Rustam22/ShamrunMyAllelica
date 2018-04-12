<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "join_user_barcode".
 *
 * @property integer $user_barcode_id
 * @property integer $user_index
 * @property string $barcode_index
 * @property string $date
 *
 * @property User $userIndex
 */
class JoinUserBarcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'join_user_barcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_index', 'barcode_index', 'date'], 'required'],
            [['user_index'], 'integer'],
            [['date'], 'safe'],
            [['barcode_index'], 'safe'],
            [['barcode_index'], 'trim'],
            [['barcode_index'], 'string', 'max' => 80],
            [['user_index'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_index' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_barcode_id' => 'User Barcode ID',
            'user_index' => 'User Index',
            'barcode_index' => 'Barcode Index',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIndex()
    {
        return $this->hasOne(User::className(), ['id' => 'user_index']);
    }
}

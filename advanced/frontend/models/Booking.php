<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property integer $id
 * @property integer $user_index
 * @property string $booking_info
 * @property string $date
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_index', 'booking_info', 'date'], 'required'],
            [['user_index'], 'integer'],
            [['date'], 'safe'],
            [['booking_info'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_index' => 'User Index',
            'booking_info' => 'Booking Info',
            'date' => 'Date',
        ];
    }
    public static function existBooking() {
        $connection = \Yii::$app->db;
        $model = $connection->createCommand(" SELECT * from booking where user_index = " .Yii::$app->user->identity->id);
        $user = $model->queryAll();
        return $user;
    }
}

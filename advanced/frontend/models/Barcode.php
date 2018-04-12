<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "barcode".
 *
 * @property integer $barcode_id
 * @property string $code
 * @property string $status
 *
 * @property JoinUserBarcode[] $joinUserBarcodes
 */
class Barcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'status'], 'required'],
            [['status'], 'string'],
            [['code'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'barcode_id' => 'Barcode ID',
            'code' => 'Code',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getJoinUserBarcodes()
    {
        return $this->hasMany(JoinUserBarcode::className(), ['barcode_index' => 'code']);
    }*/
    public static function changeStatus($barcode) {
        $barcode = (string)$barcode;
        $connection = \Yii::$app->db;

        return $connection->createCommand("UPDATE barcode SET status='registred' WHERE code=:code" )->bindParam(':code',$barcode)->execute();
    }
    public function joinUserWithBarcode($barcode,$user_id) {
        $barcode = (string)$barcode;
        $connection = \Yii::$app->db;
        return $connection->createCommand("INSERT INTO join_user_barcode (user_index,barcode_index) VALUES (:barcode, :user_id)")->bindParam(':barcode',$barcode)->bindParam(':user_id',$user_id)->execute();
    }
    public static function existBarcode() {
        $connection = \Yii::$app->db;
        $model = $connection->createCommand(" SELECT * from join_user_barcode where user_index = :id ")->bindValue(":id",Yii::$app->user->identity->id);
        $user = $model->queryAll();
        return $user;
    }
    public static function checkBarcode($barcode){
        $connection = \Yii::$app->db;
        $model = $connection->createCommand(" SELECT * from barcode where code = :code and status='ready' ")->bindValue(":code",$barcode);
        $user = $model->queryAll();
        return $user;
    }


}
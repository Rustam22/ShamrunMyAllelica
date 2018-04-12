<?php
/**
 * Created by PhpStorm.
 * User: shamrun
 * Date: 03/04/18
 * Time: 12.45
 */

namespace frontend\models;


class AdminModel
{
    public static function actionBarcodecheck(){
        $connection = \Yii::$app->db;
        $model = $connection->createCommand("select first_name,last_name,username,barcode_index from user inner join join_user_barcode where user.id = join_user_barcode.user_index");
        $user = $model->queryAll();
        return $user;
    }

}
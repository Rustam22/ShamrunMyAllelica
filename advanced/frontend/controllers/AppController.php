<?php
/**
 * Created by PhpStorm.
 * User: rustam
 * Date: 25.01.18
 * Time: 15:16
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;


class AppController extends Controller {

    public function sendMail($email, $product) {
        return Yii::$app->mailer->compose()
                                ->setFrom(Yii::$app->params['mail']['from'])
                                ->setTo(Yii::$app->params['mail']['emails'])
                                ->setSubject($product)
                                ->setTextBody('User email address: ')
                                ->setHtmlBody('<h2><b>email: '.$email.'</b></h2>')
                                ->send();
    }

    public function generateRandomString($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

// update barcode right join join_user_barcode on barcode.code = join_user_barcode.barcode_index set barcode.status = "registred"
// select * from barcode right join join_user_barcode on barcode.code = join_user_barcode.barcode_index
// select * from barcode right join join_user_barcode on barcode.code = join_user_barcode.barcode_index ORDER BY `join_user_barcode`.`user_index` ASC
// SELECT username,booking.booking_info FROM user left join booking on user.id = booking.user_index
// select * from barcode left join join_user_barcode on barcode.code = join_user_barcode.barcode_index ORDER BY `join_user_barcode`.`user_index` ASC




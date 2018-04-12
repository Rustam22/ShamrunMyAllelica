<?php
/**
 * Created by PhpStorm.
 * User: shamrun
 * Date: 03/04/18
 * Time: 12.40
 */

namespace frontend\controllers;

use frontend\models\Barcode;
use frontend\models\Booking;
use frontend\models\JoinUserBarcode;
use frontend\models\PanelText;
//use http\Env\Url;
use Yii;
use yii\web\Controller;
use frontend\models\AdminModel;
use yii\helpers\Url;


class UserdetailsController extends Controller{

    //all admin functionality
    public function actionBarcode($barcode) {



        $model = new JoinUserBarcode();

        if(Yii::$app->request->get()){

            $barcode_check = Barcode::checkBarcode($barcode);


            if(!empty($barcode_check)) {

                $model->user_index = Yii::$app->user->identity->id;
                $model->barcode_index = $barcode;
                $model->date = date("Y-m-d");


                if( $model->validate()){

                    $model->save();

                    Barcode::changeStatus($barcode);

                    return $this->goHome();

                }

            } else {

                return $this->goHome();

            }

        }

    }


    //barcode-user checking
    public function actionBooking($booking) {


        echo $booking;

        $model = new Booking();

        if(Yii::$app->request->get()){

            $model->user_index = Yii::$app->user->identity->id;
            $model->booking_info = "done";
            $model->date = date($booking);

            if( $model->validate()){

                $model->save();

                return $this->goHome();


            } else {

                return $this->goHome();
            }

        }
    }
    public function actionTest() {

        $barcode = Barcode::existBarcode();

        if (empty($barcode)){
            echo "ho";
        }else{
            echo "bo";
        }
    }

    public function actionTest2() {

        $booking = Booking::existBooking();

        if (empty($booking)){
            echo "ho";
        }else{
            echo "bo000";
        }
    }

}
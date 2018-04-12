<?php
/**
 * Created by PhpStorm.
 * User: shamrun
 * Date: 03/04/18
 * Time: 12.40
 */

namespace frontend\controllers;

use frontend\models\Barcode;
use frontend\models\PanelText;
use Yii;
use yii\web\Controller;
use frontend\models\AdminModel;


class AdminController extends Controller{

    //all admin functionality
    public function actionIndex(){
        return $this->render('base',[
            'result' => "done",
        ]);
    }


    //barcode-user checking
    public function actionBarcodecheck(){
        $result = AdminModel::actionBarcodecheck();
        //print_r($result);
        return $this->render('barcode',[
            'result' => $result,
        ]);
    }
    public function actionTest(){
        $barcode = Barcode::existBarcode();
        if (empty($barcode)){
            echo "ho";
        }else{
            echo "bo";
        }
    }

}
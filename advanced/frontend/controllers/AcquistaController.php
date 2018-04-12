<?php
/**
 * Created by PhpStorm.
 * User: rustam
 * Date: 24.01.18
 * Time: 15:23
 */

namespace frontend\controllers;

use Yii;
use frontend\models\SignupForm;
use frontend\models\ProductPayment;
use frontend\models\BarcodeControl;
use frontend\models\Barcode;
use yii\db\Exception;


class AcquistaController extends AppController {

    private $nutrizionePrice  = 169;
    private $nutrizioneId     = 1;

    private $prevenzionePrice = 169;
    private $prevenzioneId    = 2;

    private $acquistaPrice = 249;
    private $acquistaId    = 3;

    private $context = array();


    public function actionIndex() {
        return $this->redirect(['acquista/acquistabuy']);
    }


    public function actionAcquistabuy() {
        return $this->render('acquista', ['info' => 'Main acquista', 'price' => $this->acquistaPrice, 'status' => 'buy']);
    }

    public function actionAcquistapayment() {
        $model = new ProductPayment();
        $this->context['price']  = $this->acquistaPrice;
        $this->context['status'] = 'payment';
        $this->context['info']   = 'Main acquista';
        $this->context['model']  = $model;
        $this->context['condition'] = '';

        if ($model->load(Yii::$app->request->post())) {

            $model->product_id = $this->acquistaId;
            $model->price = $this->acquistaPrice;

            if($model->save()) {

                if($this->sendMail(Yii::$app->request->post()['ProductPayment']['email'], 'Pacchetto Completo')) {
                ///if(mail("rustam.atakisiev@gmail.com","My subject",'sdfsdfsdfsd')) {
                    $this->context['condition'] = 'dataSaveSuccessEmailSuccess';
                } else {
                    $this->context['condition'] = 'dataSaveSuccessEmailError';
                }

                return $this->render('acquista', $this->context);
            } else {
                $this->context['condition'] = 'dataSaveError';
                return $this->render('acquista', $this->context);
            }
        } else {
            $this->context['condition'] = 'postDoesNotExists';
            return $this->render('acquista', $this->context);
        }
    }


    public function actionAcquistabarcode() {
        $barcodemodel = new BarcodeControl();

        $this->context['status'] = 'barcode';
        $this->context['info']   = 'Acquista barcode';
        $this->context['model']  = $barcodemodel;
        $this->context['condition'] = '';

        if ($barcodemodel->load(Yii::$app->request->post())) {
            $barcodes = Barcode::find()->all();

            foreach($barcodes as $barcode){
                if(in_array("$barcodemodel->barcode", (array)$barcode['code']) ){

                    if($barcode['status'] == 'ready') {
                        $encryptedData = Yii::$app->getSecurity()->encryptByPassword($barcodemodel->barcode, Yii::$app->params['key']['value']);

                        return $this->redirect(['acquista/acquistaregister', 'code' => $encryptedData]);
                    } else {
                        $this->context['model']  = $barcodemodel;
                        $this->context['barcodes']  = $barcodes;
                        $this->context['condition'] = 'wrongBarcode';

                        return $this->render('acquista', $this->context);
                    }
                }
            }

            $this->context['model']  = $barcodemodel;
            $this->context['barcodes']  = $barcodes;
            $this->context['condition'] = 'wrongBarcode';
            return $this->render('acquista', $this->context);
        }

        $this->context['condition'] = 'new';
        return $this->render('acquista', $this->context);
    }


    public function actionAcquistaregister() {

        if(isset(Yii::$app->request->get()['code'])) {
            $decryptedBarcode = Yii::$app->getSecurity()->decryptByPassword(Yii::$app->request->get()['code'], Yii::$app->params['key']['value']);
            $barcodeExists = Barcode::find()->where(['code' => $decryptedBarcode.''])->andWhere(['status' => 'ready'])->exists();

             if($barcodeExists) {
                $signModel = new SignupForm();

                if ($signModel->load(Yii::$app->request->post())) {
                    if ($user = $signModel->signup()) {
                        if (Yii::$app->getUser()->login($user)) {
                            //Barcode::changeStatus($decryptedBarcode);
                            /*Barcode::joinUserWithBarcode($decryptedBarcode,Yii::$app->user->identity->id);*/

                            return $this->goHome();
                        }
                    }
                }
                return $this->render('acquista', ['model' => $signModel, 'info' => 'Main acquista', 'price' => $this->acquistaPrice, 'status' => 'register']);
            }
            return $this->redirect(['acquista/acquistabarcode']);
        }

        return $this->redirect(['acquista/acquistabarcode']);
    }


    public function actionNutrizione() {
        return $this->render('nutrizione', ['info' => 'Nutrizione', 'price' => '169']);
    }

    public function actionPrevenzione() {
        return $this->render('prevenzione', ['info' => 'Prevenzione', 'price' => '169']);
    }

}
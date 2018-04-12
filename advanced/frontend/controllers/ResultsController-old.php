<?php
/**
 * Created by PhpStorm.
 * User: mahmu
 * Date: 1/29/2018
 * Time: 6:47 AM
 */

namespace frontend\controllers;

use frontend\models\User;
use frontend\models\Panel;
use frontend\models\PanelText;
use frontend\models\Product;
use frontend\models\JoinUserPanel;
use Yii;
use Yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class ResultsController extends AppController
{
    private $status ;
    public static $array_result;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['panel_text', 'index'],
                'rules' => [
                    [
                        'actions' => ['panel_text'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex($product) {
        $this->status =  "panel";
        $final_array = Yii::$app->helper->main_function($product);
        return $this->render('panel',['result' => $final_array , 'status' => 'panel',  'product' =>  $product]);
    }
    public function actionPanel_text($panel,$product){

        $this->status  = "result";
        if(Yii::$app->request->isAjax) {
            $panel = $_GET['panel'];
            $product  = $_GET['product'];
            $text = User::getUserPanel_PaneltextbyUserId(Yii::$app->user->identity->id);
            $data = User::getUserPanel_PaneldataUserId(Yii::$app->user->identity->id);
            $score = User::getUserPanel_ScorebyUserId(Yii::$app->user->identity->id);
            $username = Yii::$app->user->identity->first_name;
            $final_array = Yii::$app->helper->main_function($product);
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            echo '<pre>'; print_r($score[$panel]); echo '</pre>';
            return [
                'score' => 'dfdfdf',
                'base_text'  => $text[$panel],
                'panel_data' => $data[$panel],
                'final_array' => $final_array,
                'first_name'  => $username,
            ];
        }
        $final_array = Yii::$app->helper->main_function($product);
        $panel_text  =  User::getUserPanel_PaneltextbyUserId(Yii::$app->user->identity->id);
        return $this->render('panel',['status'  => 'result', 'result' => $final_array,'panel_text' => $panel_text,'product' => $product]);
    }
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionTest()
    {
        $result = User::getUserPanelsbyUserId(Yii::$app->user->identity->id);
        print_r($result);
        echo "<br>";
        $result1 = User::getUserProductsbyUserId(Yii::$app->user->identity->id);
        print_r($result1);
        echo "<br>";
        $result2 = Product::getProductPanelsbyProductName('Prevenzione');
        print_r($result2);
        $result3 = User::getUserPanelsbyProduct($result,$result2);
        echo "<br>";
        print_r($result3);
        $result4 = User::getUserPanel_ScorebyUserId(Yii::$app->user->identity->id);
        echo "<br>";
        print_r($result4);
        $result5 = User::getUserPanel_PaneltextbyUserId(Yii::$app->user->identity->id);
        echo "<br>";
        print_r($result5);
        /*$result6 = User::getUserPanel_PaneldataUserId(Yii::$app->user->identity->id);
        echo "<br>";
        print_r($result6);*/
        $result6 = User::getUserResult($result4);
        echo "<br>";
        print_r($result6);
        Yii::$app->helper->welcome();
    }
}
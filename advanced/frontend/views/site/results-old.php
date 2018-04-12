<?php
/**
 * Created by PhpStorm.
 * User: rustam
 * Date: 08.02.18
 * Time: 13:54
 */


use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Biometrics;

?>



<?php if($status == "begin"){ ?>

    <style>
        .jumbotron {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        @media screen and (max-width: 700px) {
            .middlie-block  {
                width: 95% !important;
            }
            .btn-success, .btn-primary  {
                float: none !important;
                width: 95% !important;
                margin-right: 10px !important;
                margin-left: 10px !important;
                margin-top: 15px !important;
            }
            .btn-success {
                margin-top: 35px;
            }
        }
	.piano {
		background-color: #ff671f !important;
		border-color: #ff671f !important;
	}
	.piano:hover {
		background-color: #ff7332 !important;
	}
    </style>

    <div class="container">
        <br>
        <div class="row" style="text-align:center;">
	        <img src="<?php echo Yii::$app->homeUrl; ?>allelica/images/yoga.jpg" style="width: 100%;">
        </div>



        <div class="row col-md middlie-block" style="width: 75%;margin: auto;margin-bottom: 150px;">
                <h1 class="blue" style="color:rgba(27,168,183,.9) !important;text-align: center;font-size: 26px;padding: 0px 16px;font-weight: 500;line-height: 42px;margin-top:20px;">
                    Sei ad un click dal conoscere il tuo DNA, esplora subito il tuo Genoma!
                </h1>
            <a href="<?php echo Yii::$app->homeUrl; ?>results?product=Nutrizione" style="font-size: 27px!important;margin-top: 35px;width: 30%;
    border-radius: 7px;float: left;" class="btn btn-success btn-lg active" role="button" aria-pressed="true">
                Nutrizione
            </a>
            <a href="<?php echo Yii::$app->homeUrl; ?>results?product=Prevenzione" style="font-size: 27px!important;width: 30%;
    border-radius: 7px;margin-top: 35px;float: right;" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                Prevenzione
            </a>
	<a href="<?php echo Yii::$app->homeUrl; ?>results?product=Nutrizione" style="font-size: 27px!important;margin-top: 35px;width: 30%;
    border-radius: 7px;float: left;margin-left:5%" class="btn btn-success btn-lg active piano" role="button" aria-pressed="true">
                Piano nutrizionale
            </a>


        </div>

    </div>

<?php } ?>


<?php if($status == "super"){ ?>

    <style>
        .jumbotron {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        @media screen and (max-width: 700px) {
            .middlie-block  {
                width: 95% !important;
            }
            .btn-success, .btn-primary  {
                float: none !important;
                width: 95% !important;
                margin-right: 10px !important;
                margin-left: 10px !important;
                margin-top: 15px !important;
            }
            .btn-success {
                margin-top: 35px;
            }
        }
    </style>

    <div class="container">
        <div class="row col-md middlie-block" style="width: 75%;margin: auto;margin-bottom: 150px;">
            <h1 class="blue" style="color:rgba(27,168,183,.9) !important;text-align: center;font-size: 26px;padding: 0px 16px;font-weight: 500;line-height: 42px;margin-top:20px;">
                <?php echo(Yii::$app->user->identity->first_name); ?>
            </h1>
            <h1 class="blue" style="color:rgba(27,168,183,.9) !important;text-align: center;font-size: 26px;padding: 0px 16px;font-weight: 500;line-height: 42px;margin-top:20px;">
                <?php foreach($users as $user) {
                            echo($user['first_name']);
                            echo " ";
                            echo($user['last_name']);
                            echo "<br>";
                    $link_nutrizione = Yii::$app->homeUrl."super/index?user_id=".$user['id']."&product=Nutrizione";
                    $link_prevenzione = Yii::$app->homeUrl."super/index?user_id=".$user['id']."&product=Prevenzione";
                    echo "<a href='"  .$link_nutrizione."'>Nutrizione</a>";
                    echo "<a href='"  .$link_prevenzione."'>Prevenzione</a>";
                    echo "<br>";
    }
                    ?>
            </h1>
        </div>
    </div>

<?php } ?>

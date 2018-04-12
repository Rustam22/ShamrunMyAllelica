

<!DOCTYPE html>
<html>
    <head>
        <style>
            .first-div{
                margin-top: 70px;
            }
            button{
                margin-top: 30px;
            }
            h1{
                text-align: center;
            }
        </style>
    </head>


    <body>


    <div class="container">

        <div class="first-div">

            <h1> Welcome to Allelica Admin Panel</h1>

            <button type="button" class="btn btn-secondary btn-lg btn-block"><a href="<?php echo Yii::$app->homeUrl; ?>admin/barcodecheck">Users and Barcode</a> </button>
        </div>

    </div>

    </body>
</html>


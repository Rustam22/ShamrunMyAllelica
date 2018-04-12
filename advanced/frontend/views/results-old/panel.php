<?php
/**
 * Created by PhpStorm.
 * User: rustam
 * Date: 24.01.18
 * Time: 13:07
 */

$this->title = 'Home';


use yii\helpers\Url;
use yii\bootstrap\Html;

?>



<?php if($status == "panel") {
    $this->params['breadcrumbs'][] = 'Results';
    ?>
<div class="for-results">

    <link href="<?php echo Yii::$app->homeUrl; ?>allelica/css/results.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function () {

        })
    </script>


    <div class="container">

        <div class="row">
            <div class="jumbotron">
                <h1 class="blue" style="color:rgba(27,168,183,.9) !important;text-align: center;font-size: 25px;padding: 0px 16px;font-weight: 500;line-height: 42px;">
                    Questo Sono IO Tuo Risultati Clicca Sub Risultato Che Vuoi Esplerare Per Scoprire Paggiori Dettagli
                </h1>
            </div>
        </div>

        <!--small cards-->
        <div class="row" style="background-color: #eaeaea;border-radius: 5px;margin-top: 35px;padding-bottom: 55px;">


            <?php foreach ($result as $key => $value) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">

                            <div class="card-header-blue">
                                <h1 class="card-heading">
                                    <a href="<?php echo Yii::$app->homeUrl; ?>results/panel_text?panel=<?php echo $key;?>&product=<?php echo $product;?>">
                                        <?php echo $key; ?>
                                    </a>
                                </h1>
                            </div>

                            <div class="card-body">
                                <p class="card-p <?php echo $value; ?>">
                                    You have <?php echo $value; ?> risk
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php /*foreach ($result as $key => $value) { */?><!--
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">

                            <div class="card-header-blue">
                                <h1 class="card-heading">
                                    <a href="<?php /*echo Yii::$app->homeUrl; */?>results/panel_text?panel=<?php /*echo $key;*/?>&product=<?php /*echo $product;*/?>">
                                        <?php /*echo $key; */?>
                                    </a>
                                </h1>
                            </div>

                            <div class="card-body">
                                <p class="card-p <?php /*echo $value; */?>">
                                    You have <?php /*echo $value; */?> risk
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            --><?php /*} */?>


            <!--<div class="col-md-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header-orange">
                            <h1 class="card-heading">Card Header Orange</h1>
                        </div>
                        <div class="card-body">
                            <p class="card-p">
                                There are many variations
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header-pink">
                            <h1 class="card-heading">Card Header Pink</h1>
                        </div>
                        <div class="card-body">
                            <p class="card-p">
                                There are many variations
                            </p>
                        </div>

                    </div>
                </div>
            </div>-->

        </div>
    </div>

</div>
<?php } ?>







<?php if($status == "result") {

    $this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => $_SERVER['HTTP_REFERER']];

    ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.user-experience .main-nav .nav-tabs-dropdown').each(function(i, elm) {
            $(elm).text($(elm).next('ul').find('li.active a').text());
        });
        $('.user-experience .main-nav .nav-tabs-dropdown').on('click', function(e) {
            e.preventDefault();
            $(e.target).toggleClass('open').next('ul').slideToggle();
        });
        $('.user-experience .main-nav #nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {
            e.preventDefault();
            $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());
        });

        $('.user-experience .main-nav #nav-tabs-wrapper li:first').addClass('active');

        $('.user-experience .main-nav #nav-tabs-wrapper li a').click(function () {
            var menu = $(this)[0].innerHTML;

            $.ajax({
                url: 'panel_text',
                type: 'GET',
                dataType : 'json',
                data: {panel:menu,product:'Nutrizione'},
                success: function(data){
                    console.log(data);
                    $('.panel .panel-heading').text(data.base_text);
                    $('.panel .panel-body span').text(data.panel_data);
                }
            });
        });

        $('.user-experience .main-nav .active a').click();

    })
</script>
<style type="text/css">
    .user-experience #nav-tabs-wrapper li a{
        font-weight: 400;
        font-size: 18px;
        text-align: center;
    }
    .user-experience .nav-tabs-dropdown {
        display: none;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .user-experience .nav-tabs-dropdown:before {
        content: "\e114";
        font-family: 'Glyphicons Halflings';
        position: absolute;
        right: 30px;
    }

    @media screen and (min-width: 769px) {
        #nav-tabs-wrapper {
            display: block!important;
        }
    }
    @media screen and (max-width: 768px) {
        .user-experience .nav-tabs-dropdown {
            display: block;
        }
        .user-experience #nav-tabs-wrapper {
            display: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            text-align: center;
        }
        .user-experience .nav-tabs-horizontal {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        }
        .user-experience .nav-tabs-horizontal  > li {
            float: none;
        }
        .user-experience  .nav-tabs-horizontal  > li + li {
            margin-left: 2px;
        }
        .user-experience .nav-tabs-horizontal > li,
        .user-experience .nav-tabs-horizontal > li > a {
            background: transparent;
            width: 100%;
        }
        .user-experience .nav-tabs-horizontal  > li > a {
            border-radius: 4px;
        }
    }
    .user-experience #nav-tabs-wrapper {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.16), 0 1px 3px 0 rgba(0, 0, 0, 0.12);
        font-family: 'Roboto', sans-serif;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .user-experience #nav-tabs-wrapper li {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.16), 0 1px 3px 0 rgba(0, 0, 0, 0.12);
        font-family: 'Roboto', sans-serif;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        /*border: 1px solid #dedede;*/
        border-radius: 5px;
    }
    .user-experience #nav-tabs-wrapper li a{
        margin-right: 0px;
    }
    .user-experience #nav-tabs-wrapper li a:focus, .user-experience li a:hover, .user-experience li a:active, .user-experience .active a{
        background-color: rgba(27,168,183,.9) !important;
        color: white;
    }

    .user-experience .panel-heading {
        font-weight: 400;
        font-size: 18px;
    }
    .user-experience .panel-primary {
        border-color: rgba(27,168,183,.9) !important;
    }
    .user-experience .panel-primary > .panel-heading {
        color: #fff;
        background-color: rgba(27,168,183,.9) !important;
        border-color: rgba(27,168,183,.9) !important;
    }
</style>

<div class="container user-experience">
    <div class="row">
        <div class="col-sm-3">
            <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>

            <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well" style="    box-shadow: 0 1px 3px 0 rgba(255, 255, 255, 0.16), 0 1px 3px 0 rgba(0, 0, 0, 0.12);">
                <li><a href="<?php echo Yii::$app->homeUrl; ?>results?product=<?php echo $product; ?>" style="background-color:rgba(27,168,183,.9) !important;color: white;">TORNA AI RISULTATI</a></li>
            </ul>

            <div class="main-nav">
                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">

                    <?php foreach ($result as $key => $value) { ?>
                        <li><a href="#vtab2" data-toggle="tab"><?php echo $key; ?></a></li><br>
                    <?php } ?>
                    <?php /*foreach ($result as $key => $value) { */?><!--
                        <li><a href="#vtab2" data-toggle="tab"><?php /*echo $key; */?></a></li><br>
                    --><?php /*} */?>

                </ul>
            </div>

        </div>

        <div class="row col-sm-9">
            <div class="panel panel-primary ">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <br><div id="container-1" style="min-width: 310px; height: 400px; margin: 0 auto"></div><br>
                    <span></span>
                </div>
            </div>
        </div>



        <div class="col-sm-7">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="vtab">
                    <h3></h3>
                    <p></p><br>
                    <span></span>
                </div>
            </div>
        </div>

    </div>
</div>


    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script>
        data = [10.387261885573604,
            11.087355979562814,
            12.024644772883095,
            8.075007093826086,
            7.135188143821779,
            9.213484147025476,
            10.200595129717788,
            10.397606840831736,
            7.444871298458401,
            7.766912727376616,
            8.957772977394484,
            6.8362260934990875,
            9.459959692405807,
            11.24608738766167,
            11.210779601726866,
            6.817668980274973,
            8.749154041735663,
            11.451223987866934,
            10.828335690683327,
            9.024736747148518,
            8.690041107553022,
            10.041971969499802,
            9.779401445827075,
            8.440120890244298,
            7.715146626879454,
            9.325291997758788,
            9.226255816844745,
            10.350421611935001,
            8.360877964510616,
            10.61527763317772,
            8.867098060612872,
            9.789088742344449,
            11.619285325523983,
            8.611583265834486,
            7.951866141719196,
            7.837714808206252,
            9.775432530049976,
            8.662367675799072,
            10.343756947488469,
            8.54705782229392,
            9.016587743579787,
            6.768802513856893,
            10.278045839476695,
            8.877641521655711,
            9.012798555295959,
            8.482402925596203,
            11.465801879943195,
            9.310281475759789,
            9.068688707465558,
            9.26861937488691,
            11.85720375127203,
            8.221315994486066,
            10.05080141522427,
            7.285860151431601,
            9.020791438442991,
            7.527320492874207,
            12.293628382534216,
            9.500702215221423,
            7.728757844936883,
            6.229240379632666,
            10.59992914372996,
            7.913926037935217,
            9.699879466624246,
            10.412472534960084,
            10.0936516161657,
            10.227168638792003,
            10.262541310801424,
            11.612332282579596,
            13.114531359446223,
            9.235637681687148,
            6.657705979478315,
            9.634409362207986,
            10.57189748149951,
            7.8404255315379086,
            7.825331835294382,
            12.026655635108071,
            11.491970897671973,
            6.716588961919645,
            10.389215166515168,
            9.893792793815756,
            10.981880001980633,
            11.58775815626369,
            9.161056070477429,
            8.919078771082988,
            11.996362096036714,
            7.98128928070537,
            9.042986312497847,
            10.801288104745842,
            12.036344424497374,
            8.608007601266795,
            8.464764120087375,
            8.869484616517925,
            9.403610113956029,
            8.192654678079085,
            10.723308162290412,
            11.012896389801568,
            10.282916858070621,
            7.976142736620289,
            13.069191180729648,
            11.495880190295694,
            10.05936761839286,
            8.752878164207326,
            9.034158284733293,
            8.537193374657464,
            10.873287586481972,
            9.3267794954848,
            11.95497963982445,
            9.522829397267037,
            11.265145839816109,
            10.765807832383535,
            7.234537805039634,
            8.68004025731461,
            8.848224481673421,
            11.66617874463254,
            7.718486919353051,
            10.446586329099208,
            9.591305296844348,
            9.746323151595146,
            7.612851268956298,
            7.721942530761643,
            12.28719643831547,
            7.8342497230957155,
            10.227118292753161,
            6.758894314456763,
            7.615447884214329,
            9.545572178390904,
            10.251847130156447,
            8.355067024911166,
            8.693361313164568,
            8.626279666730358,
            7.588314088776992,
            8.946747895526116,
            10.008915392381446,
            10.365876897083384,
            8.90662050080261,
            8.104755287337294,
            8.41452111903695,
            8.035557220817275,
            8.401001856145442,
            7.864353260529391,
            7.742625507214426,
            8.262161055426992,
            11.41434220004787,
            9.485872199966925,
            9.600368701046728,
            8.463381407189402,
            10.497624211013711,
            7.364773724359752,
            8.186467352130077,
            11.764975352884896,
            9.159394001946271,
            7.8328889480675,
            8.471547334911731,
            6.400729200559683,
            8.446496241952312,
            8.868935699629708,
            10.989346502837716,
            10.884035289550535,
            8.64249363844894,
            11.016587940920399,
            9.496016780960618,
            9.43286266950804,
            7.370017649720432,
            9.432080269052152,
            11.023438417888874,
            7.664890310477074,
            14.366517517306718,
            10.195354134863013,
            8.80854831546175,
            10.744301135925372,
            8.6259654370176,
            7.490959165673754,
            9.37517101244167,
            9.038082784957336,
            9.20280301971134,
            10.097361178793236,
            9.457552260581515,
            12.12874986552517,
            7.216382322970709,
            6.268025076123073,
            7.403015860983378,
            11.109282462981183,
            7.144951185229328,
            11.375451812405206,
            10.126245523398723,
            7.506990673111586,
            8.265085728547634,
            12.264123461490167,
            8.516143472153313,
            9.093015528225415,
            10.538732911650802,
            9.381193154851768,
            9.245791382592536,
            8.956839012169578,
            7.222526633990606,
            9.244887918052159,
            13.121862079353853,
            11.039368033255837,
            11.064793524408811,
            9.628285364966741,
            11.019247187806915,
            10.415761510917058,
            10.849967285404178,
            9.777302372919747,
            6.803123069759456,
            7.013274220249596,
            9.40777621971367,
            10.05638394840457,
            11.07133128212471,
            6.9626798232858125,
            7.698104315467297,
            11.128358705403047,
            9.722841568152779,
            5.8357385785912985,
            8.773094450597666,
            8.67654548160735,
            11.952467026046977,
            7.9464609489876565,
            7.878806568460916,
            7.353574894015947,
            10.57301424119517,
            8.616143886123387,
            10.34480866264316,
            9.97693619037736,
            7.913637248829158,
            10.055879389768826,
            7.803447159162383,
            11.321944882009225,
            8.748841610019477,
            8.87340621811544,
            9.453873713392424,
            8.888780402672857,
            12.118290731625839,
            7.674335230321633,
            10.765766251659475,
            8.883448182530046,
            9.38190107386223,
            8.881506842804392,
            6.311684373158476,
            8.631777413571898,
            9.473042490012727,
            7.797520501896019,
            9.071200939099016,
            10.162697874779765,
            11.143782494758794,
            9.542565117606955,
            7.001464470974495,
            10.731795519589996,
            13.333808859623757,
            9.553471860152301,
            9.337300113765009,
            8.82044567843336,
            7.588371412828613,
            8.94837986663439,
            6.699848932078543,
            11.073322625320039,
            6.205250605543288,
            12.853875767054609,
            8.191618439926625,
            8.88452890145015,
            9.16158780448531,
            8.10520808831744,
            10.38899793387591,
            8.654408981513226,
            10.535727059365783,
            11.681040691927818,
            9.417432055352304,
            9.311935394367099,
            12.819267824772053,
            9.977500647235344,
            9.762417515938225,
            9.717059452864751,
            10.54008495258167,
            8.299405892855411,
            9.412704518068201,
            7.3715578633017715,
            10.707111382205197,
            9.615275288427167,
            9.846604345878678,
            11.598898431405788,
            7.918349124872258,
            10.098319458631723,
            7.598152425601913,
            7.864854142665653,
            9.214193587480736,
            10.437117677575992,
            9.533853553386976,
            8.331662442888016,
            9.749035415270663,
            9.094048651395669,
            8.594072007960863,
            8.83219485025264,
            11.319060174893657,
            10.744988899996063,
            9.77261911141029,
            11.13180843663998,
            10.207781512388745,
            7.128264605193401,
            6.702761444061756,
            10.992640456483452,
            8.722447724730696,
            7.363829692559032,
            9.321749604862477,
            8.86321160258429,
            8.35476936993437,
            10.960509672379029,
            10.588691019341963,
            8.074127669928057,
            8.285714679664283,
            10.458825621255905,
            10.597405029050078,
            10.369766093352398,
            8.006062121751055,
            12.033510051513858,
            7.058008787961777,
            8.174030402207364,
            9.115145625530541,
            11.347876531077345,
            12.39493705120033,
            9.97078828165441,
            7.5317625959507355,
            9.361595868436842,
            7.432070587098124,
            8.388913864729972,
            6.98301863489995,
            9.65471875292174,
            8.108175406983484,
            10.788225256165749,
            12.629604484546181,
            9.256114052576871,
            11.95427722121061,
            9.600901199520733,
            9.623147269102102,
            10.08178428177018,
            10.215101792602184,
            8.594645565975792,
            7.8768478489197316,
            9.813153655318265,
            8.76642184631928,
            9.748877608007263,
            10.500529308253089,
            9.489835920357368,
            8.896742971376842,
            8.751222482816138,
            8.515164950596604,
            8.921650416576053,
            8.188387306173649,
            9.868878158744996,
            7.6865128521006305,
            10.590016487767562,
            9.172161617342882,
            8.072715200000063,
            10.385975740816932,
            9.20391748881589,
            8.658856676759658,
            8.217246556426213,
            9.106038547026293,
            7.6410706024241275,
            9.820143105042774,
            12.769295063409935,
            7.61859624618059,
            8.576247168126795,
            7.6511605764915025,
            7.247154831761332,
            12.264899861705846,
            8.654949276245697,
            11.949968696100715,
            7.190639493836515,
            8.843351762800664,
            9.104251086685133,
            10.211884974768685,
            8.93689902427656,
            9.52989240624368,
            12.206754509192905,
            9.343040612193192,
            10.24668215195146,
            7.992343002345173,
            9.006484672351986,
            9.650908078617405,
            8.973049598265094,
            7.260518088778041,
            8.361558283121322,
            8.924057589042626,
            10.19813226248308,
            7.804173817450772,
            10.458523391688788,
            8.595846061956852,
            9.847389882654785,
            9.680630435160111,
            7.738525185455542,
            8.921538150875538,
            12.208619803991311,
            10.370054489997425,
            10.427254353735991,
            8.977446456160632,
            9.800727621431381,
            10.595221258056638,
            10.232227412797029,
            8.659813227346142,
            7.923468057574278,
            9.348336833782207,
            7.311066800249607,
            10.382577646475687,
            7.208577925754341,
            6.519816450108121,
            9.278150152729989,
            9.527167149942386,
            9.377868305061035,
            9.227027177397188,
            8.54985846950845,
            11.43823080369501,
            11.40449624027689,
            8.262496043638036,
            8.411770234399075,
            8.936645042879094,
            9.126214870413703,
            6.139650298047652,
            9.855159938632012,
            7.531795726783227,
            7.262818019872184,
            9.713650550269614,
            7.877524618956412,
            9.227947856046748,
            6.691430649958992,
            8.106579787867682,
            11.06481814729185,
            11.506192507371187,
            10.976410239912605,
            11.767890319372178,
            10.401943361881203,
            10.120260549714478,
            8.188593597190351,
            10.353980670862974,
            12.080441967291645,
            8.696694496439145,
            10.177496512138395,
            11.10736852351872,
            9.577163829500574,
            6.964452032551265,
            8.152991839324047,
            8.335782767404858,
            7.457674303833785,
            8.822062484795692,
            6.3553196446358795,
            8.548649793140916,
            8.927269722575272,
            7.819110844463379,
            11.803489408419068,
            10.324777190653728,
            7.077567174795889,
            7.930220148676339,
            6.9991043938076425,
            8.445042079173929,
            9.118974584652783,
            7.254699513947895,
            10.624273733684864,
            8.867510088255202,
            8.04277091090952,
            10.210701081470207,
            9.931575722026334,
            8.629481456006168,
            7.552817446280972,
            6.136318112407936,
            10.652482624540028,
            9.59287276064823,
            11.557397030349383,
            8.650553586447348,
            8.650690536477384,
            13.632864090286953,
            9.253814493744855,
            7.124248108465497,
            8.142146968654366,
            9.592017955440982,
            8.225051671107437,
            8.055792487738493,
            7.633431704910765,
            8.81971865294306,
            10.899772504575711,
            9.200538752911628,
            9.317511207167565,
            9.054201519353917,
            7.8715904457022665,
            8.853579301197206,
            10.569143375656582,
            7.510180286500668,
            11.456894436767376,
            7.675783086259406,
            8.64415829906054,
            7.570337474775629,
            11.959510217291689,
            9.066725987125043,
            9.804433546534511,
            10.838977701015688,
            8.36084358608379,
            8.229598005508702,
            10.393057282038516,
            10.757211252884675,
            12.436492376534508,
            7.552005998009436,
            12.36345997467489,
            8.524068433168697,
            11.1001762377257,
            8.362884277721097];

        data.sort(function (a, b) { return a-b; });
        new_data = []
        for (i in data) {
            new_data.push(Math.round(data[i]));
        }

        distribution = []
        for (i in data) {
            if(!(new_data[i] in distribution))
                distribution[new_data[i]] = 0;
            distribution[new_data[i]]++;
        }
        frequencies = []
        values = []
        for (i in distribution) {
            frequencies.push(distribution[i]*100/data.length);
            values.push(i);
        }
        /*
        kde = science.stats.kde().sample(data);

         /*
        n=length(data); % number of samples
        h=std(data)*(4/3/n)^(1/5); % Silverman's rule of thumb
        phi=@(x)(exp(-.5*x.^2)/sqrt(2*pi)); % normal pdf
        ksden=@(x)mean(phi((x-data)/h)/h); % kernel density
        fplot(ksden,[-25,25],'k') % plot kernel density with rule of thumb
        hold on
        fplot(@(x)(phi(x-10)/2+phi(x+10)/2),[-25,25],'b') % plot the true density
        kde(data);
        */
    </script>
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <script>
        /*
        kde = science.stats.kde().sample(data).bandwidth(0.4)(d3.range(data[0],data[data.length -1],0.1))
        new_data = []
        for (index in kde) {
            new_data.push(kde[index][1] * 100);
        }
        */

        var panelType = '';


        function percentile(arr, p) {
            if (arr.length === 0) return 0;
            if (typeof p !== 'number') throw new TypeError('p must be a number');
            if (p <= 0) return arr[0];
            if (p >= 1) return arr[arr.length - 1];

            arr.sort(function (a, b) { return a - b; });
            var index = (arr.length - 1) * p
            lower = Math.floor(index),
                upper = lower + 1,
                weight = index % 1;

            if (upper >= arr.length) return arr[lower];
            return arr[lower] * (1 - weight) + arr[upper] * weight;
        }


        values = [ 4.52521554,  4.63786024,  4.75050494,  4.86314964,  4.97579433,
            5.08843903,  5.20108373,  5.31372842,  5.42637312,  5.53901782,
            5.65166252,  5.76430721,  5.87695191,  5.98959661,  6.1022413 ,
            6.214886  ,  6.3275307 ,  6.44017539,  6.55282009,  6.66546479,
            6.77810949,  6.89075418,  7.00339888,  7.11604358,  7.22868827,
            7.34133297,  7.45397767,  7.56662236,  7.67926706,  7.79191176,
            7.90455646,  8.01720115,  8.12984585,  8.24249055,  8.35513524,
            8.46777994,  8.58042464,  8.69306934,  8.80571403,  8.91835873,
            9.03100343,  9.14364812,  9.25629282,  9.36893752,  9.48158221,
            9.59422691,  9.70687161,  9.81951631,  9.932161  , 10.0448057 ,
            10.1574504 , 10.27009509, 10.38273979, 10.49538449, 10.60802918,
            10.72067388, 10.83331858, 10.94596328, 11.05860797, 11.17125267,
            11.28389737, 11.39654206, 11.50918676, 11.62183146, 11.73447615,
            11.84712085, 11.95976555, 12.07241025, 12.18505494, 12.29769964,
            12.41034434, 12.52298903, 12.63563373, 12.74827843, 12.86092313,
            12.97356782, 13.08621252, 13.19885722, 13.31150191, 13.42414661,
            13.53679131, 13.649436  , 13.7620807 , 13.8747254 , 13.9873701 ,
            14.10001479, 14.21265949, 14.32530419, 14.43794888, 14.55059358,
            14.66323828, 14.77588297, 14.88852767, 15.00117237, 15.11381707,
            15.22646176, 15.33910646, 15.45175116, 15.56439585, 15.67704055];
        frequencies = [2.80661197e-05, 6.26678681e-05, 1.32436144e-04, 2.65260292e-04,
            5.04255601e-04, 9.11060627e-04, 1.56663100e-03, 2.56762142e-03,
            4.01712017e-03, 6.01035242e-03, 8.61874631e-03, 1.18783292e-02,
            1.57890033e-02, 2.03283703e-02, 2.54776649e-02, 3.12506057e-02,
            3.77124995e-02, 4.49794530e-02, 5.31952600e-02, 6.24922971e-02,
            7.29477682e-02, 8.45459865e-02, 9.71532455e-02, 1.10508509e-01,
            1.24233271e-01, 1.37865988e-01, 1.50925703e-01, 1.63001539e-01,
            1.73850315e-01, 1.83470317e-01, 1.92115525e-01, 2.00228177e-01,
            2.08296568e-01, 2.16677716e-01, 2.25445028e-01, 2.34317551e-01,
            2.42699299e-01, 2.49816285e-01, 2.54903473e-01, 2.57380063e-01,
            2.56964248e-01, 2.53709208e-01, 2.47973057e-01, 2.40350379e-01,
            2.31587286e-01, 2.22485325e-01, 2.13789294e-01, 2.06061674e-01,
            1.99568134e-01, 1.94216637e-01, 1.89588026e-01, 1.85063934e-01,
            1.80013674e-01, 1.73972200e-01, 1.66745497e-01, 1.58416045e-01,
            1.49267277e-01, 1.39675396e-01, 1.30016226e-01, 1.20610522e-01,
            1.11702928e-01, 1.03454932e-01, 9.59358378e-02, 8.91106837e-02,
            8.28377569e-02, 7.68913760e-02, 7.10160075e-02, 6.50008051e-02,
            5.87490379e-02, 5.23136731e-02, 4.58819762e-02, 3.97135018e-02,
            3.40562792e-02, 2.90745810e-02, 2.48142787e-02, 2.12132567e-02,
            1.81449561e-02, 1.54722503e-02, 1.30899456e-02, 1.09440225e-02,
            9.02758545e-03, 7.36165059e-03, 5.97130271e-03, 4.86579260e-03,
            4.02753010e-03, 3.41153397e-03, 2.95416348e-03, 2.58767752e-03,
            2.25555910e-03, 1.92338087e-03, 1.58180585e-03, 1.24157639e-03,
            9.23502177e-04, 6.47943793e-04, 4.27556537e-04, 2.64851054e-04,
            1.53835465e-04, 8.37221366e-05, 4.26729968e-05, 2.03642537e-05];

        val = [];
        for (var i in values) {
            val.push(values[i] * frequencies[i])
        }

        console.log(val);

        pc = percentile(values, 50);
        /*alert(pc + ' - ' + values[values.length-1]);*/
        /*alert(pc);*/





        /**************************  Rustam Part **************************/
        var dbPercentile = 75;          // given percintile
        var dbGreenLine  = 9;           // given tuo valore(green line)


        var rQunatile = 0;              // must be inserted to the dsatabase(qunatile index)
        CDF = 0;
        for(var ii in values) {
            var mult = values[ii]*frequencies[ii];
            CDF = CDF + mult;
            if(CDF >= dbPercentile) {
                rQunatile = ii;
                console.log(values[ii]);
                break;
            }
        }

        var greenLine = 0;              // must be inserted to the dsatabase(user green line)
        for(var jj in values) {
            if(values[jj] >= dbGreenLine) {
                greenLine = jj;
                break;
            }
        }
        /**************************  Rustam Part End **************************/



        Highcharts.chart('container-1', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Distribuzione del PRS per il diabete di tipo 2 nella popolazione Europea'
            },
            /*legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },*/
            xAxis: {
                categories: values,
                plotBands: [{ // visualize the weekend
                    from: rQunatile,
                    to: 100,
                    color: 'rgba(200, 50, 50, .2)',
                    label: {
                        text: 'Area a rischio elevato', // Content of the label.
                        align: 'left', // Positioning of the label.
                    }
                }],
                plotLines: [{
                    color: 'green', // Color value
                    //dashStyle: 'longdashdot', // Style of the plot line. Default to solid
                    value: greenLine, // Value of where the line will appear
                    width: 2, // Width of the line
                    label: {
                        text: 'Il tuo valore', // Content of the label.
                        align: 'right', // Positioning of the label.
                    }
                }],

            },
            yAxis: {
                title: {
                    text: 'Frequenza'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' units'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Frequenza su 100 individui',
                data: frequencies
            }]
        });

    </script>




<?php } ?>




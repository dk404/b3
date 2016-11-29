<?
require_once "autoload.php";

$PATH = new library\Path();
$Auth = new library\Auth("/maket1/");

/*-----------------------------------
Если была передана форма
-----------------------------------*/
if($_POST["method_name"] == "register")
{
    try{
       $resRegister = $Auth->register($_POST);
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="description" content="Miminium Admin Template v.1">
    <meta name="author" content="Isna Nur Azis">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miminium</title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/css/plugins/icheck/skins/flat/aero.css"/>
    <link href="asset/css/style.css" rel="stylesheet">
    <!-- end: Css -->

    <link rel="shortcut icon" href="asset/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Мои подключения-->
    <link rel="stylesheet" href="js/sweetalert/sweetalert.css">

</head>

<body id="mimin" class="dashboard form-signin-wrapper">

<div class="container">





    <form action="" method="post" enctype="multipart/form-data" class="form-signin">
        <input type="hidden" name="method_name" value="register">


        <div class="panel periodic-login">
            <span class="atomic-number"><? echo date("j") ?></span>
            <div class="panel-body text-center">
                <h1 class="atomic-symbol">B3</h1>
                <p class="atomic-mass">maket 1</p>
                <!--                  <p class="element-name">Miminium</p>-->




                <i class="icons icon-arrow-down"></i>

                <? if($error){ ?>
                    <br><br><br>
                    <div class="well well-sm bg-danger text-left"><? echo $error; ?></div>
                <? } ?>

                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" name="email" class="form-text" required>
                    <span class="bar"></span>
                    <label>E-mail</label>
                </div>
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" name="pass" class="form-text" required>
                    <span class="bar"></span>
                    <label>Password</label>
                </div>
                <label hidden class="pull-left">
                    <input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me
                </label>
                <input type="submit" class="btn col-md-12" value="SignIn"/>
            </div>
            <div hidden class="text-center" style="padding:5px;">
                <a href="forgotpass.html">Forgot Password </a>
                <a href="reg.html">| Signup</a>
            </div>
        </div>
    </form>

</div>

<!-- end: Content -->
<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/icheck.min.js"></script>

<!-- custom -->
<script src="asset/js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-aero',
            radioClass: 'iradio_flat-aero'
        });
    });
</script>
<!-- end: Javascript -->





<!--Мои подключения-->
<script src="js/sweetalert/sweetalert.min.js"></script>

<? if($resRegister){ ?>
    <script>
        swal("Спасибо!", "Осталось подтвердить Ваш e-mail. Проверьте свой e-mail, мы отправили Вам письмо.", "success");
    </script>
<? } ?>

</body>
</html>
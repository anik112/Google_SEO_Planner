<?php
require 'simple_html_dom.php';
require './controller/deshboardControl.php';
require './controller/databaseFunction.php';
require './controller/dbConnect.php';

$v_userName = "";
$search_key_word='';
$checkSubmit='NO';
$loginURL = 'deshboard';
$v_uType = 'USER';

if (isset($_SESSION["u_email"])){
    $v_userName = $_SESSION["u_email"];
}

if(isset($_POST['submit'])){
    $search_key_word=$_POST['searchContent'];
    inser_log($connect, $search_key_word, $v_userName);
    $checkSubmit='YES';
}else{
    $checkSubmit='NO';
}

if($search_key_word == ''){
    $search_key_word = 'demo';
}


$v_uType = get_user_type($connect,$v_userName);
if($v_uType=='ADMIN'){
    $loginURL = 'admin';
}else{
    $loginURL = 'deshboard';
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshboard</title>
    <link rel="stylesheet" href="../public/css/deshboard.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../public/css/footer-style.css">
    <link rel="icon" type="image/png" href="./icon/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./public/css/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./public/css/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./public/css/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./public/css/util.css">
    <link rel="stylesheet" type="text/css" href="./public/css/main.css">

    <style>
        .anime-text {
            background-color: none;
            position: relative;
            animation-name: example;
            animation-duration: 4s;
            animation-iteration-count: infinite;
        }

        @keyframes example {
            0% {
                left: 0px;
                top: 0px;
            }

            25% {
                left: 20px;
                top: 0px;
            }

            50% {
                left: 20px;
                top: 20px;
            }

            75% {
                left: 20px;
                top: 20px;
            }

            100% {
                left: 0px;
                top: 0px;
            }
        }

        /*@keyframes example {
    0%   {background-color:red; left:0px; top:0px;}
    25%  {background-color:yellow; left:200px; top:0px;}
    50%  {background-color:blue; left:200px; top:200px;}
    75%  {background-color:green; left:0px; top:200px;}
    100% {background-color:red; left:0px; top:0px;}
    }*/
    </style>

</head>

<body>

    <div class='row bg-dark'>
        <div class='col-lg-4 text-center px-5 py-3'>
            <a href="deshboard">
                <h4><Strong style='color: white; font-size: 22px;'>SEO PLANNER TOOLS</Strong><small
                        class='header-sm-tit'> ( All SEO Solution )</small></h4>
            </a>
        </div>

        <div class='col-lg-5 text-right'>
            <form action="" method="POST" class='py-3'>
                <div class="input-group">
                    <input type="text" name='searchContent' class="form-control" placeholder="Search Keyword...">
                    <div class="input-group-btn">
                        <input type="submit" name='submit' class='btn btn-primary'
                            style='border-top-left-radius: 0px; border-bottom-left-radius: 0px;'>
                    </div>
                </div>
                <a href="<?php echo $loginURL; ?>">Login By: <?php echo $v_userName; ?> </a>
            </form>
        </div>

        <div class='col-lg-3 text-center py-3'>
            <!--
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          EN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">BN</a>
          <a class="dropdown-item" href="#">CH</a>
        </div> 
    </li> --->

            <div class="btn-group">
                <button type="button" class="btn btn-outline-black text-white">EN</button>
                <button type="button" class="btn btn-outline-black dropdown-toggle dropdown-toggle-split text-white"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">EN</a>
                    <a class="dropdown-item" href="#">BN</a>
                </div>
            </div>
            <a href="login" class='btn btn-outline-info'>Login</a>
            <a href="contact" class='btn btn-outline-info'>Contact</a>
        </div>
    </div>
    </div>
<?php
require 'simple_html_dom.php';

require './controller/deshboardControl.php';

$search_key_word='';
if(isset($_POST['submit'])){
    $search_key_word=$_POST['searchContent'];
    //echo $search_key_word;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshboard</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/deshboard.css">
    <link rel="stylesheet" href="../public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../public/css/footer-style.css">
</head>

<body>
    
<div class='row bg-dark'>
<div class='col-lg-4 text-center px-5 py-3'>
    <a href="deshboard.php"><h4><Strong style='color: white;'>SEO PLANER TOOLS</Strong><small class='header-sm-tit'> ( All SEO Solution )</small></h4></a>
</div>

<div class='col-lg-5 text-right'>
    <form action="" method="POST" class='py-3'>
            <div class="input-group">
            <input type="text" name='searchContent' class="form-control" placeholder="Search Keyword...">
            <div class="input-group-btn">
                <input type="submit" name='submit' class='btn btn-primary' style='border-top-left-radius: 0px; border-bottom-left-radius: 0px;'>
            </div>
            </div>
    </form> 
</div>

<div class='col-lg-3 text-center py-3'>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          EN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">BN</a>
          <a class="dropdown-item" href="#">CH</a>
        </div>
    </li>

    <a href="login.php" class='btn btn-outline-info'>Login</a>
    <a href="contact.php" class='btn btn-outline-info'>Contact</a>
</div>
</div>
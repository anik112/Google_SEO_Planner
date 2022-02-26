<?php

require './controller/dbConnect.php';

// get main result information
if(isset($_POST['submit'])){

    $uname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $checkSubmit='YES';
    //D:\AnikProgram\Web_Scraping\test.html

    $sql = "INSERT INTO `tb_user_info`(`u_name`, `u_email`, `u_pass`) VALUES ('$uname','$email','$password')";

    $getData = $connect->prepare($sql);
    $getData->execute();

    if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }

}else{
    $checkSubmit='NO';
}
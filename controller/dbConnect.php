<?php

$hostName='localhost'; // host name
$dbName='google_seo_planner_tools'; // database name
$dbUserName='root'; // database user name
$dbPassword=''; // database password
global $connect;


try{
    // create connection in database
    $connect=new PDO("mysql:host=$hostName;dbname=$dbName","$dbUserName","$dbPassword");
//echo '</br> from database connection. </br>';
} catch (Exception $e) {
    // if create problrm when connection, then show error massage
    echo "<div style='text-align: center;'><h3 style='color: coral;'>SORRY, ERROR!  Please check your connection. Check /$hostName server.</h3></div>";
}


?>
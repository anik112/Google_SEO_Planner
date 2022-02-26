<?php

if(!function_exists('getAllDataFromTable')){
    function getAllDataFromTable($connect,$tableName){
    
        $getData = $connect->prepare("SELECT * FROM `$tableName`");
        $getData->execute();
    
        return $getData->fetchAll(PDO::FETCH_OBJ);
    }
    
}



?>
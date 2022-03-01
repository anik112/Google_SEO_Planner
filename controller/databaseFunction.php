<?php

    function getAllDataFromTable($connect, $tableName){
    
        $getData = $connect->prepare("SELECT * FROM `$tableName`");
        $getData->execute();
    
        return $getData->fetchAll(PDO::FETCH_OBJ);
    }


    function keywordValidation($connect, $key){
    
        $getData = $connect -> prepare("SELECT count(*) cnt_num FROM `tb_keyword_files` WHERE _keyword='$key'");
        $getData->execute();
    
        $data = $getData->fetchAll(PDO::FETCH_OBJ);
        return $data[0]->cnt_num;
    }

    function keywordURL($connect, $key){
    
        $getData = $connect -> prepare("SELECT _url FROM `tb_keyword_files` WHERE _keyword='$key'");
        $getData->execute();
    
        $data = $getData->fetchAll(PDO::FETCH_OBJ);
        return $data[0]->_url;
    }

    function get_keyword_file_list($connect){
    
        $getData = $connect -> prepare("SELECT `_id`,`_keyword`, `_url` FROM `tb_keyword_files`");
        $getData->execute();

        return $getData->fetchAll(PDO::FETCH_OBJ);
    }

    function get_user_type($connect,$email){
    
        $getData = $connect -> prepare("SELECT `type` FROM `tb_user_info` WHERE u_email='$email'");
        $getData->execute();
        $data=$getData->fetchAll(PDO::FETCH_OBJ);
        if(!empty($data)){
            return $data[0]->type;
        }else{
            return 'USER';
        }
    }

    function inser_log($connect, $key, $email){
        $year = date("Y");
        $month = date("F");
        $getData = $connect -> prepare("INSERT INTO `tb_search_log`(`_keyword`, `_user`, `year`, `month`) VALUES ('$key','$email','$year','$month')");
        $getData->execute();

    }

    function get_search_log($connect,$year,$month){
    
        $getData = $connect -> prepare("SELECT _keyword, COUNT(*) cnt FROM `tb_search_log` 
                                        WHERE year='$year' AND   month='$month' 
                                        GROUP by _keyword
                                        ORDER by cnt desc");
        $getData->execute();

        return $getData->fetchAll(PDO::FETCH_OBJ);
    }

?>
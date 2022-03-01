<?php 
require './controller/dbConnect.php';
require './controller/databaseFunction.php';
// get main result information
// if(isset($_POST['submit'])){

//     $keyword=$_POST['searchContent'];
    
//     //$command = escapeshellcmd("python test.py $keyword");
//     //$output = shell_exec($command);
    
//     //ob_end_clean();
//     //header("Connection: close");
//     //ignore_user_abort();  
//     //exit(0);
//     //$handle = popen("test.py $keyword", 'r');
//     //$output = fread($handle, 1024);
//     //var_dump($output);
//     //pclose($handle);

//     $checkSubmit='YES';
//     header( 'Location: deshboard' );
    
//     //D:\AnikProgram\Web_Scraping\test.html
// }else{
//     $checkSubmit='NO';
// }

$based_DIR = 'D:/AnikProgram/Web_Scraping/storage/';
$data_insert = 'NO';

if(isset($_POST["upload"]) && isset($_POST["fileToUpload"])) {

    $keyword_name = $_POST['keyword'];
    $selectURL = $_POST["fileToUpload"];
    $selectURL = $based_DIR.$selectURL;

    $sql = "INSERT INTO `tb_keyword_files`(`_keyword`, `_url`) VALUES ('$keyword_name','$selectURL')";

    $getData = $connect->prepare($sql);
    $getData->execute();

    $data_insert ='YES';
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


</head>

<body>

    <div class='row bg-dark pb-3'>
        <div class='col-lg-4 text-center px-5 py-3'>
            <a href="deshboard">
                <h4><Strong style='color: white; font-size: 22px;'>SEO PLANNER TOOLS</Strong><small
                        class='header-sm-tit'> ( All SEO Solution )</small></h4>
            </a>
        </div>

        <div class='col-lg-5 text-right'>
            <form action="deshboard" method="POST" class='py-3'>
                <div class="input-group">
                    <input type="text" name='searchContent' class="form-control" placeholder="Search Keyword...">
                    <div class="input-group-btn">
                        <input type="submit" name='submit' class='btn btn-primary'
                            style='border-top-left-radius: 0px; border-bottom-left-radius: 0px;'>
                    </div>
                </div>
            </form>
        </div>

        <div class='col-lg-3 text-center py-3'>

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

    <div class='container-admin p-5'>

        <div class="wrap-body p-5">

            <div class="login100-admin">
                <div class='card mx-5'>
                        <?php if($data_insert=='YES'): ?>
                        <div class="alert alert-primary" role="alert">
                            File Upload !
                        </div>
                        <?php endif; ?>

                        <div class='card-header'>
                            File Upload
                        </div>
                        <div class='card-body m-0'>
                            <form action="" method="post">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keyword Name">
                                </div>

                                <div class="form-group mb-2">
                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" placeholder="Select File">
                                </div>

                                <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>

            <div class="login100-admin">
                <div class='card mt-2 mx-5 p-3'>
                <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Keyword</th>
                            <th scope="col">URL</th>
                            </tr>
                        </thead>

                        <?php
                        $dataList = get_keyword_file_list($connect);
                        foreach($dataList as $data):
                        ?>
                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $data->_id; ?></th>
                            <td><?php echo $data->_keyword; ?></td>
                            <td><?php echo $data->_url; ?></td>
                            </tr>
                        </tbody>
                            
                        <?php endforeach; ?>
                </table>
                </div>
                
            </div>

            <div class="login100-admin mt-3">
                <div class='card mx-5'>
                        <div class='card-header'>
                            Keyword Log (MAX to MIN)
                        </div>
                        <div class='card-body m-0'>
                            <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Keyword</th>
                                <th scope="col">Max Search Count</th>
                                </tr>
                            </thead>

                            <?php
                            $dataLog = get_search_log($connect,date('Y'),date('F'));
                            foreach($dataLog as $data):
                            ?>
                            <tbody>
                                <tr>
                                <th scope="row"><?php echo $data->_keyword; ?></th>
                                <td><?php echo $data->cnt; ?></td>
                                </tr>
                            </tbody>
                                
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>

        </div>

            <div class='container-search'>
                <!--- null div -->
            </div>

            <div class='container-search'>
                <!--- null div -->
            </div>
    </div>


<?php require 'footer.php' ?>
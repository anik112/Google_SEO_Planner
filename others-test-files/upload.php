<?php

require './load.php';


if(isset($_POST['submit'])){

    echo 'submited...';

    $fileName=''; // declare variable for get image name.
    $searchKeyword='';
    $target_file='';

    if(isset($_POST['title'])){
        $searchKeyword=$_POST['title'];
    };

    // check if image is selected
    if(isset($_FILES["upFile"]["size"]) > 0 && $_FILES["upFile"]["error"] == 0){

        $target_dir = "./files/"; // set image dir.
        $target_file = $target_dir . basename($_FILES['upFile']['name']); // set file name.
        echo $target_file;
        $fileName=$target_dir.$_FILES['upFile']['name'];

    }
    if(!empty($searchKeyword)){
        echo 'In the title.';
        // add data in post table
        $statement=$connect->prepare("INSERT INTO `tb_keyword_files`(`_keyword`, `_url`) VALUES ('$searchKeyword','$fileName');");
        $statement->execute()  or die("Data not insert. Please try again.");

        // check if file name up to 1
        if(strlen($fileName) > 1){
            // Upload file
            move_uploaded_file($_FILES['upFile']['tmp_name'],$fileName);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
</head>
<body>

<div class='container'>
    <div class='row my-5'>
        <div class='col-lg-12'>
            <div class='card'>
                    <!-- create post panel -->
                <div class="card-header"><h1>Upload Files</h1></div>
                    <div class='card-body'>
                        <!-- send data -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class='form-group form-group-lg my-5 mx-5'>
                                <!-- get title from user -->
                                <input type="text" name="title" id="" class='form-control my-2' placeholder='Type KEYWORD' required>
                                <!-- get image from user -->
                                <div class="custom-file my-2">
                                    <input type="file" name='upFile'  class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" lang="en">
                                    <label class="custom-file-label file-inp-z" for="inputGroupFile01">Choose file [ MAX: 2MB ]</label>
                                </div>
                                <!-- submit data location: "../core/createPost.php" -->
                                <input type="submit" value="Analysis" name='submit' class='btn btn-outline-primary my-3  px-5'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
</body>
</html>
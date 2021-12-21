<?php 
require 'header.php';


// get main result information
if(isset($_POST['submit'])){

    $keyword=$_POST['searchContent'];

    $command = escapeshellcmd("python test.py $keyword");
    $output = shell_exec($command);
    
    //ob_end_clean();
    //header("Connection: close");
    //ignore_user_abort();  
    //exit(0);
    //$handle = popen("test.py $keyword", 'r');
    //$output = fread($handle, 1024);
    //var_dump($output);
    //pclose($handle);

    $checkSubmit='YES';
    header( 'Location: deshboard' );
    
    //D:\AnikProgram\Web_Scraping\test.html
}else{
    $checkSubmit='NO';
}

?>

<?php require 'footer.php' ?>
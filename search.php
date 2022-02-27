<?php 
require 'header.php';


// get main result information
if(isset($_POST['submit'])){

    $keyword=$_POST['searchContent'];

    //$command = escapeshellcmd("python test.py $keyword");
    //$output = shell_exec($command);
    
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

<div class='container-search' style='padding-top: 0px;'>
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class='row anime-text'>
            <div class='col-lg-12 mt-5 my-5'>
                <h5 style='font-size: 60px; text-align: center; font-family: "Berlin Sans FB";'
                    class='text-white font-weight-bold'>Get measurable results</h5>
                <h5 style='font-size: 60px; text-align: center; font-family: "Berlin Sans FB";'
                    class='text-white font-weight-bold'>from online marketing</h5>
                </br>
                <h5 style='font-size: 20px; text-align: center; font-family: "Lucida Sans";'
                    class='text-white font-weight-normal'>Do SEO, content marketing, competitor research,</h5>
                <h5 style='font-size: 20px; text-align: center; font-family: "Lucida Sans";'
                    class='text-white font-weight-normal'>PPC and social media marketing from just one platform.</h5>
            </div>
        </div>

        <div class='container px-5 py-3'>
            <div class='row px-5'>
                <div class='col-lg-3'></div>
                <div class='col-lg-6 text-right'>
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" name='searchContent' class="form-control"
                                placeholder="Search Keyword...">
                            <div class="input-group-btn">
                                <input type="submit" name='submit' class='btn btn-primary'
                                    style='border-top-left-radius: 0px; border-bottom-left-radius: 0px;'>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='col-lg-3'></div>
            </div>
        </div>

        <div class='container-search'>
            <!--- null div -->
        </div>

        <div class='container-search'>
            <!--- null div -->
        </div>
    </div>
</div>


<?php require 'footer.php' ?>
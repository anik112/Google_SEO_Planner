<?php 

// $command = escapeshellcmd("test.py");
// $output = shell_exec($command);
// echo $output;

// get url and trim url
$url = explode("/",trim( parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/' ));

session_start();

// database create sassion
if($url[0] == "dbCreate"){
    require './database/createTable.php';
}

// set all routes
$routes = [
    'deshboard' => 'deshboard.php',
    'contact' => 'contact.php',
    'login' => 'login.php',
    'search' => 'search.php',
    'admin' => 'admin.php'
];


$basedPage='search';

// echo $url;

if($url[0] == null){
    header("Location: search");
}else{
    //if(isset($_SESSION['userId']) > 0){
        // check request url have in this routes
        if(array_key_exists($url[0], $routes)){
            require $routes[$url[0]];
        }else{
            echo 'file not found!';
        }
    //}else{
    //    require "$basedPage"; // otherwise call based page
    //}
}

if(!empty($_GET['url'])){
    $requestURL=$_GET['url'];
}


//require 'upload.php';
// require 'simple_html_dom.php';


// $url = "file:///D:/AnikProgram/Web_Scraping/test.html";


//$html = file_get_html($url);


// $homepage = file_get_contents('https://www.semrush.com/analytics/keywordoverview/?q=cat&db=us');
// echo $homepage;

//header('https://www.semrush.com/analytics/keywordoverview/?q=cat&db=us');
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://www.semrush.com/analytics/keywordoverview/?q=cat&db=us');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
// curl_setopt($ch, CURLOPT_TIMEOUT, 400);
// $response = curl_exec($ch);
// curl_close($ch);

// $ch = curl_init();
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//         curl_setopt($ch, CURLOPT_HEADER, false);
//         curl_setopt($ch, CURLOPT_URL, 'https://www.semrush.com/analytics/keywordoverview/?q=cat&db=us');
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//         curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//         $result = curl_exec($ch);
//         curl_close($ch);


// echo $result;


//echo show_source('https://www.semrush.com/analytics/keywordoverview/?q=cat&db=us');

//$html2=new simple_html_dom();

//D:\AnikProgram\Web_Scraping\test.html
//$html2->load_file('D:\AnikProgram\Web_Scraping\dog-overview-semrush.html');

//echo $html2;

// foreach($html2->find('.kwo-widget-layout') as $data){
//     echo $data;
// }

// $data=$html->find('color');
//  $data =  $html->find('.tw-mb-1');

//  echo $data;


 
// $getCaseStatus=$html->find('.number-table-main');

// if(isset($data[0]))
//     echo 'Find some data</br>';
// else
// echo 'No data found</br>';

    // for($i=0; $i<count($data);$i++){
    //     $a=$data[$i]->text();
    //     switch($i){
    //         case 0:
    //             echo 'Coronavirus Cases:'.$a.'</br>';
    //             break;
    //         case 1:
    //             echo 'Deaths:'.$a.'</br>';
    //             break;
    //         case 2:
    //             echo 'Recovered:'.$a.'</br>';
    //             break;
                
    //     }
        
    // }


    // for($i=0; $i<count($getCaseStatus);$i++){
    //     $a=$getCaseStatus[$i]->text();
    //     switch($i){
    //         case 0:
    //             echo 'ACTIVE CASES:'.$a.'</br>';
    //             break;
    //         case 1:
    //             echo 'CLOSED CASES:'.$a.'</br>';
    //             break;
                
    //     }
        
    // }
//    foreach($data as $d){
//        switch($i){
//            case 0:
//             echo 'Coronavirus Cases:'.$d->text().'</br>';
//             break;
//             case 1:
//                 echo 'Deaths:'.$d.'</br>';
//                 break;
//                 case 2:
//                     echo 'Recovered:'.$d.'</br>';
//                     break;
//        }
//         $i++;
//    }
    

//    $data1 =  $html->find('div[class=content]');

//    if(isset($data1[0]))
//        echo 'Find some data';
//       foreach($data1 as $d){
//           echo $d;
//       }


// // create a new cURL resource
// $ch = curl_init();

// // set URL and other appropriate options
// curl_setopt($ch, CURLOPT_URL, "https://app.neilpatel.com/en/ubersuggest/overview?lang=en&locId=2840&keyword=Benefits+of+coffee+face+scrub");
// curl_setopt($ch, CURLOPT_HEADER, 0);

// // grab URL and pass it to the browser
// curl_exec($ch);

// // close cURL resource, and free up system resources
// curl_close($ch);


// $s=curl_init();

// curl_setopt($s, CURLOPT_URL, 'https://app.neilpatel.com/en/ubersuggest/overview?lang=en&locId=2840&keyword=Benefits+of+coffee+face+scrub');
// curl_setopt($s, CURLOPT_POST, false);
// curl_setopt($s,CURLOPT_RETURNTRANSFER, true);

// $html=curl_exec($s);
// curl_close($s);
// echo $html;

?>
<?php

require './load.php';

$KEYWORD='cat';
$htmlDom = new simple_html_dom();

function loadURL($url){
    //D:\AnikProgram\Web_Scraping\test.html
    $htmlDom->load_file('D:\AnikProgram\Web_Scraping\dog-overview-semrush.html');
}

$htmlDom->load_file('D:\AnikProgram\Web_Scraping\dog-overview-semrush.html');

$usSearchVolume=0;
$globalSearchVolume=0;
$cpc=0;
$globalKD=0;
$global_country_list=array();

$i=1;
//.kwo-widget-layout
foreach($htmlDom->find('.kwo-widget-total') as $data){
    
    if(!empty($data)){
        //echo $data->innertext;
        switch($i){
            case 1:
                $usSearchVolume=(float)$data->innertext;
                break;
            case 2:
                $globalSearchVolume=(float)$data->innertext;
                break;

        }
    }
    $i++;
}


foreach($htmlDom->find('.kwo-metrics-data-layout') as $data){
    if(!empty($data)){
        $cpc=(float)str_replace('$','',$data->innertext);
        break;
    }
}


foreach($htmlDom->find('.kwo-kd__metric') as $data){
    //echo $data;
    if(!empty($data)){
        $globalKD=(float)str_replace('%','',$data->innertext);
        break;
    }
}

// get global country list
$j=0;
foreach($htmlDom->find('.kwo-chart-global-volume-line') as $data){
    //$s=$data->innertext.' - ';
    $glob_contry='';
    $glob_vol=0;
    $glob_perc=0;

    if(!empty($data)){
        //echo $data;
        foreach($data->find('.kwo-chart-global-volume-line__database') as $cunty){
            $glob_contry=$cunty->innertext;
        }

        foreach($data->find('.___SText_17rlk-ko_') as $vol){
            $glob_vol=$vol->innertext;
        }

        foreach($data->find('.kwo-chart-global-volume-line__proportion') as $perc){
            $glob_perc=$perc->innertext;
        }
    }
    $global_country_list[$j]=$glob_contry.' - '.$glob_vol.' - '.$glob_perc;
    $j++;
}


// foreach($global_country_list as $lst){
//     echo $lst.'</br>';
// }

if($usSearchVolume>-1 
&& $globalSearchVolume>-1 
&& $cpc>-1
&& $globalKD>-1){
    //echo $usSearchVolume.' and '.$globalSearchVolume.' CPC '.$cpc.' KD '.$globalKD;

    // $getData = $connect->prepare("INSERT INTO `tb_key_rech_reslt`(`_keyword`, `_global_volume`, `_US_volume`, `_CPC`, `_global_kd`) 
    //                             VALUES ('$KEYWORD',$globalSearchVolume,$usSearchVolume,$cpc,$globalKD)");
    // $getData->execute();

}


// foreach($htmlDom->find('.kwo-widget-total') as $data){
//     echo $data.'</br>---------';
// }


// foreach($htmlDom->find('.kwo-chart-volume__line') as $data){
//     echo $data.'</br>---------';
// }

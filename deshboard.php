<?php 
require 'header.php';

$htmlDom = new simple_html_dom();

// get keyword and url form database
if (keywordValidation($connect, $search_key_word)>0){
    //echo keywordURL($connect, $search_key_word);
    $htmlDom->load_file(keywordURL($connect, $search_key_word));
}else{
    $htmlDom->load_file(keywordURL($connect, 'demo'));
    $search_key_word =  $search_key_word.'  << not found >>';
}

$key=0;

$volume=findSearchVolume($key,$htmlDom);

$usSearchVolume=$volume[0];
$globalSearchVolume=$volume[1];
$cpc=findCPC($key, $htmlDom);
$globalKD=findGlobalKD($key, $htmlDom);
$globalKDStatus=findGlobalKDStatus($key, $htmlDom);

$lists=find_CPC_COM_PLA_ADS($key, $htmlDom);
$com=$lists[1];
$pla=$lists[2];
$ads=$lists[3];

$results=findResultData($key, $htmlDom);
$global_country_list=findGlobalCountryList($key, $htmlDom);

$lists=find_keyVarint_quesVol_relVol($key, $htmlDom);
$keyVariationVol=$lists[0];
$quesVol=$lists[1];
$relKeyVol=$lists[2];

$lists=find_keyVariTot_quesVolTot_relKeyVolTot($key, $htmlDom);
$keyVariationVolTotal=$lists[0];
$quesVolTotal=$lists[1];
$relKeyVolTotal=$lists[2];

$lists=find_keywordVariantKey_serpAnalysis($key, $htmlDom);

foreach($htmlDom->find('.kwo-serp-table__url tr.___SRow_1m9ev-ko_ td.___SText_158ur-ko_') as $data){
echo $data.'</br>';
}

$keywordVariantKey=$lists[0];
$serpAnalysis=$lists[1];

?>
    
<!-- For backround colour --->
<div class='container-login100' style='padding-top: 0px;'>

<div class="area" >
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

<!-- main container , where we show all eelement -->
<div class='container'>
    <div>
    
    </div>
<div class='row'>

    <div class='col-lg-12 mt-5'>
       
    <div class='keyword-header'>
            <h3><Strong style='color: rgb(223, 221, 221);;'>Keyword Overview:   </Strong><i style='font-style: normal; color: #ffc107'><?php echo $search_key_word;?></i></h3>
            <div class='mt-3'>
                <i calss='top-head-src-country' style='padding-right: 5px; font-style: normal; font-size: 14px; border-right: solid; border-right-color: #acacac;'>
                    <img class='icon' src="../icon/USA.png" alt=""><a href="#"><b class='text-warning'> US</b></a>
                </i>
                <i calss='top-head-src-device' style='padding-right: 5px; padding-left: 5px; font-style: normal; font-size: 14px; border-right: solid; border-right-color: #acacac;'>
                    <img class='icon' src="../icon/computer.png" alt=""><b> Desktop</b>
                </i>
                <i calss='top-head-src-date' style='padding-right: 5px; padding-left: 5px; font-style: normal; font-size: 14px; border-right: solid; border-right-color: #acacac;'>
                    <img class='icon' src="../icon/calendar.png" alt=""><b> <?php echo date("d-F-Y");?></b>
                </i>
                <i calss='top-head-src-amount-unit ' style='padding-left: 5px; font-style: normal; font-size: 14px;'><b> USD</b></i>

                <div style='float: right;'>
                <a href="https://www.semrush.com/academy/courses/competitive-analysis-and-keyword-research-course" style='margin-right: 10px; font-style: normal; font-size: 14px; color: white;'>Keyword Research course</a>
                <a href="https://www.semrush.com/kb/257-keyword-overview" style='margin-right: 10px; font-style: normal; font-size: 14px; color: white;'>User manual</a>
                <a href="#!" style='margin-right: 10px; font-style: normal; font-size: 14px; color: white;'>Send feedback</a>
                </div>  
            </div>
        </div>

        <div class='card p-2 mt-5'>
            <div class='card-body pl-1 pr-1 mx-5'>
                <div class='row'>
                    <!-- Show Search volume and global KD -->
                    <div class='col-sm-4'>
                        <div class='card border-primary'>
                            <div class='card-body bg-primary m-1' style='border-radius: 2%;'>
                                <h6 class='text-white'>Volume</h6>
                                <h3 class='head-reslt-vol text-white' ><?PHP echo $usSearchVolume;?><img class='icon' style="height: 40px; width: 40px; margin-left:10px;" src="../icon/USA.png" alt="" srcset=""></h3>
                            </div>
                            <div class='divider'></div>
                            <div class='card-body '>
                                <h6 style="font-family: 'Lucida Sans', Geneva, Verdana, sans-serif; font-weight: bold; color: rgb(73, 73, 73); margin-bottom: 3px;">Keyword Difficulty</h6>
                                <h3 class='head-reslt-vol'><?php echo $globalKD; ?> % </h3>
                                <h6 class='text-danger' style='font-size: 14px;'><?php echo $globalKDStatus; ?></h6>
                                <div class="progress mt-1">
                                <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" style="width:<?php echo $globalKD;?>%"><?php echo $globalKD; ?> %</div>
                                </div>
                            </div>
                            <div class='card-body p-3'>
                                <p class='text-center ' style="font-family: 'Lucida Sans', Geneva, Verdana, sans-serif; font-weight: bold; color: rgb(73, 73, 73); font-size: 12px; margin:0px;">
                                This keyword will demand 437 high authority referring domains and well optimized 
                                content to start ranking for it.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- show country -->
                    <div class='col-sm-4'>
                        <div class='card border-primary'>
                            <div class='card-body'>
                                <h6>Global Volume</h6>
                                <h3 class='head-reslt-vol'><?php echo $globalSearchVolume; ?> <img src="" alt="" srcset=""></h3>
                            </div>
                            <div class='divider'></div>
                            <!-- For show country -->
                            <div class='card-body'>
                                <table class='table mb-3'>
                                    <tbody>
                                        <!-- Show country list -->
                                        <?php foreach($global_country_list as $list): 
                                            $devidor=explode(' - ',$list);
                                            ?>
                                        <tr>
                                            <td class='col-3 py-1'><p style="font-family: 'Lucida Sans', Geneva, Verdana, sans-serif; font-weight: bold; color: blue; margin: 0px 5px 0px 5px; font-size: 10px;"> <?php echo strtoupper($devidor[0]); ?></p></td>
                                            <td class='col-6 py-1'> 
                                                <div class="progress">
                                                    <!--<img class='icon' src="../icon/US.png" alt="" srcset="">-->
                                                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: <?php echo $devidor[2]; ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">   </div>
                                                </div>
                                            </td>
                                            <td class='col-3 py-1'><p style="font-family: 'Lucida Sans', Geneva, Verdana, sans-serif; font-weight: bold; color: red; margin: 0px 5px 0px 5px; font-size: 10px;"> <?php echo $devidor[1].' '; ?></p></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- show cpc and com, pla, ads -->
                    <div class='col-sm-4 '>
                        <div class='card border-primary'>
                            <div class='card-body py-4'>
                                <h6>Result</h6>
                                <h3  class='head-reslt-vol'><?php echo $results;?></h3>
                            </div>
                        </div>    
                        
                        <div class='card border-primary mt-4'>
                                <div class='card-body py-4'>
                                    <div class='row'>
                                        <div class='col'>
                                            <h6>CPC</h6>
                                            <h3 class='head-reslt-vol'>$<?php echo $cpc;?></h3>
                                        </div>
                                        <div class='col'>
                                            <h6>COM</h6>
                                            <h3 class='head-reslt-vol'><?php echo $com; ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class='divider'></div>
                                <div class='card-body py-4'>
                                    <div class='row'>
                                        <div class='col'>
                                            <h6>PLA</h6>
                                            <h3 class='head-reslt-vol' style='color: rgb(100, 100, 100);'><?php echo $pla;?></h3>
                                        </div>
                                        <div class='col'>
                                            <h6>ADS</h6>
                                            <h3 class='head-reslt-vol' style='color: rgb(100, 100, 100);'><?php echo $ads;?></h3>
                                        </div>
                                    </div>
                                </div>  
                        </div>
                    </div>
                </div>

                <!-- Another Part -->
                <div class='card mt-5'>
                    <div class='card-body'>
                        <?php
                            $limitIndex=((int)sizeof($keywordVariantKey)/3)-1;
                            //echo $limitIndex;
                            $lastIndex=0;
                        ?>
                        <div class='row'>
                        <div class='col-sm-4'>
                            <h5>Keyword Variations</h5>
                            <h6 class='mt-3'><i style='font-size: 24px; font-weight: bold; font-style: normal;' class='text-info'><?php echo $keyVariationVol; ?></i><small> | Total Volume: <b style='color: blue;'><?php echo $keyVariationVolTotal; ?></b></small></h6>
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col"><small><b>Keyword</b></small></th>
                                <th scope="col"><small><b>Vol</b></small></th>
                                <th scope="col"><small><b>KD%</b></small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=0;
                                foreach($keywordVariantKey as $key): 
                                    $explodKey=explode(' - ',$key);
                                    $keyName=$explodKey[0];
                                    $keyVol=$explodKey[1];
                                    $keyKd=$explodKey[2];
                                    ?>
                                <tr>
                                    <th scope="row"><small style='color: blue;'><?php echo $keyName; ?></small></th>
                                    <td><small><b><?php echo $keyVol; ?></b></small></td>
                                    <td><small class='text-danger'><b><?php echo $keyKd; ?></b></small></td>
                                </tr>
                                <?php 
                                if($i==$limitIndex){
                                    break;
                                }
                                $i++;
                                $lastIndex++; 
                                endforeach;?>
                                <tr class='bg-info'>
                                    <td colspan='3' style='font-size: 12px; text-align: center; color: white;'><b>Show top 5 Keyword Variations</b></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class='col-sm-4'>
                            <h5>Questions</h5>
                            <h6 class='mt-3'><i style='font-size: 24px; font-weight: bold; font-style: normal;' class='text-info'><?php echo $quesVol;?></i><small> | Total Volume: <b style='color: blue;'><?php echo $quesVolTotal; ?></b></small></h6>
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col"><small><b>Keyword</b></small></th>
                                <th scope="col"><small><b>Vol</b></small></th>
                                <th scope="col"><small><b>KD%</b></small></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i=0;
                            foreach(array_slice($keywordVariantKey,$lastIndex) as $key):
                                $explodKey=explode(' - ',$key);
                                $keyName=$explodKey[0];
                                $keyVol=$explodKey[1];
                                $keyKd=$explodKey[2];
                            ?>
                                <tr>
                                    <th scope="row"><small style='color: blue;'><?php echo $keyName; ?></small></th>
                                    <td><small><b><?php echo $keyVol; ?></b></small></td>
                                    <td><small class='text-danger'><b><?php echo $keyKd; ?></b></small></td>
                                </tr>
                            <?php 
                            if($i==$limitIndex){
                                break;
                            }
                            $i++;
                            $lastIndex++; 
                            endforeach; ?>
                            <tr class='bg-info'>
                                <td colspan='3' style='font-size: 12px; text-align: center; color: white;'><b>Show top 5 Keyword Questions</b></td>
                            </tr>
                            </tbody>
                            </table>
                        </div>

                        <div class='col-sm-4 '>
                            <h5>Related Keywords</h5>
                            <h6 class='mt-3'><i style='font-size: 24px; font-weight: bold; font-style: normal;' class='text-info'><?php echo $relKeyVol;?></i><small> | Total Volume: <b style='color: blue;'><?php echo $relKeyVolTotal; ?></b></small></h6>
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col"><small><b>Keyword</b></small></th>
                                <th scope="col"><small><b>Vol</b></small></th>
                                <th scope="col"><small><b>KD%</b></small></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i=0;
                            foreach(array_slice($keywordVariantKey,$lastIndex) as $key):
                                $explodKey=explode(' - ',$key);
                                $keyName=$explodKey[0];
                                $keyVol=$explodKey[1];
                                $keyKd=$explodKey[2];
                            ?>
                                <tr>
                                    <th scope="row"><small style='color: blue;'><?php echo $keyName; ?></small></th>
                                    <td><small><b><?php echo $keyVol; ?></b></small></td>
                                    <td><small class='text-danger'><b><?php echo $keyKd; ?></b></small></td>
                                </tr>
                            <?php 
                            if($i==$limitIndex){
                                break;
                            }
                            $i++;
                            $lastIndex++; 
                            endforeach; ?>
                            <tr class='bg-info'>
                                <td colspan='3' style='font-size: 12px; text-align: center; color: white;'><b>Show top 5 Related Keywords</b></td>
                            </tr>
                            </tbody>
                            </table>
                        </div>

                    </div>
                    </div>
                </div>

                <!-- show serp analysis report -->
                <div class='card mt-3'>
                        <div class='card-body'>
                            <div class='card-header bg-dark mb-2'>
                                <h6 style='font-size: 20px; font-weight: bold; font-style: normal; color: white;'>SERP Analysis <small class='text-warning' style='font-size: 12px; font-weight: bold;'> ( Show Top Websites )</small></h6>
                            </div>
                        <table class="table table-striped p-5">
                            <tbody>
                                <?php
                                $j=1;
                                for($i=0;$i<sizeof($serpAnalysis);$i++):
                                ?>
                                <tr>
                                <th scope="row" style='font-size: 12px; font-weight: bold; font-style: normal;'><?php echo $j; ?></th>
                                <td>
                                    <a href="<?php if (isset($serpAnalysis[$i+1])){ echo $serpAnalysis[$i+1];}?>" target="_blank" style='font-size: 12px; font-weight: bold; font-style: normal;'><?php echo $serpAnalysis[$i]; ?></a>
                                </td>
                                <td style='font-size: 12px; font-weight: bold; font-style: normal; color:#358650;'>
                                    <a href="<?php if (isset($serpAnalysis[$i+1])){ echo $serpAnalysis[$i+1];}?>" target="_blank">
                                        <i class="icon-tag prefix text-primary" style='margin-right: 1px;'></i>
                                    </a><?php if (isset($serpAnalysis[$i+1])){ echo $serpAnalysis[$i+1];}?>
                                </td>
                                </tr>
                                <?php 
                                $i++;
                                $j++;
                                endfor;
                                ?>
                                <tr>
                            </tbody>
                            </table>
                        </div>
                    </div>

                    <div class='mt-5'>
                    <img class='' src="../public/image/demo-banner3.png" alt=""  style='height: 100%; width:100%'>
                    </div>
            </div>

        </div>

    </div>

</div>
</div>

</div>
</div>

<?php require 'footer.php' ?>

<?php

/*foreach($htmlDom->find('table.___STable_1m9ev-ko_ tr') as $data){
echo $data;
}*/
//$htmlDom->load_file('D:\AnikProgram\Web_Scraping\storage\cat.html');
// get tend data
// foreach($htmlDom->find('.kwo-trend-bar') as $data){
//     echo $data;
//     // if(!empty($data)){
//     //     $results=$data->innertext;
//     //     break;
//     // }
// }
// get main result information
// if(isset($_POST['submit'])){
//     $keyword=$_POST['searchContent'];
//     $search_key_word = $keyword;
//     $checkSubmit='YES';
//     //D:\AnikProgram\Web_Scraping\test.html
//     //$command = escapeshellcmd("python test.py $keyword");
//     // $command = escapeshellcmd("python tst1.py $keyword");
//     // $output = shell_exec($command);
//     //$handle = popen("test.py $keyword", 'r');
//     //$output = fread($handle, 1024);
//     //var_dump($output);
//     //pclose($handle);
// }else{
//     $checkSubmit='NO';
// }

?>
 
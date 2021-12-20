<?php

function findSearchVolume($key, $domFile){
    if($key=1){

        $i=1;
        foreach($domFile->find('.kwo-widget-total') as $data){
            
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

        return [$usSearchVolume,$globalSearchVolume];
    }
}

function findCPC($key, $domFile){
    foreach($domFile->find('.kwo-metrics-data-layout') as $data){
        if(!empty($data)){
            $cpc=(float)str_replace('$','',$data->innertext);
            break;
        }
    }

    return $cpc;
}

function findGlobalKD($key, $domFile){
    foreach($domFile->find('.kwo-kd__metric') as $data){
        //echo $data;
        if(!empty($data)){
            $globalKD=(float)str_replace('%','',$data->innertext);
            break;
        }
    }
    return $globalKD;
}


function findResultData($key, $domFile){

    foreach($domFile->find('.kwo-results') as $data){
        //echo $data;
        if(!empty($data)){
            $results=$data->innertext;
            break;
        }
    }
    return $results;
}

function find_CPC_COM_PLA_ADS($key, $domFile){
    $cpc=0;
    $com=0;
    $pla=0;
    $ads=0;

    $_s=0;
    foreach($domFile->find('.kwo-metrics-data-layout') as $data){
        if(!empty($data)){
            //echo $data->innertext;
            switch($_s){
                case 0:
                    $cpc=(float)str_replace('$','',$data->innertext);
                    break;
                case 1:
                    $com=$data->innertext;
                    break;
                case 2:
                    $pla=$data->childNodes(0)->innertext;
                    break;
                case 3:
                    $ads=$data->childNodes(0)->innertext;
                    break;      
            }
            $_s++;
        }
        //echo $cpc.' - '.$com.'</br>';

        return [$cpc,$com,$pla,$ads];
    }
}


function findGlobalCountryList($key, $domFile){

    $global_country_list=array();

    $j=0;
    foreach($domFile->find('.kwo-chart-global-volume-line') as $data){
        //$s=$data->innertext.' - ';
        $glob_contry='';
        $glob_vol=0;
        $glob_perc=0;

        if(!empty($data)){
            //echo $data;
            foreach($data->find('.kwo-chart-global-volume-line__database') as $cunty){
                $glob_contry=$cunty->innertext;
                break;
            }
            foreach($data->find('.___SText_17rlk-ko_') as $vol){
                $glob_vol=$vol->innertext;
                break;
            }
            foreach($data->find('.kwo-chart-global-volume-line__proportion') as $perc){
                $glob_perc=$perc->innertext;
                break;
            }
        }
        $global_country_list[$j]=$glob_contry.' - '.$glob_vol.' - '.$glob_perc;
        $j++;
    }

    return $global_country_list;

}


function find_keyVarint_quesVol_relVol($key, $domFile){

    $keyVariationVol='0K';
    $quesVol='0K';
    $relKeyVol='0K';

    $i=0;
    foreach($domFile->find('.kwo-widget-suggestion-totals .___SText_17rlk-ko_') as $data){
        //echo $data.'</br>';
        if(!empty($data)){
            switch($i){
                case 0:
                    $keyVariationVol=$data->innertext;
                    break;
                case 1:
                    $quesVol=$data->innertext;
                    break;
                case 2:
                    $relKeyVol=$data->innertext;
                    break;
            }
            if($i==3){
                break;
            }
            $i++;
        }
    }

    return [$keyVariationVol, $quesVol, $relKeyVol];
}


function find_keyVariTot_quesVolTot_relKeyVolTot($key, $domFile){
    $keyVariationVolTotal;
    $quesVolTotal;
    $relKeyVolTotal;
    $i=0;
    foreach($domFile->find('.kwo-widget-suggestion-totals .kwo-widget-suggestion-totals__value') as $data){
        //echo $data.'</br>';
        if(!empty($data)){
            switch($i){
                case 0:
                    $keyVariationVolTotal=$data->innertext;
                    break;
                case 1:
                    $quesVolTotal=$data->innertext;
                    break;
                case 2:
                    $relKeyVolTotal=$data->innertext;
                    break;
            }
            if($i==3){
                break;
            }
            $i++;
        }
    }

    return [$keyVariationVolTotal, $quesVolTotal, $relKeyVolTotal];
}


function find_keywordVariantKey_serpAnalysis($key, $domFile){

    $keywordVariantKey=array();
    $serpAnalysis=array();

    $j=0;
    // get others keyword lists
    foreach($domFile->find('table.___STable_1m9ev-ko_ tr') as $data){
        //echo $data.'</br>';
        if(!empty($data)){
            $keyword='';
            $vol='';
            $kd='';
            $i=0;

            foreach($data->find('span.___SText_17rlk-ko_') as $s){
                $keyword=$s->innertext;
            }

            foreach($data->find('span.kwo-widget-suggestion-done__small-text') as $s){

                switch($i){
                    case 0:
                        $vol=$s->innertext;
                        $i++;
                        break;
                    case 1:
                        $kd=$s->innertext;
                        $i=0;
                        break;
                }
            }

            if((!empty($keyword)) && (!empty($vol)) && (!empty($kd))){
                $keywordVariantKey[$j]=$keyword.' - '.$vol.' - '.$kd;
                $j++;
            }
        }
    }

    $i=0;
    foreach($domFile->find('table.kwo-serp-table__table tr.___SRow_1m9ev-ko_ td.___SText_158ur-ko_ span.___SText_17rlk-ko_') as $data){
        //echo $data.'</br>';
        if(!empty($data)){
            $serpAnalysis[$i]=$data->innertext;
            $i++;
        }
    }

    return [$keywordVariantKey, $serpAnalysis];
}
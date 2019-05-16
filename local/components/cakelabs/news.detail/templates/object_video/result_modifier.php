<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$video = explode('?',$arResult["PROPERTIES"]["LINK"]["VALUE"])?>
<?$tube_val = str_replace('youtu.be','youtube.com/embed',$arResult["PROPERTIES"]["LINK"]["VALUE"],$count_str); // если вставляем с youtube как поделиться
$arTubeId = explode('/',$arResult["PROPERTIES"]["LINK"]["VALUE"]);
$tubeId = end($arTubeId);
$arResult["PROPERTIES"]["LINK"]["VALUE_IMG"] = 'https://img.youtube.com/vi/'.$tubeId.'/sddefault.jpg';
?>
<?if($count_str == 0){?>
    <?if($video[1]){
        $tube_video_2 = explode('&',$video[1]);
        foreach($tube_video_2 as $tube_video_2_val){
            if(strpos('sum_str'.$tube_video_2_val,'v=')){
                $tube_val = 'http://youtube.com/embed/'.str_replace('v=','',$tube_video_2_val,$count_str); // для ссылки вида http://youtube.com/?v=yrtyrthrdghtgd
            }

            $arResult["PROPERTIES"]["LINK"]["VALUE_IMG"] = 'https://img.youtube.com/vi/'.$tube_video_2_val.'/sddefault.jpg';
            // https://img.youtube.com/vi/uhBHL3v4d3I/sddefault.jpg
        }
    }?>
<?}?>
<?if($count_str == 0){
    $tube_val = $arResult["PROPERTIES"]["LINK"]["VALUE"]; // если не то и не то оставляем как есть
}?>
<?$arResult["PROPERTIES"]["LINK"]["VALUE_SHOW"] = $tube_val;?>

<?php

//Обрабатываем даты

$timestamp_start = MakeTimeStamp($arResult['PROPERTIES']['PERIOD_START']['VALUE'], "DD.MM.YYYY");
$arResult['PROPERTIES']['PERIOD_START']['VALUE'] = date("m.Y", $timestamp_start);

$timestamp_end = MakeTimeStamp($arResult['PROPERTIES']['PERIOD_END']['VALUE'], "DD.MM.YYYY");
$arResult['PROPERTIES']['PERIOD_END']['VALUE'] = date("m.Y", $timestamp_end);

$img = CFile::ResizeImageGet(
    $arResult['DETAIL_PICTURE']['ID'],
    array("width" => 1920, "height" => 640),
    BX_RESIZE_IMAGE_EXACT,
    true,
    false
);
$arResult['DETAIL_PICTURE']['SRC'] = $img['src'];


if (!empty($arResult["PROPERTIES"]["MORE_PHOTOS"]["VALUE"])){
    foreach ($arResult["PROPERTIES"]["MORE_PHOTOS"]["VALUE"] as $photo){
        $s = CFile::ResizeImageGet(
            $photo,
            array("width" => 1720, "height" => 700),
            BX_RESIZE_IMAGE_EXACT,
            true,
            false
        );
        if ($s){
            $pics[] = $s['src'];
        }
    }
}

$arResult['PROPERTIES']["MORE_PHOTOS"]['VALUE'] = $pics;




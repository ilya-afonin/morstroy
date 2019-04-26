<?php
foreach ($arResult['ITEMS'] as $k => $arItem){

    $img = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']['ID'],
        array("width" => 290, "height" => 395),
        BX_RESIZE_IMAGE_EXACT,
        true,
        false
    );

    $arResult['ITEMS'][$k]['RESIZED_PICTURE']['SRC'] = $img['src'];

    $img_fon = CFile::ResizeImageGet(
        $arItem['DETAIL_PICTURE']['ID'],
        array("width" => 1675, "height" => 1117),
        BX_RESIZE_IMAGE_EXACT,
        true,
        false
    );

    $arResult['ITEMS'][$k]['DETAIL_PICTURE']['SRC'] = $img_fon['src'];

    /*if (!empty($arItem["PROPERTIES"]["MORE_PHOTOS"]["VALUE"])){
        foreach ($arItem["PROPERTIES"]["MORE_PHOTOS"]["VALUE"] as $photo){
            $s = CFile::ResizeImageGet(
                $photo,
                array("width" => 1920, "height" => 1080),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true,
                false
            );
            if ($s){
                $pics[] = $s['src'];
            }
        }
    }*/

//$arResult['ITEMS'][$k]['PROPERTIES']["MORE_PHOTOS"]['VALUE'] = $pics;
}

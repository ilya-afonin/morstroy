<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(sizeof($arResult['PROPERTIES']['FILE']['VALUE'])>0) {
    // resize images
    foreach($arResult['PROPERTIES']['FILE']['VALUE'] as $key=>$id){
        $arResult['PROPERTIES']['FILE']['RESIZE'][$key] = CFile::ResizeImageGet($id, array('width'=>1300, 'height'=>780), BX_RESIZE_IMAGE_EXACT, true)['src'];
    }
}

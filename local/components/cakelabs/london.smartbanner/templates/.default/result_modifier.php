<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["BANNERS"] as $key=> $banner){
    $arResult["BANNERS"][$key]['RESIZE'] = CFile::ResizeImageGet($banner["PICTURE"], array('width'=>4096, 'height'=>4096), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
}
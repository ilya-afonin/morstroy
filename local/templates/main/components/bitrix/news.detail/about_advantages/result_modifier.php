<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult["PROPERTIES"]["MORE_PHOTOS"]["VALUE"])){
  foreach ($arResult["PROPERTIES"]["MORE_PHOTOS"]["VALUE"] as $photo){
    $s = CFile::ResizeImageGet(
        $photo,
        array("width" => 2560, "height" => 1440),
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
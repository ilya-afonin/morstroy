<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/*--------Режем картинки видео и сертификатов--------*/
if (count($arResult['ITEMS']) > 0) {
  foreach ($arResult['ITEMS'] as $i => $arItem) {

    $s = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']['ID'],
        array("width" => 1920, "height" => 1080),
        BX_RESIZE_IMAGE_EXACT,
        true,
        false
    );

    $arResult['ITEMS'][$i]['PREVIEW_PICTURE']['SRC'] = $s['src'];

  }
}
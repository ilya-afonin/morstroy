<?
$rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ID" => $arResult['SECTION']['PATH'][0]['ID']), false, $arSelect = array("UF_*")); // возвращаем список разделов с нужными нам пользовательскими полями. UF_* - в таком виде выведет все доступные для данного раздела поля.

if($arSection = $rsResult -> GetNext())
{
  $arResult['SECTION']['PATH'][0] = array_merge($arResult['SECTION']['PATH'][0], $arSection);
}

/*--------Режем картинки элементов--------*/
if (count($arResult['ITEMS']) > 0){
  foreach ($arResult['ITEMS'] as $i => $arItem){

    $s = CFile::ResizeImageGet(
        $arItem['PREVIEW_PICTURE']['ID'],
        array("width" => 640, "height" => 480),
        BX_RESIZE_IMAGE_EXACT,
        true,
        false
    );
    $arResult['ITEMS'][$i]['PREVIEW_PICTURE']['SRC'] = $s['src'];

  }
}
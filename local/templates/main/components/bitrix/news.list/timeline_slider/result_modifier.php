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


// получаем разделы
$dbResSect = CIBlockSection::GetList(
    Array("NAME"=>"DESC"),
    Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'])
);
//Получаем разделы и собираем в массив
while($sectRes = $dbResSect->GetNext())
{
  $arSections[] = $sectRes;
}
//Собираем  массив из Разделов и элементов
foreach($arSections as $arSection){
  foreach($arResult["ITEMS"] as $key=>$arItem){
    if($arItem['IBLOCK_SECTION_ID'] == $arSection['ID']){
      $arSection['ELEMENTS'][] =  $arItem;
    }
  }
  $arElementGroups[] = $arSection;
}
$arResult["ITEMS"] = $arElementGroups;
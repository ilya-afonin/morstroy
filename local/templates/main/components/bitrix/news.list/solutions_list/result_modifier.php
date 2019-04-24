<?
$rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ID" => $arResult['SECTION']['PATH'][0]['ID']), false, $arSelect = array("UF_*")); // возвращаем список разделов с нужными нам пользовательскими полями. UF_* - в таком виде выведет все доступные для данного раздела поля.

if($arSection = $rsResult -> GetNext())
{
  $arResult['SECTION']['PATH'][0] = array_merge($arResult['SECTION']['PATH'][0], $arSection);
}

//Собираем значения свойств привязанных по ссылке

foreach ($arResult['ITEMS'] as $i => $arItem){

  $res = CIBlockElement::GetByID($arItem['PROPERTIES']['GRUNT']['VALUE']);
  if($ar_res = $res->GetNext())
    $arResult['ITEMS'][$i]['PROPERTIES']['GRUNT']['DISPLAY_NAME'] = $ar_res['NAME'];
    $arResult['ITEMS'][$i]['PROPERTIES']['GRUNT']['DISPLAY_LINK'] = $ar_res['DETAIL_PAGE_URL'];

  $res = CIBlockElement::GetByID($arItem['PROPERTIES']['SHPAT']['VALUE']);
  if($ar_res = $res->GetNext()) {
    $arResult['ITEMS'][$i]['PROPERTIES']['SHPAT']['DISPLAY_NAME'] = $ar_res['NAME'];
    $arResult['ITEMS'][$i]['PROPERTIES']['SHPAT']['DISPLAY_LINK'] = $ar_res['DETAIL_PAGE_URL'];
  }

  $res = CIBlockElement::GetByID($arItem['PROPERTIES']['FINISH']['VALUE']);
  if($ar_res = $res->GetNext()){
    $arResult['ITEMS'][$i]['PROPERTIES']['FINISH']['DISPLAY_NAME'] = $ar_res['NAME'];
    $arResult['ITEMS'][$i]['PROPERTIES']['FINISH']['DISPLAY_LINK'] = $ar_res['DETAIL_PAGE_URL'];
  }

  $iterator = CIBlockElement::GetList(array('SORT' => 'ASC'), array('IBLOCK_ID' => $arItem['PROPERTIES']['EXPLOITATION']['LINK_IBLOCK_ID'], 'ID' => $arItem['PROPERTIES']['EXPLOITATION']['VALUE']), false, false, array("NAME"));
  while ($row = $iterator->GetNext())
  {
    $arResult['ITEMS'][$i]['PROPERTIES']['EXPLOITATION']['DISPLAY_VALUE'][] = $row['NAME'];
  }

}

/*--------Вынимаем информацию по остальным секциям на этом же уровне--------*/
$rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "!ID" => $arResult['SECTION']['PATH'][0]['ID'],  "DEPTH_LEVEL" => $arResult['SECTION']['PATH'][0]['DEPTH_LEVEL']), false, $arSelect = array("SECTION_PAGE_URL", "NAME"));

while($arSec = $rsResult->GetNext())
{
    $arResult['OTHER_SECTIONS'][] = $arSec;
}
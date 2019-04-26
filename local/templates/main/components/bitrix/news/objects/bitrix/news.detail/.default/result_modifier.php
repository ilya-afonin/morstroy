<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult['DETAIL_PICTURE']['ID']){
    $arResult['DETAIL_PICTURE']['RESIZE'] = CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array('width'=>1400, 'height'=>10000), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
}else{
    //$arResult['RESIZE'] = SITE_TEMPLATE_PATH.'/tpl/assets/images/content/n-item-not-found.png';
}

$db_old_groups = CIBlockElement::GetElementGroups($arResult['ID'], true,array('CODE','NAME','IBLOCK_ELEMENT_ID'));
while($ar_group = $db_old_groups->Fetch()){
    $arGroupsInfo[$ar_group["IBLOCK_ELEMENT_ID"]][] = $ar_group;
}

foreach($arGroupsInfo as $key_elem=>$arSecInfo){
    if($arResult['ID'] == $key_elem){
        $arResult['SECTION_INFO'] = $arSecInfo;
    }
}
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

switch (PAGE){
  case 'home':
    $class = ' home__clients';
    break;
  case 'about':
    $class = ' reviews__clients';
    break;
  default:
    $class = '';
    break;
}
?>



<div class="clients<?=$class?>">

  <?foreach ($arResult['ITEMS'] as $i => $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>

    <?
      if(file_exists($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arItem['PROPERTIES']['LOGO']['VALUE'])))
          echo file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arItem['PROPERTIES']['LOGO']['VALUE']));
    ?>

  <?endforeach;?>

  <a class="clients__link <?=$class?>-link<?=(PAGE == 'about')?' button':''?>" href="/feeds/" alt="<?=Loc::getMessage('SHOW_ALL')?>">
    <?if(PAGE == 'about'):?>
      <?=Loc::getMessage('SHOW_ALL_ABOUT')?> →
    <?else:?>
      <?=Loc::getMessage('SHOW_ALL')?> →</a>
    <?endif;?>
  </a>
</div>

<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<div class="advantages__slider swiper-container">
  <ul class="swiper-wrapper advantages__list">
  <? foreach ($arResult['ITEMS'] as $i => $arItem): ?>

    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>

    <li class="swiper-slide advantages__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
      <div style="background-image: url(<?=$arItem['DISPLAY_PROPERTIES']['ICON']['FILE_VALUE']['SRC']?>)"></div>
      <h3><?=$arItem['NAME']?></h3>
      <p><?=html_entity_decode($arItem['PREVIEW_TEXT'])?></p> 
    </li>

  <? endforeach; ?>
  </ul>
  <div class="advantages__navigation slider-nav">
    <div class="advantages__button advantages__button_prev slider-btn"></div>
    <div class="advantages__button advantages__button_next slider-btn slider-btn_next"></div>
  </div>
</div>

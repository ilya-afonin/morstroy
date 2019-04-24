<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="equipments-slider__container swiper-container">

  <div class="swiper-wrapper">

    <?foreach ($arResult['ITEMS'] as $i => $arItem):?>
      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>

      <div class="equipments-slider__slide swiper-slide" style="background-image: url(<?=$arItem['DISPLAY_PROPERTIES']['FON']['FILE_VALUE']['SRC']?>)">
        <p><?=$arItem['NAME']?></p>
      </div>
    <?endforeach;?>

  </div>

  <div class="equipments-slider__navigation-wrap">
    <div class="equipments-slider__navigation slider-nav">
      <div class="equipments-slider__button equipments-slider__button_prev slider-btn slider-btn_color"></div>
      <div class="equipments-slider__button equipments-slider__button_next slider-btn slider-btn_color slider-btn_next"></div>
    </div><a class="button equipments-slider__button-show-all" href="/equipment/" title="Флот">Флот →</a>
  </div>
</div>



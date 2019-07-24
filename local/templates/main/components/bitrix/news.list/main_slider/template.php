<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="home-slider swiper-container">

  <div class="home-slider__board">
    <p class="home-slider__text"></p>
  </div>

  <div class="swiper-wrapper">

  <?foreach ($arResult['ITEMS'] as $i => $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <?if(!empty($arItem['PROPERTIES']['VIDEO']['VALUE'])):?>
      <div class="swiper-slide swiper-lazy home-slider__item" data-background="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="swiper-lazy-preloader"></div>
        <video class="swiper-lazy" data-src="<?=$arItem['DISPLAY_PROPERTIES']['VIDEO']['FILE_VALUE']['SRC']?>" autoplay muted loop></video>
        <div class="home-slider__item-inner">
          <p class="home-slider__item-text"><?=html_entity_decode($arItem['PREVIEW_TEXT'])?></p>
        </div>
      </div>
    <?else:?>
      <div class="swiper-slide swiper-lazy home-slider__item" data-background="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="swiper-lazy-preloader"></div>
        <div class="home-slider__item-inner">
          <p class="home-slider__item-text"><?=html_entity_decode($arItem['PREVIEW_TEXT'])?></p>
        </div>
      </div>
    <?endif;?>
  <?endforeach;?>

  </div>
  <div class="home-slider__navigation slider-nav">
    <div class="home-slider__button home-slider__button_prev slider-btn"></div>
    <div class="home-slider__button home-slider__button_next slider-btn slider-btn_next"></div>
    <div class="home-slider__counter"></div>
  </div>
</div>

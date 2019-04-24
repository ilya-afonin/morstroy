<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="home-slider swiper-container">
  <div class="swiper-wrapper">

  <?foreach ($arResult['ITEMS'] as $i => $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="swiper-slide home-slider__item" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
      <div class="home-slider__item-inner">
        <p class="home-slider__item-text"><?=html_entity_decode($arItem['PREVIEW_TEXT'])?></p>
        <div class="home-slider__links-wrap">
          <a class="button" href="/about/" alt="О компании">О компании</a>
          <a class="home-slider__link" href="/objects/" alt="Объекты">Объекты</a></div>
      </div>
    </div>
  <?endforeach;?>
  </div>
  <div class="home-slider__navigation slider-nav">
    <div class="home-slider__button home-slider__button_prev slider-btn"></div>
    <div class="home-slider__button home-slider__button_next slider-btn slider-btn_next"></div>
    <div class="home-slider__counter"></div>
  </div>
</div>


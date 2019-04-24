<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
//use Bitrix\Main\Localization\Loc;

//Loc::loadMessages(__FILE__);

?>

<div class="detail">
  <div class="detail__text">
    <div class="detail__type">
      <span class="detail__type-desc"><?=$arResult['PROPERTIES']['TYPE']['VALUE']?></span>
      <h2 class="detail__title"><?=$arResult['NAME']?></h2>
    </div>

    <div class="detail__city">
      <span class="detail__info"><?=$arResult['PROPERTIES']['PORT']['VALUE']?></span>
      <p class="detail__desc">Порт прописки</p>
    </div>
    <?foreach($arResult['PROPERTIES']['OPTIONS']['VALUE'] as $o => $option):?>
      <div class="detail__item">
        <span class="detail__info">
          <?=$arResult['PROPERTIES']['OPTIONS']['DESCRIPTION'][$o];?>
        </span>
        <p class="detail__desc"><?=$option?></p>
      </div>
    <?endforeach;?>
  </div>
  <div class="detail__slider">
    <div class="swiper-wrapper">
      <?foreach ($arResult['PROPERTIES']['MORE_PHOTOS']['VALUE'] as $photo):?>
        <div class="detail__slide swiper-slide" style="background-image: url(<?=$photo?>)"></div>
      <?endforeach;?>
    </div>
    <div class="detail__slider-navigation slider-nav">
      <div class="detail__slider-button detail__slider-button_prev slider-btn"></div>
      <div class="detail__slider-button detail__slider-button_next slider-btn slider-btn_next"></div>
    </div>
  </div>
</div>
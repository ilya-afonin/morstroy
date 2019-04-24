<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
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

Debug::dtc($arParams,'params');
Debug::dtc($arResult,'result');

?>

<div class="img-bg" <?if(!empty($arResult['DETAIL_PICTURE']['SRC'])){?>style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>)"<?}?>></div>

<section>
  <div class="container page__container">

    <div class="page__card page__card_title">
      <a class="page__back" href="<?=$arResult['LIST_PAGE_URL']?>" title="Вернуться назад"></a>

      <span><?=$arResult['DISPLAY_ACTIVE_FROM']?></span>

      <h1 class="title"><?=$arResult['NAME']?></h1>

      <p><?=$arResult['PREVIEW_TEXT']?></p>
      <!--<span class="count"><?/*=$arParams['COUNT']*/?></span>-->
    </div>

    <div class="page__card page__card-info">
      <div class="page__card-inner">

        <?if(!empty($arResult['PROPERTIES']['PERIOD_START']['VALUE']) || !empty($arResult['PROPERTIES']['PERIOD_END']['VALUE'])):?>
          <span>
            <?=$arResult['PROPERTIES']['PERIOD_START']['VALUE']?>
            <?if(!empty($arResult['PROPERTIES']['PERIOD_END']['VALUE'])):?>
            - <?=$arResult['PROPERTIES']['PERIOD_END']['VALUE']?>
            <?endif;?>
          </span>
          <p><?=Loc::getMessage('PERIOD')?></p>
        <?endif;?>

        <?if(!empty($arResult['PROPERTIES']['CLIENT']['VALUE'])):?>
          <span><?=$arResult['PROPERTIES']['CLIENT']['VALUE']?></span>
          <p><?=Loc::getMessage('CLIENT')?></p>
        <?endif?>

      </div>
    </div>
    <?if(!empty($arResult['DETAIL_TEXT'])):?>
      <div class="page__card">
        <h2><?=Loc::getMessage('DESC')?></h2>
        <p class="left-line"><?=$arResult['DETAIL_TEXT']?></p>
      </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['SOSTAV']['DISPLAY_VALUE'])):?>
      <div class="page__card">
        <h2><?=Loc::getMessage('SOSTAV')?></h2>
        <?=$arResult['DISPLAY_PROPERTIES']['SOSTAV']['DISPLAY_VALUE']?>
      </div>
    <?endif;?>
    <?if(!empty($arResult['DISPLAY_PROPERTIES']['SCHEMA']['DISPLAY_VALUE'])):?>
      <div class="page__card">
        <h2><?=Loc::getMessage('SCHEMA')?></h2>
        <p class="left-line">
          <?=$arResult['DISPLAY_PROPERTIES']['SCHEMA']['DISPLAY_VALUE']?>
        </p>
    </div>
    <?endif;?>
  </div>
</section>
<? if(count($arResult['DISPLAY_PROPERTIES']['FEATURES']['VALUE']) > 0) { ?>
  <section class="steps">
    <div class="steps__container container">
      <h2 class="steps__title title_section"><?=Loc::getMessage('FEATURES')?></h2>
      <ul class="steps__list">
        <?foreach($arResult['DISPLAY_PROPERTIES']['FEATURES']['VALUE'] as $f => $feature):?>
          <li>
            <h3><?=$arResult['DISPLAY_PROPERTIES']['FEATURES']['DESCRIPTION'][$f]?></h3>
            <p><?=$feature?></p>
          </li>
        <?endforeach;?>
      </ul>
    </div>
  </section>
<? } ?>
<section class="page__section">
  <div class="slider swiper-container container">
    <div class="swiper-wrapper">
      <?foreach($arResult['PROPERTIES']['MORE_PHOTOS']['VALUE'] as $p => $photo):?>
        <div class="slide slider__item swiper-slide" style="background-image: url(<?=$photo?>)">
          <div class="slide__inner slider__inner">
            <h3><?=$arResult['NAME']?></h3>
            <p><?=$arResult['PREVIEW_TEXT']?></p>
          </div>
        </div>
      <?endforeach;?>
    </div>
    <div class="slider__navigation slider-nav">
      <div class="slider__button slider__button_prev slider-btn slider-btn_color"></div>
      <div class="slider__button slider__button_next slider-btn slider-btn_color slider-btn_next"></div>
    </div>
  </div>
</section>
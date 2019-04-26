<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>

<div class="timeline__slider swiper-container">
  <div class="timeline__slider-wrap swiper-wrapper">
    <?foreach ($arResult['ITEMS'] as $i => $arSection):?>
      <div class="timeline__year swiper-slide">
        <span><?=$arSection['NAME']?></span>
      </div>
    <?endforeach;?>
  </div>
  <div class="timeline__nav slider-nav">
    <div class="timeline__btn timeline__btn_prev slider-btn slider-btn_color"></div>
    <div class="timeline__btn timeline__btn_next slider-btn slider-btn_color slider-btn_next"></div>
  </div>
</div>

<div class="timeline__content-wrap">

  <?foreach ($arResult['ITEMS'] as $s => $arSection):?>

    <div class="timeline__year-content <?=($s==0)?'timeline__year-content_active':''?>" data-year="<?=$arSection['NAME']?>">

      <?foreach($arSection['ELEMENTS'] as $arItem):?>

        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <article class="timeline-card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

          <div class="timeline-card__desc">
            <h3><?=$arItem['NAME']?></h3>
            <p><?=$arItem['PREVIEW_TEXT']?></p>
          </div>

          <div class="timeline-card__detail">
            <ul class="timeline-card__features">
              <?foreach ($arItem['PROPERTIES']['WORKS']['VALUE'] as $w => $work):?>
                <li class="timeline-card__features-item">
                  <span><?=$arItem['PROPERTIES']['WORKS']['DESCRIPTION'][$w]?></span>
                  <p><?=$work?></p>
                </li>
              <?endforeach;?>
            </ul>
            <h4><?=Loc::getMessage('DESC')?></h4>
            <p><?=$arItem['DETAIL_TEXT']?></p>
          </div>
          <div class="timeline-card__link"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=Loc::getMessage('MORE')?></a></div>
        </article>

      <?endforeach;?>

    </div>

  <?endforeach;?>
</div>
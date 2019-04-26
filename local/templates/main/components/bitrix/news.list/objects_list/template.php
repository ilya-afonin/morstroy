<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<? foreach ($arResult['ITEMS'] as $i => $arItem): ?>

  <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
  ?>

  <a class="card<?=($i%2==1)?' card_turn':'';?>" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" title="<?=$arItem['NAME']?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
    <div class="card__text">
      <span><?=$arItem['DISPLAY_ACTIVE_FROM']?></span>
      <h2 class="title"><?=$arItem['NAME']?></h2>
      <p><?=html_entity_decode($arItem['PREVIEW_TEXT'])?></p>
    </div>
    <div class="card__img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
  </a>

<? endforeach; ?>

<?/*
<div class="index__works-ajax">
  <? if ($arResult['NAV_RESULT']->NavPageCount > 1) { ?>
    <button href="#"
       class="works-ajax button"
       data-url="/"
       data-navnum="<?= $arResult['NAV_RESULT']->NavNum; ?>"
       data-curpage="<?= $arResult['NAV_RESULT']->NavPageNomer; ?>"
       data-countpage="<?= $arResult['NAV_RESULT']->NavPageCount; ?>">Показать еще
    </button>
  <? } ?>
</div>
<? */ ?>

<?

  if(!empty($arResult['NAV_STRING'])){
    echo $arResult['NAV_STRING'];
  }

?>


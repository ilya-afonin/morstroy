<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<? foreach ($arResult['ITEMS'] as $i => $arItem): ?>

  <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
  ?>

  <a class="card-two<?=($i%2==1)?' card-two_turn':'';?>" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" title="<?=$arItem['NAME']?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
    <div class="card-two__img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
    <div class="card-two__text">
      <p><?=html_entity_decode($arItem['PREVIEW_TEXT'])?></p>
      <h2 class="title"><?=$arItem['NAME']?></h2>
    </div>
  </a>

<? endforeach; ?>

<?

  if(!empty($arResult['NAV_STRING'])){
    echo $arResult['NAV_STRING'];
  }

?>


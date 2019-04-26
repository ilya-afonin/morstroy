<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
/** @var array $arParams */
/** @var array $arItem */
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
?>

<? if (count($arResult['ITEMS']) > 0): ?>
  <? foreach ($arResult['ITEMS'] as $k => $arItem): ?>
  <article class="feed-preview<?=($k % 2 == 1)?' feed-preview_turn':''?>">
    <div class="feed-preview__img" style="background-image: url(<?=$arItem['DETAIL_PICTURE']['SRC']?>)">
      <img src="<?=$arItem['RESIZED_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" data-full="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"/>
    </div>
    <div class="feed-preview__text">
      <h3 class="title"><?=$arItem['NAME']?></h3>
      <p><?=$arItem['PREVIEW_TEXT']?></p>
      <button class="feed-preview__button-show"><?=Loc::getMessage('SHOW_FEED')?></button>
    </div>
  </article>
  <? endforeach ?>

  <?if(!empty($arResult['NAV_STRING'])):?>
    <?echo $arResult['NAV_STRING'];?>
  <?endif;?>

<? endif ?>

<script>
    // передаем параметры в core
    var component_arParams = <?echo CUtil::PhpToJSObject(array())?>;
</script>

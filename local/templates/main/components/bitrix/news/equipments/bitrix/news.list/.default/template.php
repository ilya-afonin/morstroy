<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="equipment__list">
  <?foreach($arResult["ITEMS"] as $arSection):?>
    <li class="equipment__category">

      <h2><?=$arSection['NAME']?></h2>
      <?foreach ($arSection['ELEMENTS'] as $arItem):?>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem['NAME']?>"><span><?=$arItem['NAME']?></span></a>
      <?endforeach;?>
    </li>
  <?endforeach;?>
</ul>

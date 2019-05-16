<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

?>


<nav class="nav header__nav">
<?php if (!empty($arResult)){ ?>
  <ul class="nav__list">
        <?$i=1;?>
        <?php foreach($arResult as $arItem){ ?>
            <?if($i==1):?>
              <li class="nav__item nav__item_sublist-wrap">
                <ul class="nav__inner-list">
            <?endif;?>
            <?if(empty($arItem["CHILD"])):?>

              <li class="nav__item">
                <a class="nav__link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
              </li>

            <?else:?>

              <li class="nav__inner-item">
                <span class="nav__sublist-arrow<?if($APPLICATION->GetProperty("header_white") == 'Y' ) echo ' nav__sublist-arrow_white';?>"></span><?=$arItem["TEXT"]?>
                <ul class="nav__sublist">
                  <?php foreach($arItem["CHILD"] as $child){ ?>
                    <li class="nav__subitem">
                      <a class="nav__link" href="<?=$child["LINK"]?>"><?=$child["TEXT"]?></a>
                    </li>
                  <?php } ?>
                </ul>
              </li>

            <?endif?>

            <?if($i==2):?>
              </ul>
            </li>
            <?endif;?>
          <?$i++;?>
        <?php } ?>

    </ul>
<?php } ?>
</nav>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<div class="container">
  <div class="faq">
    <div class="faq__fingerprint"><img src="<?=SITE_TEMPLATE_PATH?>/tpl/assets/images/content/tree-circles_1.svg" alt=""></div>

    <div class="faq__themes">
      <?foreach($arResult["ITEMS"] as $k => $arSection):?>
        <div class="faq__theme<?=($k==0)?' is-active':'';?>"><?=$arSection['NAME']?></div>
      <?endforeach;?>
    </div>
    <div class="faq__asks">
      <?foreach($arResult["ITEMS"] as $k => $arSection):?>
        <div class="faq__asks-item<?=($k==0)?' is-active':'';?>">
          <?foreach ($arSection['ELEMENTS'] as $arItem):?>
            <div class="faq__ask">
              <div class="faq__ask-top"><?=$arItem['NAME']?></div>
              <div class="faq__ask-answer"><?=$arItem['PREVIEW_TEXT']?></div>
            </div>
          <?endforeach;?>
        </div>
      <?endforeach;?>
    </div>
  </div>
</div>
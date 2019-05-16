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


<div class="video" id="<?echo $this->GetEditAreaId($arResult['ID'])?>">
    <div class="video__title"><?= $arResult['NAME']?></div>
    <div class="video__container"
         <?if($arResult["PROPERTIES"]["LINK"]["VALUE_IMG"]){?>
             style="background-image: url('<?= $arResult["PROPERTIES"]["LINK"]["VALUE_IMG"]?>')"
         <?}else{?>
             style="background-image: url(<?= SITE_TEMPLATE_PATH?>/tpl/assets/images/content/slide.jpg)"
         <?}?>>
        <a class="video__link youtube-play" href="<?= $arResult["PROPERTIES"]["LINK"]["VALUE"];?>"></a>
        <div class="video__content">
            <div class="video__text"><?= strip_tags($arResult['PREVIEW_TEXT'])?></div>
            <div class="video__play"></div>
        </div>
    </div>
</div>
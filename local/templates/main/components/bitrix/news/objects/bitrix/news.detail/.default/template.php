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


<div class="c-page__banner" id="<?echo $this->GetEditAreaId($arResult['ID'])?>">
    <div class="banner banner--static">
        <div class="banner__bg" style="background-image: url(<?= $arResult['DETAIL_PICTURE']['RESIZE']?>);"></div>
    </div>
</div>
<div class="c-page__info">
    <div class="c-page__date"><?= $arResult['DISPLAY_ACTIVE_FROM']?></div>
    <div class="c-page__hash">
        <?foreach($arResult["SECTION_INFO"] as $key_info=>$arInfo){?>
            <a class="c-page__hash-link" href="<?= $arResult['LIST_PAGE_URL'].$arInfo['CODE'].'/'?>">#<?= $arInfo['NAME']?></a>
        <?}?>
    </div>
</div>
<div class="c-page__content">
    <?
    // сначала проверяем префикс #object_ , такой префикс будет у всех динамических блоков
    $slider_split = preg_split('/#object_(.+)#/U',$arResult['DETAIL_TEXT'],NULL,PREG_SPLIT_DELIM_CAPTURE);

    include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/include_areas/includes/regEx.php');
    ?>
</div>
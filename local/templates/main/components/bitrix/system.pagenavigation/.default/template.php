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


    if ($arResult["NavRecordCount"] == 0 || $arResult["NavPageCount"] == 1 ) return;


    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

    $baseUrl = $arResult["sUrlPath"]."?".$strNavQueryString."PAGEN_".$arResult["NavNum"]."=";

    $firstPage = ($strNavQueryString != "") ? $arResult["sUrlPath"]."?".$strNavQueryString : $arResult["sUrlPath"];

    $nextPage = $baseUrl . ($arResult["NavPageNomer"] + 1);
    $prevPage = ($arResult["NavPageNomer"] == 2) ? $firstPage : $baseUrl . ($arResult["NavPageNomer"] - 1);

?>

<?php if ($arResult["NavPageCount"] > 1): ?>
    <div class="pagination">

        <?php if ($arResult["NavPageNomer"] > 1): ?>
            <a class="pagination__link pagination__link--arr-back" href="<?= $prevPage ?>"></a>
        <?php endif; ?>

        <?php for ($page = 1; $page <= $arResult["nEndPage"]; $page++) : ?>
            <?php
                $link = ($page == 1) ? $firstPage : $baseUrl . $page;
                $class = ($page == $arResult["NavPageNomer"]) ? "is-active" : "";
            ?>
            <a class="pagination__link <?= $class ?>" href="<?= $link ?>"><?= $page ?></a>
        <?php endfor; ?>

        <?php if ($arResult["NavPageNomer"] < $arResult["nEndPage"]): ?>
            <a class="pagination__link pagination__link--arr-frw" href="<?= $nextPage ?>"></a>
        <?php endif; ?>
    </div>
<?php endif; ?>


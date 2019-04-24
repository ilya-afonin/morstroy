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
<div class="welcome">
  <div class="welcome__inner">
    <div class="welcome__aside">
      <div class="welcome__aside-content">
        <div class="welcome__aside-bread">
          <?$APPLICATION->IncludeComponent(
              "bitrix:breadcrumb",
              "main",
              Array(
                  "PATH" => "",
                  "SITE_ID" => "s1",
                  "START_FROM" => "0"
              )
          );?>
        </div>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "section",
    Array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "NEWS_COUNT" => $arParams["NEWS_COUNT"],
        "SORT_BY1" => $arParams["SORT_BY1"],
        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
        "SORT_BY2" => $arParams["SORT_BY2"],
        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "FILE_404" => $arParams["FILE_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
        "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
        "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
        "FILTER_NAME" => $arParams["FILTER_NAME"],
        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],

        "PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
        "PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
    ),
    $component
); ?>

<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.smart.filter",
    "solutions",
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_ID" => '',
        "FILTER_NAME" => $arParams["FILTER_NAME"],
//            "PRICE_CODE" => $arParams["PRICE_CODE"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "SAVE_IN_SESSION" => "N",
//            "FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
        "XML_EXPORT" => "N",
        "SECTION_TITLE" => "NAME",
        "SECTION_DESCRIPTION" => "DESCRIPTION",
        'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
//            "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
//            'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
//            'CURRENCY_ID' => $arParams['CURRENCY_ID'],
        "SEF_MODE" => $arParams["SEF_MODE"],
        "SEF_RULE" => $arParams["SEF_RULE_SMART_FILTER"],
      //            "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
        "SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
        "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
        "INSTANT_RELOAD" => 'N',
    ),
    false,
    array('HIDE_ICONS' => 'Y')
);

$arParams["FOLDER_URL_TEMPLATES_news"] = $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"];
$arParams["FOLDER_URL_TEMPLATES_section"] = $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"];
$arParams["FOLDER_URL_TEMPLATES_element"] = $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"];

// for current url
$arParams["REQUEST_URI"] = $_SERVER["REQUEST_URI"];
$arParams["SCRIPT_NAME"] = $_SERVER["SCRIPT_NAME"];

?>
<script data-skip-moving="true">
    // передаем параметры в core
    var component_arParams = <?echo CUtil::PhpToJSObject($arParams)?>;
</script>


<?include($_SERVER["DOCUMENT_ROOT"]."/local/tools/ajax/solutions_list.php"); ?>

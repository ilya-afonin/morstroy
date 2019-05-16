<?
$arParams["TEMPLATE"] = 'services_list';
// addResultData
$arParams["VARIABLES_SECTION_ID"] = $arResult["URL_TEMPLATES"]["news"];
$arParams["VARIABLES_SECTION_CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
$arParams["FOLDER_URL_TEMPLATES_section"] = $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"];
$arParams["FOLDER_URL_TEMPLATES_element"] = $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"];
$arParams["IBLOCK_URL"] = $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"];

// for current url
$arParams["REQUEST_URI"] = $_SERVER["REQUEST_URI"];
$arParams["SCRIPT_NAME"] = $_SERVER["SCRIPT_NAME"];

?>
<script>
    // передаем параметры в core
    var component_arParams = <?echo CUtil::PhpToJSObject($arParams)?>;
</script>

<section class="page__top-video">

  <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include/video_bg.php", Array(), Array("MODE" => "html")) ?>

  <div class="container">
    <h1 class="title">
      <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/services_title.php", Array(), Array("MODE" => "text")) ?>
    </h1>
  </div>
</section>

<section>

  <div class="container" id="objects_list">

    <? require_once($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/objects_list.php"); ?>

  </div>

</section>

<div class="equipments-slider">

  <h2 class="equipments-slider__title title title_section">
    <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/equipment_head.php", Array(), Array("MODE" => "text")) ?>
  </h2>

  <? $APPLICATION->IncludeComponent(
      "bitrix:news.list",
      "equipment_slider",
      array(
          "IBLOCK_TYPE" => "content",
          "IBLOCK_ID" => "5",
          "NEWS_COUNT" => "20",
          "SORT_BY1" => "SORT",
          "SORT_ORDER1" => "ASC",
          "SORT_BY2" => "ACTIVE_FROM",
          "SORT_ORDER2" => "DESC",
          "FILTER_NAME" => "",
          "FIELD_CODE" => array(
              0 => "NAME",
          ),
          "PROPERTY_CODE" => array(
              0 => "FON",
              1 => "",
          ),
          "CHECK_DATES" => "Y",
          "DETAIL_URL" => "",
          "AJAX_MODE" => "N",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "AJAX_OPTION_HISTORY" => "N",
          "CACHE_TYPE" => "A",
          "CACHE_TIME" => "36000006",
          "CACHE_FILTER" => "N",
          "CACHE_GROUPS" => "N",
          "PREVIEW_TRUNCATE_LEN" => "",
          "ACTIVE_DATE_FORMAT" => "F Y",
          "SET_TITLE" => "N",
          "SET_STATUS_404" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "ADD_SECTIONS_CHAIN" => "N",
          "HIDE_LINK_WHEN_NO_DETAIL" => "N",
          "PARENT_SECTION" => "",
          "PARENT_SECTION_CODE" => "",
          "INCLUDE_SUBSECTIONS" => "Y",
          "PAGER_TEMPLATE" => ".default",
          "DISPLAY_TOP_PAGER" => "N",
          "DISPLAY_BOTTOM_PAGER" => "N",
          "PAGER_TITLE" => "Новости",
          "PAGER_SHOW_ALWAYS" => "N",
          "PAGER_DESC_NUMBERING" => "N",
          "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
          "PAGER_SHOW_ALL" => "N",
          "DISPLAY_DATE" => "Y",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "AJAX_OPTION_ADDITIONAL" => "",
          "COMPONENT_TEMPLATE" => "equipment_slider",
          "SET_BROWSER_TITLE" => "Y",
          "SET_META_KEYWORDS" => "Y",
          "SET_META_DESCRIPTION" => "Y",
          "SET_LAST_MODIFIED" => "N",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "SHOW_404" => "N",
          "MESSAGE_404" => "",
          "STRICT_SECTION_CHECK" => "N"
      ),
      false
  ); ?>

  <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include/equipment_bg.php", Array(), Array("MODE" => "html")) ?>

</div>

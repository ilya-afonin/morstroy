<?
define('PAGE', 'certificates');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сертификаты");?>


  <section class="certificates__section">
    <div class="container">
      <h1 class="certificates__title title_section">
        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/certifications_title.php", Array(), Array("MODE" => "text")) ?>
      </h1>
      <p class="certificates__subtitle title">
        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/certifications_subtitle.php", Array(), Array("MODE" => "text")) ?>
      </p>
    </div>
  </section>

  <? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "certifications",
    array(
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "9",
        "NEWS_COUNT" => "50",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "ACTIVE_FROM",
        "SORT_ORDER2" => "DESC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            0 => "NAME",
            1 => "PREVIEW_PICTURE",
            2 => "PREVIEW_TEXT",
            3 => "",
        ),
        "PROPERTY_CODE" => array(
            0 => "PDF",
            1 => "",
        ),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000007",
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
        "PAGER_TEMPLATE" => "ajax_more",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
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
        "COMPONENT_TEMPLATE" => "certifications",
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
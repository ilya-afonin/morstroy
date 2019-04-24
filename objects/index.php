<?
define('PAGE', 'objects');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Объекты");
$APPLICATION->SetPageProperty('class_header', 'header_white');

?>

  <section class="page__top-video pageTop">

      <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include/video_bg.php", Array(), Array("MODE" => "html"))?>

    <div class="container">
      <h1 class="title">
        <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/objects_title.php", Array(), Array("MODE" => "text"))?>
      </h1>
    </div>
  </section>


<? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"objects_list", 
	array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "3",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "DETAIL_TEXT",
			3 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
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
		"ACTIVE_DATE_FORMAT" => "f Y",
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
		"COMPONENT_TEMPLATE" => "objects_list",
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

  <div class="equipments-slider">

    <h2 class="equipments-slider__title title title_section">
      <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/equipment_head.php", Array(), Array("MODE" => "text"))?>
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

    <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include/equipment_bg.php", Array(), Array("MODE" => "html"))?>

  </div>

  <section class="timeline">
    <div class="container">

      <h2 class="timeline__title title_section">
        <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/timeline_title.php", Array(), Array("MODE" => "text"))?>
      </h2>


      <? $APPLICATION->IncludeComponent(
          "bitrix:news.list",
          "timeline_slider",
          array(
              "IBLOCK_TYPE" => "content",
              "IBLOCK_ID" => "6",
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
                  0 => "WORKS",
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
              "COMPONENT_TEMPLATE" => "timeline_slider",
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

    </div>
  </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
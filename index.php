<?
define('PAGE_CLASS', 'home');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Морстрой");
$APPLICATION->SetPageProperty('description', '');
?>

    <section class="home__inner">

      <div class="home__links">
        <a class="button" href="/about/" alt="О компании">О компании</a>
        <a class="home__link" href="/objects/" alt="Объекты">Объекты</a>
      </div>

      <? $APPLICATION->IncludeComponent(
          "bitrix:news.list",
          "main_slider",
          array(
              "IBLOCK_TYPE" => "content",
              "IBLOCK_ID" => "1",
              "NEWS_COUNT" => "20",
              "SORT_BY2" => "ACTIVE_FROM",
              "SORT_ORDER2" => "DESC",
              "SORT_BY1" => "SORT",
              "SORT_ORDER1" => "ASC",
              "FILTER_NAME" => "",
              "FIELD_CODE" => array(
                  0 => "NAME",
                  1 => "PREVIEW_TEXT",
                  2 => "DETAIL_TEXT",
                  3 => "",
              ),
              "PROPERTY_CODE" => array(
                  0 => "",
                  1 => "CSS_CLASS_TEXT",
                  2 => "CSS_CLASS",
                  3 => "",
              ),
              "CHECK_DATES" => "Y",
              "DETAIL_URL" => "",
              "AJAX_MODE" => "N",
              "AJAX_OPTION_JUMP" => "N",
              "AJAX_OPTION_STYLE" => "Y",
              "AJAX_OPTION_HISTORY" => "N",
              "CACHE_TYPE" => "N",
              "CACHE_TIME" => "36000006",
              "CACHE_FILTER" => "N",
              "CACHE_GROUPS" => "N",
              "PREVIEW_TRUNCATE_LEN" => "",
              "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
              "COMPONENT_TEMPLATE" => "main_slider",
              "SET_BROWSER_TITLE" => "N",
              "SET_META_KEYWORDS" => "N",
              "SET_META_DESCRIPTION" => "N",
              "SET_LAST_MODIFIED" => "N",
              "PAGER_BASE_LINK_ENABLE" => "N",
              "SHOW_404" => "N",
              "MESSAGE_404" => "",
              "STRICT_SECTION_CHECK" => "N"
          ),
          false
      ); ?>

      <? $APPLICATION->IncludeComponent(
          "bitrix:news.list",
          "main_clients",
          array(
              "IBLOCK_TYPE" => "content",
              "IBLOCK_ID" => "2",
              "NEWS_COUNT" => "20",
              "SORT_BY2" => "ACTIVE_FROM",
              "SORT_ORDER2" => "DESC",
              "SORT_BY1" => "SORT",
              "SORT_ORDER1" => "ASC",
              "FILTER_NAME" => "",
              "FIELD_CODE" => array(
                  0 => "NAME",
                  1 => "PREVIEW_TEXT",
                  2 => "DETAIL_TEXT",
                  3 => "",
              ),
              "PROPERTY_CODE" => array(
                  0 => "LOGO",
                  1 => "",
                  2 => "",
                  3 => "",
                  4 => "",
                  5 => "",
              ),
              "CHECK_DATES" => "Y",
              "DETAIL_URL" => "",
              "AJAX_MODE" => "N",
              "AJAX_OPTION_JUMP" => "N",
              "AJAX_OPTION_STYLE" => "Y",
              "AJAX_OPTION_HISTORY" => "N",
              "CACHE_TYPE" => "N",
              "CACHE_TIME" => "36000006",
              "CACHE_FILTER" => "N",
              "CACHE_GROUPS" => "N",
              "PREVIEW_TRUNCATE_LEN" => "",
              "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
              "COMPONENT_TEMPLATE" => "slider",
              "SET_BROWSER_TITLE" => "Y",
              "SET_META_KEYWORDS" => "Y",
              "SET_META_DESCRIPTION" => "Y",
              "SET_LAST_MODIFIED" => "N",
              "PAGER_BASE_LINK_ENABLE" => "N",
              "SHOW_404" => "N",
              "MESSAGE_404" => ""
          ),
          false
      ); ?>

    </section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
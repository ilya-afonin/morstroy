<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
$arResult = $arResult['ITEMS'][0];

$this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

?>
<div class="img-bg" style="background-image: url(<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>)"
     id="<?= $this->GetEditAreaId($arResult['ID']); ?>"></div>
<section class="about__first-screen">
  <div class="about__container container">
    <h1 class="title title_section"><?= $APPLICATION->ShowTitle() ?></h1>
    <?
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        "about",
        Array(
            "ELEMENT_ID" => $arResult["ID"],
            "IBLOCK_ID" => $arResult["IBLOCK_ID"],
            "PROPERTY_CODE" => "CONTENT_HEADER",
            "USE_JQUERY" => "N",
            "USE_FANCYBOX" => "N",
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    );
    ?>

  </div>
</section>
<section class="advantages">
  <div class="advantages__container container">
    <h2 class="advantages__title title title_section">
      <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/about_advantages.php", Array(), Array("NAME" => "преимущества", "MODE" => "html")) ?>
    </h2>
    <? $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "about_advantages",
        array(
            "IBLOCK_TYPE" => "content",
            "IBLOCK_ID" => "13",
            "NEWS_COUNT" => "50",
            "SORT_BY1" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER2" => "DESC",
            "FILTER_NAME" => "",
            "FIELD_CODE" => array(
                0 => "",
            ),
            "PROPERTY_CODE" => array(
                0 => "ICON",
                1 => "",
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
            "COMPONENT_TEMPLATE" => "about_advantages",
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
<section class="about__third-screen">
  <?
  $APPLICATION->IncludeComponent(
      "sprint.editor:blocks",
      "about",
      Array(
          "ELEMENT_ID" => $arResult["ID"],
          "IBLOCK_ID" => $arResult["IBLOCK_ID"],
          "PROPERTY_CODE" => "CONTENT_MAIN",
          "USE_JQUERY" => "N",
          "USE_FANCYBOX" => "N",
      ),
      $component,
      Array(
          "HIDE_ICONS" => "Y"
      )
  );
  ?>
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
            0 => "",
            1 => "",
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
        "ACTIVE_DATE_FORMAT" => "F Y",
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "N",
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

<section class="reviews">
  <div class="container reviews__container">
    <h2 class="title title_section reviews__title">
      <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/about_reviews.php", Array(), Array("NAME" => "отзывы", "MODE" => "text")) ?>
    </h2>
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
  </div>
  <div class="container reviews__container">

  <? $APPLICATION->IncludeComponent(
      "bitrix:news.list",
      "feeds",
      array(
          "IBLOCK_TYPE" => "content",
          "IBLOCK_ID" => "8",
          "NEWS_COUNT" => "1",
          "SORT_BY1" => "SORT",
          "SORT_ORDER1" => "ASC",
          "SORT_BY2" => "ACTIVE_FROM",
          "SORT_ORDER2" => "DESC",
          "FILTER_NAME" => "",
          "FIELD_CODE" => array(
              0 => "NAME",
              1 => "PREVIEW_PICTURE",
              2 => "DETAIL_TEXT",
              3 => "DETAIL_PICTURE",
              4 => "",
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
          "CACHE_TYPE" => "N",
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
          "PAGER_TEMPLATE" => "ajax_more",
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
          "COMPONENT_TEMPLATE" => "feeds",
          "SET_BROWSER_TITLE" => "N",
          "SET_META_KEYWORDS" => "N",
          "SET_META_DESCRIPTION" => "N",
          "SET_LAST_MODIFIED" => "N",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "SHOW_404" => "N",
          "MESSAGE_404" => "",
          "STRICT_SECTION_CHECK" => "N",
          "TEMPLATE" => 'feeds'
      ),
      false
  ); ?>
  </div>
</section>



<section class="objects-list about__sixth-screen">
  <div class="container">
    <h2 class="objects-list__title title title_section">
      <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/about_objects.php", Array(), Array("NAME" => "объекты", "MODE" => "text")) ?>
    </h2>

    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "objects_list",
        Array(
            "ACTIVE_DATE_FORMAT" => "F Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "36000006",
            "CACHE_TYPE" => "N",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array("NAME", ""),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "3",
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "3",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array("", "", ""),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N"
        )
    );?>

    <a class="button objects-list__btn" href="/objects/" title="Все объекты">Все объекты →</a>
  </div>
</section>
<section class="about__seventh-screen">
  <?
  $APPLICATION->IncludeComponent(
      "sprint.editor:blocks",
      "about",
      Array(
          "ELEMENT_ID" => $arResult["ID"],
          "IBLOCK_ID" => $arResult["IBLOCK_ID"],
          "PROPERTY_CODE" => "CONTENT_RUSSIA",
          "USE_JQUERY" => "N",
          "USE_FANCYBOX" => "N",
      ),
      $component,
      Array(
          "HIDE_ICONS" => "Y"
      )
  );
  ?>
</section>
<section class="about__eighth-screen">
  <div class="container">
    <h2 class="about__eighth-screen-title title title_section">
      <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/about_services.php", Array(), Array("NAME" => "виды деятельности", "MODE" => "text")) ?></h2>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "services_list",
        Array(
            "ACTIVE_DATE_FORMAT" => "F Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "36000006",
            "CACHE_TYPE" => "N",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array("NAME", ""),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "10",
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "3",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array("", "", ""),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N"
        )
    );?>
    <a class="button about__eighth-screen-btn" href="/services/" title="Все услуги">Все услуги →</a>
  </div>
</section>
<section class="about__ninth-screen">
  <?
  $APPLICATION->IncludeComponent(
      "sprint.editor:blocks",
      "about",
      Array(
          "ELEMENT_ID" => $arResult["ID"],
          "IBLOCK_ID" => $arResult["IBLOCK_ID"],
          "PROPERTY_CODE" => "CONTENT_FINISH",
          "USE_JQUERY" => "N",
          "USE_FANCYBOX" => "N",
      ),
      $component,
      Array(
          "HIDE_ICONS" => "Y"
      )
  );
  ?>
</section>
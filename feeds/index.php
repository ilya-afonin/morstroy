<?
define('PAGE', 'feeds');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>


  <section class="feeds__section">
    <div class="container" id="feeds_list">
      <h1 class="feeds__title title_section">
        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/feeds_title.php", Array(), Array("MODE" => "text")) ?>
      </h1>
      <p class="feeds__subtitle title">
        <? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/feeds_subtitle.php", Array(), Array("MODE" => "text")) ?>
      </p>

      <? include($_SERVER['DOCUMENT_ROOT'].'/local/tools/ajax/feeds_list.php'); ?>

    </div>
  </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
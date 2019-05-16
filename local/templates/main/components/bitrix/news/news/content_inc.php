<?define('PAGE', 'news');
$arParams["TEMPLATE"] = 'news_list';
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

<section class="page__top">

  <div class="container">
    <h1>
      <? $APPLICATION->ShowTitle(false); ?>
    </h1>
  </div>
</section>

<section class="page__section">

  <div class="container" id="objects_list">

    <? require_once($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/objects_list.php"); ?>

  </div>

</section>


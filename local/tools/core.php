<?
// Check ajax...
/*if (!$_SERVER['HTTP_X_REQUESTED_WITH']) {
  $APPLICATION->RestartBuffer();
  echo(json_encode(array("status" => false, 'answer' => "Неверный запрос")));
  die();
}*/
// Check user agent...
//if (!$_SERVER['HTTP_USER_AGENT']) {
//  $APPLICATION->RestartBuffer();
//  echo(json_encode(array("status" => false, 'answer' => "Неверный запрос")));
//  die();
//}


include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$request_body = file_get_contents('php://input');

$data = json_decode($request_body, true);

$case_param = $data['case_param'];

define("NO_KEEP_STATISTIC", true);
// for authorize and registration show errors
$non_check_permissions_req = array('auth', 'auth_popup', 'reg', 'forgotpasswd', 'changepasswd');
if (!in_array($case_param, $non_check_permissions_req)) {
  define("NOT_CHECK_PERMISSIONS", true);
}

// get arParams
$arParams = $data['component_arParams'];



// указываем для кого обязательны параметры
if (empty($arParams)) {
  $arNeedParams = array('solutions_list', 'search_result', 'catalog_list');
  if (in_array($case_param, $arNeedParams)) {
    $case_param = 'empty_params';
  }
}

global $APPLICATION;

switch ($case_param):

  case "equipmentDetail":

    ob_start();

    $ElementID = $data['requestParams']['id'];

    include($_SERVER["DOCUMENT_ROOT"]."/local/tools/ajax/equipment_detail.php");

    $content = ob_get_contents();
    ob_end_clean();

    echo json_encode(
        array(
            'DETAIL_EQUIPMENT' => trim($content)
        )
    );

    die();
    break;

  case "timelineDetail":

    ob_start();

    $ElementID = $data['requestParams']['id'];

    include($_SERVER["DOCUMENT_ROOT"]."/local/tools/ajax/equipment_detail.php");

    $content = ob_get_contents();
    ob_end_clean();

    echo json_encode(
        array(
            'DETAIL_TIMELINE' => trim($content)
        )
    );

    die();
    break;


  case "objects_list" :

    ob_start();

    $sectionCode = htmlentities($data['requestParams']['section_code']);

    // for current url
    //$_SERVER["REQUEST_URI"] = $sectionCode!==false?'/objects/'.$sectionCode.'/':$arParams["REQUEST_URI"];
    $_SERVER["REQUEST_URI"] = $arParams["REQUEST_URI"];
    $_SERVER["SCRIPT_NAME"] = $arParams["SCRIPT_NAME"];

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/objects_list.php");

    $content = ob_get_contents();
    ob_end_clean();

    echo json_encode(
        array(
            'OBJECTS_LIST' => trim($content)
        )
    );

    die();
    break;

  case "feeds_list" :

    ob_start();

    // for current url
    $_SERVER["REQUEST_URI"] = $arParams["REQUEST_URI"];
    $_SERVER["SCRIPT_NAME"] = $arParams["SCRIPT_NAME"];

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/feeds_list.php");

    $content = ob_get_contents();
    ob_end_clean();

    echo json_encode(
        array(
            'OBJECTS_LIST' => trim($content)
        )
    );

    die();
    break;

  case 'solutions_list':

    $APPLICATION->IncludeComponent(
        "bitrix:catalog.smart.filter",
        "ajax",
        array(
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "SECTION_ID" => '',
            "FILTER_NAME" => $arParams["FILTER_NAME"],
            "PRICE_CODE" => $arParams["PRICE_CODE"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "SAVE_IN_SESSION" => "N",    // Сохранять установки фильтра в сессии пользователя
            "INSTANT_RELOAD" => "N",
            "XML_EXPORT" => "N",    // Включить поддержку Яндекс Островов
            "SECTION_TITLE" => "NAME",    // Заголовок
            "SECTION_DESCRIPTION" => "DESCRIPTION",    // Описание
            "COMPONENT_TEMPLATE" => "visual_horizontal",
            "SECTION_CODE" => "",    // Код раздела
            "TEMPLATE_THEME" => "blue",    // Цветовая тема
            "DISPLAY_ELEMENT_COUNT" => "Y",    // Показывать количество
            "SEF_MODE" => "N",    // Включить поддержку ЧПУ
            "PAGER_PARAMS_NAME" => "arrPager",    // Имя массива с переменными для построения ссылок в постраничной навигации
            "SORT_BY1" => $arParams['SORT_BY1'],
            "SORT_ORDER1" => $arParams['SORT_ORDER1'],
            "SORT_BY2" => $arParams['SORT_BY2'],
            "SORT_ORDER2" => $arParams['SORT_ORDER2'],
        ),
        false,
        array('HIDE_ICONS' => 'Y')
    );

    ob_start();

    $intSectionID = 0;

    // for current url
    $_SERVER["REQUEST_URI"] = $arParams["REQUEST_URI"];
    $_SERVER["SCRIPT_NAME"] = $arParams["SCRIPT_NAME"];

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/solutions_list.php");

    $content = ob_get_contents();
    ob_end_clean();

    echo $content;

    die();
    break;
  case 'catalog_list':
    $APPLICATION->IncludeComponent(
        "bitrix:catalog.smart.filter",
        "ajax",
        array(
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "SECTION_ID" => '',
            "FILTER_NAME" => $arParams["FILTER_NAME"],
            "PRICE_CODE" => $arParams["PRICE_CODE"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "SAVE_IN_SESSION" => "N",    // Сохранять установки фильтра в сессии пользователя
            "INSTANT_RELOAD" => "N",
            "XML_EXPORT" => "N",    // Включить поддержку Яндекс Островов
            "SECTION_TITLE" => "NAME",    // Заголовок
            "SECTION_DESCRIPTION" => "DESCRIPTION",    // Описание
            "COMPONENT_TEMPLATE" => "visual_horizontal",
            "SECTION_CODE" => "",    // Код раздела
            "TEMPLATE_THEME" => "blue",    // Цветовая тема
            "DISPLAY_ELEMENT_COUNT" => "Y",    // Показывать количество
            "SEF_MODE" => "N",    // Включить поддержку ЧПУ
            "PAGER_PARAMS_NAME" => "arrPager",    // Имя массива с переменными для построения ссылок в постраничной навигации
            "SORT_BY1" => $arParams['SORT_BY1'],
            "SORT_ORDER1" => $arParams['SORT_ORDER1'],
            "SORT_BY2" => $arParams['SORT_BY2'],
            "SORT_ORDER2" => $arParams['SORT_ORDER2'],
        ),
        false,
        array('HIDE_ICONS' => 'Y')
    );

    $APPLICATION->RestartBuffer();
    ob_start();

    $intSectionID = 0;

    // for current url
    $_SERVER["REQUEST_URI"] = $arParams["REQUEST_URI"];
    $_SERVER["SCRIPT_NAME"] = $arParams["SCRIPT_NAME"];

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/catalog_list.php");

    $content = ob_get_contents();
    ob_end_clean();
    echo json_encode(
        array(
            'CATALOG' => $content
        )
    );

    die();
    break;
  case 'search_page':

    $APPLICATION->RestartBuffer();
    ob_start();

    $intSectionID = 0;

    // for current url
    $_SERVER["REQUEST_URI"] = $arParams["REQUEST_URI"];
    $_SERVER["SCRIPT_NAME"] = $arParams["SCRIPT_NAME"];

    $context = Bitrix\Main\Context::getCurrent();
    $request = $context->getRequest();
    $filter_search1 = $request->get("filter_search1");
    $filter_search2 = $request->get("filter_search2");
    $filter_search3 = $request->get("filter_search3");
    $filter_search4 = $request->get("filter_search4");


    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/search_page.php");

    $content = ob_get_contents();
    ob_end_clean();
    echo json_encode(
        array(
            'SEARCH_PAGE' => $content
        )
    );

    die();
    break;

  case 'search_result':
    $APPLICATION->RestartBuffer();
    ob_start();

    $requestParams = htmlentities($_SERVER["REQUEST_URI"]);
    $context = Bitrix\Main\Context::getCurrent();
    $request = $context->getRequest();
    $q = $request->get("q");

    $data['q'] = $q;
    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/search_title.php");

    $content = ob_get_contents();
    ob_end_clean();
    echo json_encode(
        array(
            'SEARCH_RESULT' => $content,
        )
    );

    die();
    break;
  case 'feedback':
    $APPLICATION->RestartBuffer();
    ob_start();

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/feedback.php");

    $content = ob_get_contents();
    ob_end_clean();
    echo json_encode(
        array(
            'FEEDBACK' => $content,
        )
    );

    die();
    break;
  case 'callback':
    $APPLICATION->RestartBuffer();
    ob_start();

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/callbackForm.php");

    $content = ob_get_contents();
    ob_end_clean();
    echo json_encode(
        array(
            'CALLBACK' => $content,
        )
    );

    die();
    break;

  case 'callback_project':
    $APPLICATION->RestartBuffer();
    ob_start();

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/callbackProject.php");

    $content = ob_get_contents();
    ob_end_clean();
    echo json_encode(
        array(
            'CALLBACK' => $content,
        )
    );

    die();
    break;
  case 'callback_about':
    $APPLICATION->RestartBuffer();
    ob_start();

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/callbackFormAbout.php");

    $content = ob_get_contents();
    ob_end_clean();
    echo json_encode(
        array(
            'CALLBACK' => $content,
        )
    );

    die();
    break;
  case 'callback_contacts':
    $APPLICATION->RestartBuffer();
    ob_start();

    include($_SERVER["DOCUMENT_ROOT"] . "/local/tools/ajax/callbackFormContacts.php");

    $content = ob_get_contents();
    ob_end_clean();
    echo json_encode(
        array(
            'CALLBACK' => $content,
        )
    );

    die();
    break;
  default:
    echo json_encode(array("status" => false, 'answer' => "Неверный запрос"));
    die();
    break;
endswitch;
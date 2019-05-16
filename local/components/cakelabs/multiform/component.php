<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
// version 1.2 beta
CModule::IncludeModule("iblock");
$arResult["PARAMS_HASH"] = md5(serialize($arParams) . $this->GetTemplateName());
$arParams["IBLOCK_TYPE"] = trim(htmlspecialcharsEx($arParams["IBLOCK_TYPE"]));
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);

$arParams["EVENT_TYPE"] = trim(htmlspecialcharsEx($arParams["EVENT_TYPE"]));
$arParams["SECTION_ID"] = intval($arParams["SECTION_ID"]);
$arParams["MAIL_TO"] = trim(htmlspecialcharsEx($arParams["MAIL_TO"]));
$ip = trim(htmlspecialcharsEx($_SERVER["REMOTE_ADDR"]));
if (empty($arParams["SECTION_ID"])){
    $arParams["SECTION_ID"] = "false";
}
$arParams["MESS_OK"] = trim(htmlspecialcharsEx($arParams["MESS_OK"]));
// префикс полей
$np = 'np_name_';
$arResult["PREFIX"] = $np;

$arParams["USE_CAPTCHA"] = ($arParams["USE_CAPTCHA"] == "Y" ? "Y" : "N");
$arParams["USE_PREMODERATION"] = ($arParams["USE_PREMODERATION"] == "Y" ? "N" : "Y");

$rsProp = CIBlockProperty::GetList(
    Array("sort"=>"asc", "name"=>"asc"),
    Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arParams["IBLOCK_ID"])
);
while ($arr=$rsProp->Fetch()){
    $arResult["PROPERTIES"][$arr["CODE"]] = $arr;

    if($arr["PROPERTY_TYPE"] == "L"){
        $db_enum_list = CIBlockProperty::GetPropertyEnum($arr["CODE"]);
        while($ar_enum_list = $db_enum_list->GetNext())
        {
            $arResult["PROPERTIES"][$arr["CODE"]]["VALUE"][] = $ar_enum_list;
        }
    }
}
// только те свойства которые отметили для вывода
if(sizeof($arParams["PROPERTY_FIELDS"])>0){
    foreach($arResult["PROPERTIES"] as $key=>$arDisplayProp){
        if(in_array($key, $arParams["PROPERTY_FIELDS"]) && sizeof($arParams["PROPERTY_FIELDS"])>0){
            $arResult["DISPLAY_PROPERTIES"][$key] = $arDisplayProp;
        }
    }
}else{
    $arResult["DISPLAY_PROPERTIES"] = $arResult["PROPERTIES"];
}

// текущий url echo 'http://' . $_SERVER["HTTP_HOST"] . $APPLICATION->GetCurPage()
//$url_array = GetCurPage();
//$url_array = $arParams["URL"];

if ($arParams['NAME_ELEMENT'] == "NETPRIME_DATE")
{
    $arElement["NAME"] = ConvertTimeStamp();
}
if ($arParams["AJAX_ID"] == $_POST['bxajaxid'] && $_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"]) {
    if (check_bitrix_sessid()) {
        // проверяем незаполненные обязательные поля
        $error = 0;
        foreach($arResult["DISPLAY_PROPERTIES"] as $key=>$arProp){
            if(!$_POST["FIELDS"][$np.$arProp["ID"].$arResult["PARAMS_HASH"]][$arProp["CODE"]] && in_array($arProp["CODE"],$arParams["PROPERTY_FIELDS_REQUIRED"])){
                $error++;
            }
            if($error == 0 && $_POST["FIELDS"][$np.$arProp["ID"].$arResult["PARAMS_HASH"]][$arProp["CODE"]] && in_array($arProp["CODE"],$arParams["PROPERTY_FIELD_EMAIL"]) && !check_email($_POST["FIELDS"][$np.$arProp["ID"].$arResult["PARAMS_HASH"]][$arProp["CODE"]])){
                // если поле используемое в качестве email некорректно
                $arResult["ERROR_MESSAGE"][] = GetMessage("NP_EMAIL_NOT_VALID");
            }

        }
         // если стоит галка 'Выводить поле для сообщения'
        if($arParams["USE_MESSAGE_FIELD"]){
            if(!$_POST["FIELDS"][$np."MESSAGE_FIELD_".$arResult["PARAMS_HASH"]] && in_array("MESSAGE_FIELD",$arParams["PROPERTY_FIELDS_REQUIRED"])){
                $error++;
            }
        }

        if($error > 0){
            $arResult["ERROR_MESSAGE"][] = GetMessage("NP_REQ_FIELD");
        }

        // Проверяем CAPTCHA
        if ($arParams["USE_CAPTCHA"] == "Y") {
            include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/classes/general/captcha.php");

            $cpt = new CCaptcha();
            if (strlen($_POST["captcha_code"]) > 0) {
                $captchaPass = COption::GetOptionString("main", "captcha_password", "");
                if (!$cpt->CheckCodeCrypt($_POST["captcha_word"], $_POST["captcha_code"], $captchaPass))
                    $arResult["ERROR_MESSAGE"][] = GetMessage("POSTM_CAPTCHA_IS_BAD");
            }
        }

        // begin сохраняем заполненные значения
        foreach($_POST["FIELDS"] as $key=>$arPostCode){ // key тут это [$np.$arProp["ID"].$arResult["PARAMS_HASH"]][$arProp["CODE"]]
            foreach($arPostCode as $code=>$arPostVal){ // $code это код свойства
                $arResult["FIELD"][$key][$code] = trim(htmlspecialcharsEx($arPostVal));
            }
        }
        $arResult["FIELDS"]["MESSAGE_FIELD"] = trim(htmlspecialcharsEx($_POST["FIELDS"][$np."MESSAGE_FIELD_".$arResult["PARAMS_HASH"]]));
        // end
        if (empty($arResult["ERROR_MESSAGE"])) {
            if(!$_FILES['myFile'][0]){
                $path_ff = '';
                $file_array = array();
                if (strpos($_FILES['myFile']['name']['FILE'], '.php') == false) {
                    $file_array = CFile::MakeFileArray($_FILES['myFile']['tmp_name']['FILE']);
//                    file_put_contents($_SERVER['DOCUMENT_ROOT']."/empty_log.txt", var_export($_SERVER["DOCUMENT_ROOT"].$_FILES['myFile']['tmp_name']['FILE'], true),FILE_APPEND);
//                $fid = CFile::SaveFile($_FILES['file']);//получаем id файла!!
//                    $fid = CFile::SaveFile($_FILES['myFile']);//получаем id файла!!
//                    $path_f = CFile::GetPath($fid);//по id получаем путь к файлу
//                    $path_ff = 'http://' . $_SERVER["HTTP_HOST"] . $path_f;
//                    $file_array = CFile::MakeFileArray($fid);
                    $file_array['tmp_name'] = $_SERVER['DOCUMENT_ROOT'].$file_array['tmp_name'];
                }
            }elseif($_FILES['myFile'][0]['name']){
                // потом дописать логику
            }

            // Отправляем сообщение
            foreach($_POST["FIELDS"] as $key=>$arPostCode){
                foreach($arPostCode as $code=>$arPostVal){
                    if(is_array($arPostVal)){
                        foreach($arPostVal as $key2=>$arMultPost){
                            if($arMultPost[$key2+1]){
                                $z = ', ';
                            }else{
                                $z = '';
                            }
                            $arElementProps[$code][] = trim(htmlspecialcharsEx($arPostVal)); // сразу создаем массив свойств для записи в элемент
                            $arEventFields[$code] .= trim(htmlspecialcharsEx($arPostVal)).$z;
                        }
                        if($arParams["NAME_ELEMENT"] == $code){
                            $arElement["NAME"] = trim(htmlspecialcharsEx($arEventFields[$code])); // задаем имя элемента если совпал код
                        }
                    }
                    if($arParams["NAME_ELEMENT"] == $code){
                        $arElement["NAME"] = trim(htmlspecialcharsEx($arPostVal)); // задаем имя элемента если совпал код
                    }
                    $arElementProps[$code] = trim(htmlspecialcharsEx($arPostVal)); // сразу создаем массив свойств для записи в элемент
                    $arEventFields[$code] = trim(htmlspecialcharsEx($arPostVal));
                }
            }
            if($arParams["USE_MESSAGE_FIELD"] && $_POST["FIELDS"][$np."MESSAGE_FIELD_".$arResult["PARAMS_HASH"]]){
                if($arParams["NAME_ELEMENT"] == "MESSAGE_FIELD"){
                    $arElement["NAME"] = trim(htmlspecialcharsEx($_POST["FIELDS"][$np."MESSAGE_FIELD_".$arResult["PARAMS_HASH"]]));
                }
                $arEventFields["MESSAGE_FIELD"] = trim(htmlspecialcharsEx($_POST["FIELDS"][$np."MESSAGE_FIELD_".$arResult["PARAMS_HASH"]]));
            }
            $arEventFields["MAIL_TO"] = $arParams["MAIL_TO"];
            $arEventFields["IP"] = $ip;

            if (CEvent::Send($arParams["EVENT_TYPE"], SITE_ID, $arEventFields, "Y", $arParams["EVENT_ID"])){
                $arResult["MESS_OK"] = $arParams["MESS_OK"];
            }
            else{
                $arResult["ERROR_MESSAGE"][] = GetMessage("POSTM_ERROR");
            }

            if($arParams["NOT_WRITE"] == "N"){
                // Записываем элемент инфоблока
                $el = new CIBlockElement;
                if(sizeof($file_array)>0){
                    $arElementProps["FILE"] = $file_array;
                }
//                $PROP = array(
//                    "EMAIL_TO" => $arParams["EMAIL_TO"],
//    //                "FILE" => $file_array,
////                    "URL" => $url_array,
//                );
                if(!$arElementProps["IP"]){
                    $arElementProps["IP"] = $ip;
                }

                $arLoadProductArray = Array(
//                    "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
                    "IBLOCK_SECTION" => $arParams["SECTION_ID"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "PROPERTY_VALUES" => $arElementProps,
//                    "FILE" => $path_ff,
                    "NAME" => $arElement["NAME"],
                    "ACTIVE" => $arParams["USE_PREMODERATION"],
                    "PREVIEW_TEXT" => $arEventFields["MESSAGE_FIELD"],
                    "DATE_ACTIVE_FROM" => ConvertTimeStamp(time(), "SHORT")
                );
                if ($PRODUCT_ID = $el->Add($arLoadProductArray)){
                    $arResult["MESS_OK"] = $arParams["MESS_OK"];
                }else{
                    $arResult["ERROR_MESSAGE"][] = GetMessage("ADD_ELEMENT_ERROR");
                }
            }
        }
    }else{
        $arResult["ERROR_MESSAGE"][] = GetMessage("NP_SESS_EXP");
    }

}

// Генерируем CAPTCHA
$arResult["CAPTCHA_CODE"] = "";
if ($arParams["USE_CAPTCHA"] == "Y") {
    include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/classes/general/captcha.php");
    $cpt = new CCaptcha();
    $captchaPass = COption::GetOptionString("main", "captcha_password", "");
    if (strLen($captchaPass) <= 0) {
        $captchaPass = randString(10);
        COption::SetOptionString("main", "captcha_password", $captchaPass);
    }
    $cpt->SetCodeCrypt($captchaPass);
    $arResult["CAPTCHA_CODE"] = htmlspecialchars($cpt->GetCodeCrypt());
}

// *****************************************************************************************
$this->IncludeComponentTemplate();
// *****************************************************************************************
?>
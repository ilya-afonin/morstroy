<?
define("NO_KEEP_STATISTIC", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

 
if (check_bitrix_sessid() && $_REQUEST['privacy'] == 'on') {

$EXIT["error"] = false;
CModule::IncludeModule("iblock");

$name = "Заявка от - ".date('d.m.Y H:i');
$subject = "Новая заявка! ".date('d.m.Y H:i');

$prop = array();

$prop[34] = $_REQUEST["phone"];

$arStory = Array(
    "IBLOCK_ID" => 14,
    "PROPERTY_VALUES" => $prop,
    "NAME" => $name,
    "DATE_ACTIVE_FROM"=>ConvertTimeStamp(time(), "FULL"),
    "ACTIVE" => "Y",
);

$el = new CIBlockElement;

if ($elID = $el->Add($arStory)) {

  $arFields = Array(
      "PHONE" => $_REQUEST["phone"],
      "SUBJECT" => $subject
  );

  if (!CEvent::Send("FEEDBACK_FORM", SITE_ID, $arFields, "N", 7)){
    $EXIT['error'] = true;
  }
  else
    $EXIT["message"] = "Ваше сообщение успешно отправлено!";
} else {
  $EXIT['error'] = true;
}

}
echo json_encode($EXIT);

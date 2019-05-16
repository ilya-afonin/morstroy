<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;
// получаем типы инфоблоков
$rsIBlockType = CIBlockType::GetList(array("sort"=>"asc"), array("ACTIVE"=>"Y"));
while ($arr=$rsIBlockType->Fetch())
{
	if($ar=CIBlockType::GetByIDLang($arr["ID"], LANGUAGE_ID))
		$arIBlockType[$arr["ID"]] = "[".$arr["ID"]."] ".$ar["NAME"];
}
// получаем инфоблоки выбранного типа
$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch()){
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}
// получаем разделы выбранного инфоблока
$arSections[0] = "Верхний уровень";
$rsSections = CIBlockSection::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arCurrentValues["IBLOCK_ID"]));
while($arr=$rsSections->Fetch()){
	$arSections[$arr["ID"]] = $arr["NAME"];
}

$rsProp = CIBlockProperty::GetList(
	Array("sort"=>"asc", "name"=>"asc"),
	Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arCurrentValues["IBLOCK_ID"])
);
while ($arr=$rsProp->Fetch()){
	$arProp[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];

	//if(in_array($arr["PROPERTY_TYPE"], array("L", "N", "S","E"))){
		$arProp_LNS[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
	//}
}
// откуда берем название элемента
if(is_array($arProp_LNS)){
	$arProp_set_name = array_merge(Array("NETPRIME_DATE" => GetMessage("NETPRIME_DATE"),"MESSAGE_FIELD" => GetMessage("DEFAULT_MESSAGE_FIELD_NAME")),$arProp_LNS);
	//обязательные поля
	$arPropAndMessField = array_merge(Array("MESSAGE_FIELD" => GetMessage("DEFAULT_MESSAGE_FIELD_NAME")),$arProp_LNS);
}
else{
	$arProp_set_name =Array("NETPRIME_DATE" => GetMessage("NETPRIME_DATE"),"MESSAGE_FIELD" => GetMessage("DEFAULT_MESSAGE_FIELD_NAME"));
}




$arComponentParameters = array(
	"GROUPS" => array(
		"BASE" => array("NAME" => GetMessage("GROUP_BASE")),
		"NETPRIME_EVENT" => array("NAME" => GetMessage("GROUP_EVENT")),
		"NETPRIME_FORM" => array("NAME" => GetMessage("GROUP_FORM")),
		"NETPRIME_OPTIONS" => array("NAME" => GetMessage("GROUP_OPTIONS")),
		"LEAD" => array("NAME" => GetMessage("GROUP_LEAD")),
	),

	"PARAMETERS" => array(
		"AJAX_MODE" => array(),
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK"),
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
		),
		"SECTION_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("SECTION"),
			"TYPE" => "LIST",
			"VALUES" => $arSections,
			"DEFAULT" => 0,
			"REFRESH" => "Y",
		),
		"NOT_WRITE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("NOT_WRITE"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),
		"EVENT_TYPE" => array(
			"PARENT" => "NETPRIME_EVENT",
			"NAME" => GetMessage("EVENT_TYPE"),
			"TYPE" => "STRING",
			"DEFAULT" => "NETPRIME_FORM"
		),
        "EVENT_ID" => array(
            "PARENT" => "NETPRIME_EVENT",
            "NAME" => GetMessage("EVENT_ID"),
            "TYPE" => "STRING",
        ),
		"PROPERTY_FIELDS" => array(
			"PARENT" => "NETPRIME_FORM",
			"NAME" => GetMessage("PROPERTY_FIELDS"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arProp_LNS,
		),
		"PROPERTY_FIELDS_REQUIRED" => array(
			"PARENT" => "NETPRIME_FORM",
			"NAME" => GetMessage("PROPERTY_FIELDS_REQ"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arPropAndMessField,
		),
		"PROPERTY_FIELDS_HIDDEN" => array(
			"PARENT" => "NETPRIME_FORM",
			"NAME" => GetMessage("PROPERTY_FIELDS_HIDDEN"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arPropAndMessField,
		),
		"PROPERTY_FIELD_EMAIL" => array(
			"PARENT" => "NETPRIME_FORM",
			"NAME" => GetMessage("PROPERTY_FIELD_EMAIL"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arProp_LNS,
		),
		"PROPERTY_FIELD_PHONE" => array(
			"PARENT" => "NETPRIME_FORM",
			"NAME" => GetMessage("PROPERTY_FIELD_PHONE"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arProp_LNS,
		),
		"MESS_OK" => Array(
			"PARENT" => "NETPRIME_OPTIONS",
			"NAME" => GetMessage("MESS_OK"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("DEFAULT_MESSAGE_OK"),
			"COLS" => 100,
		),
		//		"ADD_LEAD" => Array(
//			"PARENT" => "LEAD",
//			"NAME" => GetMessage("ADD_LEAD"),
//			"TYPE" => "CHECKBOX",
//			"DEFAULT" => "",
//			"REFRESH" => "Y",
//		),
		"MAIL_TO" => Array(
			"PARENT" => "NETPRIME_OPTIONS",
			"NAME" => GetMessage("MAIL_TO"),
			"TYPE" => "STRING",
			"DEFAULT" => COption::GetOptionString("main", "email_from"),
		),
		"USE_PREMODERATION" => array(
			"PARENT" => "NETPRIME_OPTIONS",
			"NAME" => GetMessage("USE_PREMODERATION"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		),
		"USE_CAPTCHA" => array(
			"PARENT" => "NETPRIME_OPTIONS",
			"NAME" => GetMessage("USE_CAPTCHA"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		),
	)
);

$arComponentParameters["PARAMETERS"]["USE_MESSAGE_FIELD"] = array(
		"PARENT" => "NETPRIME_FORM",
		"NAME" => GetMessage("USE_MESSAGE_FIELD"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
		"REFRESH" =>"Y",
);

if($arCurrentValues["USE_MESSAGE_FIELD"]!="N")
{
	$arComponentParameters["PARAMETERS"]["MESSAGE_FIELD_NAME"] = array(
		"PARENT" => "NETPRIME_FORM",
		"NAME" => GetMessage("MESSAGE_FIELD_NAME"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("DEFAULT_MESSAGE_FIELD_NAME"),
		"COLS" => 100,
		"ADDITIONAL_VALUES" => "Y",
	);
}
$arComponentParameters["PARAMETERS"]["NAME_ELEMENT"] = array(
	"PARENT" => "NETPRIME_FORM",
	"NAME" => GetMessage("NAME_ELEMENT"),
	"TYPE" => "LIST",
	"MULTIPLE" => "N",
	"VALUES" => $arProp_set_name,
	"ADDITIONAL_VALUES" => "N",
	"DEFAULT" => "NETPRIME_DATE",
);

// параметры для лидов в crm (недоделан функционал)
if($arCurrentValues["ADD_LEAD"]=="Y")
{
	$arComponentParameters["PARAMETERS"]["LEAD_TITLE"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_TITLE"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_NAME"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_NAME"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_SECOND_NAME"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_SECOND_NAME"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_LAST_NAME"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_LAST_NAME"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_COMPANY_TITLE"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_COMPANY_TITLE"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_POST"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_POST"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_ADDRESS"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_ADDRESS"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_PHONE_WORK"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_PHONE_WORK"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_PHONE_MOBILE"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_PHONE_MOBILE"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_PHONE_FAX"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_PHONE_FAX"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_PHONE_HOME"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_PHONE_HOME"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_PHONE_PAGER"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_PHONE_PAGER"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_PHONE_OTHER"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_PHONE_OTHER"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_EMAIL_WORK"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_EMAIL_WORK"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_EMAIL_HOME"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_EMAIL_HOME"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_EMAIL_OTHER"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_EMAIL_OTHER"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_WEB_WORK"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_WEB_WORK"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_WEB_HOME"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_WEB_HOME"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_WEB_FACEBOOK"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_WEB_FACEBOOK"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_WEB_LIVEJOURNAL"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_WEB_LIVEJOURNAL"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_WEB_TWITTER"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_WEB_TWITTER"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_WEB_OTHER"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_WEB_OTHER"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_OPPORTUNITY"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_OPPORTUNITY"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
	$arComponentParameters["PARAMETERS"]["LEAD_DATE_CLOSED"] = array(
		"PARENT" => "LEAD",
		"NAME" => GetMessage("LEAD_DATE_CLOSED"),
		"TYPE" => "LIST",
		"MULTIPLE" => "N",
		"VALUES" => $arProp_LNS,
		"ADDITIONAL_VALUES" => "Y",
	);
}
?>
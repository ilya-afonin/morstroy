<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("NETPRIME_MULTIFORM_TEMPLATE_NAME"),
	"DESCRIPTION" => GetMessage("NETPRIME_MULTIFORM_TEMPLATE_DESCRIPTION"),
	"ICON" => "/images/icon-multiform.gif",
	"CACHE_PATH" => "Y",
	"SORT" => 10,
	"PATH" => array(
		"ID" => "netprime",
		"NAME" => GetMessage("NETPRIME_COMPONENTS"),
		"CHILD" => array(
			"ID" => "form",
			"NAME" => GetMessage("NETPRIME_DESC_MULTIFORM"),
			"SORT" => 10
		)
	)
);

?>
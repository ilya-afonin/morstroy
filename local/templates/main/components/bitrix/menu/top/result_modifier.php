<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$menu = [];
$parent = 0;


foreach ($arResult as $key => $arItem){
    $item = $arItem;
    if ($arItem["DEPTH_LEVEL"] == 1){
        $item["CHILD"] = [];
        $parent = $key;
        $menu[$key] = $item;
    } else {
        $menu[$parent]["CHILD"][] = $item;
    }
}

$arResult = $menu;
<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult)) return "";

$strReturn = '';

$breadClass = '';
if($APPLICATION->GetProperty("header_white") != 'Y'){
  $breadClass = ' breadcrumbs_color';
}

$strReturn .= '<div class="breadcrumbs'.$breadClass.'">';
$strReturn .= '<div class="container">';
$strReturn .= ' <ul class="breadcrumbs__list" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
    {
        $strReturn .= '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
        $strReturn .= ' <a itemprop="item" href="'.$arResult[$index]["LINK"].'"><span itemprop="name">'.$title.'</span></a>';
        $strReturn .= ' <meta itemprop="position" content="'.($index+1).'" />';
        $strReturn .= '</li>';
    }
    else
    {
        $strReturn .= '<li class="breadcrumbs__item breadcrumbs__item_active"><span>'.$title.'</span></li>';
    }
}
$strReturn .= ' </ul>';
$strReturn .= '</div>';
$strReturn .= '</div>';

return htmlspecialchars_decode($strReturn);
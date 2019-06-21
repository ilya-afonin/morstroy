<?php

$arSizes = array(
  'width' => 1260,
  'height' => 525
);

foreach ($arResult['ITEMS'] as $i => &$arItem) {
  $pic = $arItem['PREVIEW_PICTURE'];
  $file = CFile::ResizeImageGet($pic, $arSizes, BX_RESIZE_IMAGE_EXACT, true);

  $arItem['PREVIEW_PICTURE']['SRC'] = $file['src'];

  $arItem['ACTIVE_FROM'] = FormatDate(array(
      "tommorow" => "tommorow",      // выведет "завтра", если дата завтрашний день
      "today" => "today",              // выведет "сегодня", если дата текущий день
      "yesterday" => "yesterday",       // выведет "вчера", если дата прошлый день
      "d" => 'j F',                   // выведет "9 июля", если месяц прошел
      "" => 'j F Y',                    // выведет "9 июля 2012", если год прошел
  ), MakeTimeStamp(($arItem["ACTIVE_FROM"])?$arItem["ACTIVE_FROM"]:$arItem['DATE_CREATE']), time());

}

unset($arItem);
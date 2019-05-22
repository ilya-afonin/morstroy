<?php

$arSizes = array(
  'width' => 1920,
  'height' => 640
);

foreach ($arResult['ITEMS'] as $i => &$arItem) {
  $pic = $arItem['PREVIEW_PICTURE'];

  $file = CFile::ResizeImageGet($pic, $arSizes, BX_RESIZE_IMAGE_PROPORTIONAL, true);

  $arItem['PREVIEW_PICTURE']['SRC'] = $file['src'];

}

unset($arItem);
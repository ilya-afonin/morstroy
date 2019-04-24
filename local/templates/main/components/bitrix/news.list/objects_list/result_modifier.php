<?php

$arSizes = array(
  'width' => 561,
  'height' => 439
);

foreach ($arResult['ITEMS'] as $i => &$arItem) {
  $pic = $arItem['PREVIEW_PICTURE'];

  $file = CFile::ResizeImageGet($pic, $arSizes, BX_RESIZE_IMAGE_EXACT, true);

  $arItem['PREVIEW_PICTURE']['SRC'] = $file['src'];

//  $fileMedium = CFile::ResizeImageGet($pic, array(
//    'width' => 768,
//    'height' => 343
//  ), BX_RESIZE_IMAGE_EXACT, true);
//
//  $arItem['RESIZED_PICTURE_MEDIUM'] = array(
//    'SRC' => $fileMedium['src']
//  );
//
//  $fileSmall = CFile::ResizeImageGet($pic, array(
//      'width' => 480,
//      'height' => 465
//  ), BX_RESIZE_IMAGE_EXACT, true);
//
//  $arItem['RESIZED_PICTURE_SMALL'] = array(
//      'SRC' => $fileSmall['src']
//  );
}

unset($arItem);
<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  1 =>
  array (
      'CONDITION' => '#^/objects/([0-9]+)/(\\?.*)?#',
      'RULE' => 'ELEMENT_ID=$1',
      'PATH' => '/objects/detail.php',
      'SORT' => 200,
  ),
);

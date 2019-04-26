<?php
$arUrlRewrite=array (
  2 => 
  array (
    'CONDITION' => '#^/equipment/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/equipment/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/objects/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/objects/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  /*1 =>
  array (
    'CONDITION' => '#^/objects/([0-9]+)/(\\?.*)?#',
    'RULE' => 'ELEMENT_ID=$1',
    'PATH' => '/objects/detail.php',
    'SORT' => 200,
  ),*/
);

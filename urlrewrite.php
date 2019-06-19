<?php
$arUrlRewrite=array (
  6 => 
  array (
    'CONDITION' => '#^/about/advantages/([A-z0-9_]+)/(\\?.*)?#',
    'RULE' => 'ELEMENT_CODE=$1',
    'PATH' => '/about/advantages/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/equipment/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/equipment/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/services/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/services/index.php',
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
  4 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
);

<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\EventManager,
    Bitrix\Main\Loader;

Loader::registerAutoLoadClasses(null, [
    'Cake\Helpers\Main' => '/local/php_interface/classes/cake/main.php',
    'Cake\Constants' => '/local/php_interface/classes/cake/constants.php',
    'Debug' => '/local/php_interface/classes/debug.php'
]);

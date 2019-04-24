<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\EventManager as EventManager,
    Bitrix\Main\Loader;


Loader::registerAutoLoadClasses(null, [
    'Cake\EventHandlers\Search' => '/local/php_interface/classes/cake/handlers/search.php',
    'Cake\EventHandlers\Main' => '/local/php_interface/classes/cake/handlers/main.php',
    'Cake\EventHandlers\Optimize' => '/local/php_interface/classes/cake/handlers/optimize.php',
]);

EventManager::getInstance()->addEventHandler(
    "main",
    "OnEpilog",
    [
        "Cake\\EventHandlers\\Main",
        "check404Error"
    ]
);

EventManager::getInstance()->addEventHandler(
    "search",
    "BeforeIndex",
    [
        "Cake\\EventHandlers\\Search",
        "beforeIndexHandler"
    ]
);

EventManager::getInstance()->addEventHandler(
    "main",
    "OnEndBufferContent",
    [
        "Cake\\EventHandlers\\Optimize",
        "optimizeHTML",
    ],
    false,
    100
);

EventManager::getInstance()->addEventHandler(
    "main",
    "OnEndBufferContent",
    [
        "Cake\\EventHandlers\\Optimize",
        "deleteKernelCss",
    ],
    false,
    100
);
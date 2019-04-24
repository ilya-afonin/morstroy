<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader,
    Bitrix\Main\IO\File,
    Bitrix\Main\Application;

if (File::isFileExists(Application::getDocumentRoot()."/local/php_interface/include/classes.php"))
  require_once(Application::getDocumentRoot()."/local/php_interface/include/classes.php");

if (File::isFileExists(Application::getDocumentRoot()."/local/php_interface/include/handlers.php"))
  require_once(Application::getDocumentRoot()."/local/php_interface/include/handlers.php");

if(!defined('CUR_DIR')){
    define('CUR_DIR',$APPLICATION->GetCurDir());
}
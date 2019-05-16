<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
  die();

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset,
    Bitrix\Main\Loader,
    Cake\Helpers\Main;

Loc::loadMessages(__FILE__);
global $APPLICATION;
?>
<!DOCTYPE html>

<html lang="<?=LANGUAGE_ID;?>" class="page no-js">

<head>
  <title><?$APPLICATION->ShowTitle();?></title>
  <meta charset="<?=LANG_CHARSET;?>">
  <?$APPLICATION->ShowHead();?>

  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/tpl/build/css/style.min.css"); ?>

  <?Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge">');?>
  <?Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1">');?>
  <?Asset::getInstance()->addString('<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">');?><!--
  <?/*Asset::getInstance()->addString('<link rel="icon" type="image/x-icon" href="'.SITE_TEMPLATE_PATH.'/tpl/build/images/static/favicons/favicon.ico">');*/?>
  <?/*Asset::getInstance()->addString('<link rel="apple-touch-icon" sizes="180x180" href="'.SITE_TEMPLATE_PATH.'/tpl/build/images/static/favicons/apple-touch-icon.png">')*/?>
  <?/*Asset::getInstance()->addString('<link rel="icon" type="image/png" sizes="192x192"  href="'.SITE_TEMPLATE_PATH.'/tpl/build/images/static/favicons/android-chrome-192x192.png">')*/?>
  <?/*Asset::getInstance()->addString('<link rel="icon" type="image/png" sizes="256x256"  href="'.SITE_TEMPLATE_PATH.'/tpl/build/images/static/favicons/android-chrome-256x256.png">')*/?>
  <?/*Asset::getInstance()->addString('<link rel="icon" type="image/png" sizes="32x32" href="'.SITE_TEMPLATE_PATH.'/tpl/build/images/static/favicons/favicon-32x32.png">')*/?>
  <?/*Asset::getInstance()->addString('<link rel="icon" type="image/png" sizes="16x16" href="'.SITE_TEMPLATE_PATH.'/tpl/build/images/static/favicons/favicon-16x16.png">')*/?>

  <?/*Asset::getInstance()->addString('<link rel="canonical" href="http://'.SITE_SERVER_NAME.'">')*/?>
  <?/*Asset::getInstance()->addString('<meta property="og:url" content="http://'.SITE_SERVER_NAME.'" />')*/?>
  <?/*Asset::getInstance()->addString('<meta property="og:title" content="HARPIKS | ПОСТАВКА МОНТАЖ ПОЛИМЕРНЫХ ПОЛОВ"/>')*/?>
  <?/*Asset::getInstance()->addString('<meta property="og:description" content="Поставка и монтаж полимерных полов. Опытная бригада рабочих. Низкие цены за кв.м." />')*/?>
  <?/*Asset::getInstance()->addString('<meta property="og:type" content="website" />')*/?>
  --><?/*Asset::getInstance()->addString('<meta property="og:image" content="'.SITE_TEMPLATE_PATH.'/tpl/build/images/static/favicon.png" />')*/?>
  <?Asset::getInstance()->addString('<meta name="format-detection" content="telephone=no" />')?>

  <script >document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
</head>
<body>
<div id="panel">
  <?$APPLICATION->ShowPanel();?>
</div>

<body>
<div class="wrapper">

  <header class="header <?=$APPLICATION->ShowProperty("class_header")?>">
    <div class="header__container container">


      <a class="header__logo" href="/" alt="Главная">
        <?
        if(CUR_DIR == '/services/'){
          $APPLICATION->SetPageProperty("header_white", 'Y');
        }
        ?>
        <?if($APPLICATION->GetProperty("header_white") == 'Y'):?>

          <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/header_logo--white.php", Array(), Array("MODE" => "html"))?>

        <?else:?>

          <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/header_logo.php", Array(), Array("MODE" => "html"))?>

        <?endif;?>
      </a>

      <?php
      $APPLICATION->IncludeComponent(
          "bitrix:menu",
          "top",
          array(
              "ROOT_MENU_TYPE" => "top",
              "CHILD_MENU_TYPE" => "left",
              "MENU_CACHE_TYPE" => "A",
              "MENU_CACHE_TIME" => "36000006",
              "MENU_CACHE_USE_GROUPS" => "Y",
              "MENU_CACHE_GET_VARS" => array(
              ),
              "CACHE_SELECTED_ITEMS" => "N",
              "MAX_LEVEL" => "2",
              "USE_EXT" => "Y",
              "DELAY" => "N",
              "ALLOW_MULTI_SELECT" => "N",
              "COMPONENT_TEMPLATE" => "top"
          ),
          false
      );
      ?>

      <div class="header__phone">
        <button class="callback-btn callback-btn_white" id="callbackLink"><svg viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.41">
            <circle class="callback-btn__bg" cx="16.77" cy="16.77" r="16.77" fill="#fff"></circle>
            <clippath id="a">
              <circle cx="16.77" cy="16.77" r="16.77"></circle>
            </clippath>
            <g clip-path="url(#a)">
              <path class="callback-btn__icon" d="M22.35 24.95c-1.17.54-3.89 2.13-8.27-6.6-4.34-8.65-1.44-10-.37-10.56L15.28 7l2.6 5.17-1.55.78c-1.63.9 1.76 7.65 3.43 6.83L21.3 19l2.62 5.16-1.57.78z" fill="#00639f"></path>
            </g>
          </svg></button>
        <? $phone = Main::getPhoneLink(\COption::GetOptionString("askaron.settings", "UF_PHONE")); ?>
        <a class="header__phone-link" href="<?= $phone ?>"><?= \COption::GetOptionString("askaron.settings", "UF_PHONE") ?></a>
      </div>
      <button class="header__menu-mobile"></button>

    </div>
  </header>
  <main class="main">
    <div class="<?=(defined('PAGE_CLASS'))?PAGE_CLASS:'page'?> <?=$APPLICATION->ShowProperty("class_page")?>">

      <?
//        $nobread_pages = array('catalog', 'solutions', 'articles', 'projects');
//        $patterns_flattened = implode('|', $nobread_pages);
      ?>

      <?if((CUR_DIR != '/') && (ERROR_404 != 'Y') /*&& !preg_match('/'.$patterns_flattened.'/', CUR_DIR)*/):?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "main",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        ); ?>
      <?endif;?>

<?/*
<div class="page">
  <header class="header">
    <div class="header__inner">

      <div class="header__burger">
        <div class="header__burger-bar"></div>
        <div class="header__burger-bar"></div>
        <div class="header__burger-bar"></div>
      </div>
      <div class="header__phone">
        <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/header_phone.php", Array(), Array("MODE" => "php"))?>
        <div class="header__phone-button" data-popup="callback"></div>
      </div>
    </div>
  </header>
  <div class="content">
    <?

    $nobread_pages = array('catalog', 'solutions', 'articles', 'projects');
    $patterns_flattened = implode('|', $nobread_pages);?>

    <?if(CUR_DIR != '/' && !preg_match('/'.$patterns_flattened.'/', CUR_DIR)):?>
      <div class="c-top">
        <div class="c-top__inner">
          <div class="c-top__bg"></div>
          <div class="c-top__aside"></div>
          <div class="c-top__cont">

            <? $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "main",
                Array(
                    "PATH" => "",
                    "SITE_ID" => "s1",
                    "START_FROM" => "0"
                )
            ); ?>

            <h1 class="h1"><? $APPLICATION->ShowTitle(false) ?></h1>
            <?$page_text = $APPLICATION->GetProperty('page_text');?>
            <?if(strlen($page_text) > 0):?>
              <div class="c-top__txt">
                <?echo $page_text;?>
              </div>
            <?endif;?>
            <?$page_desc = $APPLICATION->GetProperty('page_desc');?>
            <?if(strlen($page_desc) > 0):?>
              <div class="c-top__desc">

                <? echo $page_desc;?>
              </div>
            <?endif;?>
          </div>
        </div>
      </div>
    <?endif?>
*/?>

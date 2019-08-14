<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
/** @var array $arParams */
/** @var array $arItem */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<? if (count($arResult['ITEMS']) > 0): ?>

  <section class="license">
    <div class="container license__container">
      <div class="license__inner <?if(PAGE == 'certificates') echo ' certificates__inner'?>">
        <div class="license__title-wrap<?if(PAGE == 'certificates') echo ' certificates__title-wrap'?>">
          <h2 class="license__title title_section">
            <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/licenses_title.php", Array(), Array("NAME" => "лицензии(заголовок)", "MODE" => "text"))?>
          </h2>
          <p class="license__desc">
            <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/licenses_desc.php", Array(), Array("NAME" => "лицензии(описание)", "MODE" => "text"))?>
          </p>
        </div>
        <div class="license__list-wrap">
          <ul class="license__list">
             <? foreach ($arResult['ITEMS'] as $k => $arItem): ?>
                 <?
                 $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                 $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                 ?>
                <li class="license__item" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
                  <h3>№ <?=$arItem['NAME']?></h3>
                  <div class="license__item-content">
                    <p><?=$arItem['PREVIEW_TEXT']?></p>
                    <?if(!empty($arItem['DISPLAY_PROPERTIES']['PDF']['FILE_VALUE'])):?>
                      <a class="license__item-file" href="<?=$arItem['DISPLAY_PROPERTIES']['PDF']['FILE_VALUE']['SRC']?>" download>
                        <svg width="26" height="24" viewBox="0 0 27 25" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.41">
                          <path d="M26.33 11.46a5.92 5.92 0 0 1-5.91 5.91h-2.28v-2.56h2.28c1.84 0 3.34-1.5 3.34-3.35 0-2.27-1.52-3.44-3.15-3.45-.08-3.77-2.6-5.45-5.04-5.45a5.1 5.1 0 0 0-4.88 3.38C9.38 4.04 5.81 5.47 6.55 8c-2.21-.4-3.99 1.27-3.99 3.45 0 1.85 1.5 3.35 3.35 3.35h2.61v2.56h-2.6A5.92 5.92 0 0 1 4.23 5.8a4.6 4.6 0 0 1 5.57-3.12A7.56 7.56 0 0 1 23 6.14a5.89 5.89 0 0 1 3.34 5.32zm-9.99 3.2c0-1.97.39-3.1 2.05-3.64-1.29-.54-8.02-1.85-8.02 4.3v3.77h-2.4l5.39 5.39 5.38-5.4h-2.4v-4.42z" fill="#ffffff" fill-rule="nonzero"></path>
                        </svg>
                      </a>
                    <?endif;?>
                  </div>
                  <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" />
                </li>
            <?endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </section>

<?endif;?>
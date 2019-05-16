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
      <div class="license__inner certificates__inner">
        <div class="license__title-wrap certificates__title-wrap">
          <h2 class="license__title title_section">Гарантированное качество</h2>
          <p class="license__desc">Лицензии и сертификаты</p>
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
                  <p><?=$arItem['PREVIEW_TEXT']?></p>
                  <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" />
                </li>
            <?endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </section>

<?endif;?>
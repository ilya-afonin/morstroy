<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc as Loc,
    Cake\Helpers\Main;
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

  <? foreach ($arResult['ITEMS'] as $arItem): ?>
    <section class="contacts__content">
      <div class="container">
        <div class="contacts__info">
          <p class="contacts__desc"><?= $arItem['NAME'] ?></p>
          <div class="contacts__inner">
            <? if (!empty($arItem['PROPERTIES']['ADDRESS']['VALUE'])): ?>
              <p><?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></p>
            <? endif; ?>
            <div class="contacts__phone-wrap">

              <? if (!empty($arItem['PROPERTIES']['PHONE']['VALUE'])): ?>
                <div class="contacts__phone">
                  <a href="<?= Main::getPhoneLink($arItem['PROPERTIES']['PHONE']['VALUE']) ?>"
                     title="<?= Loc::getMessage('PHONE') ?>">
                    <?= $arItem['PROPERTIES']['PHONE']['VALUE'] ?>
                  </a>
                  <span><?= Loc::getMessage('PHONE') ?></span>
                </div>
              <? endif; ?>

              <? if (!empty($arItem['PROPERTIES']['FAX']['VALUE'])): ?>
                <div class="contacts__phone">
                  <a href="<?= Main::getPhoneLink($arItem['PROPERTIES']['FAX']['VALUE']) ?>"
                     title="<?= Loc::getMessage('FAX') ?>">
                    <?= $arItem['PROPERTIES']['FAX']['VALUE'] ?>
                  </a>
                  <span><?= Loc::getMessage('FAX') ?></span>
                </div>
              <? endif; ?>

              <? if (!empty($arItem['PROPERTIES']['PHONE_SALE']['VALUE'])): ?>
                <div class="contacts__phone">
                  <a href="<?= Main::getPhoneLink($arItem['PROPERTIES']['PHONE_SALE']['VALUE']) ?>" title="<?= Loc::getMessage('SALE') ?>">
                    <?= $arItem['PROPERTIES']['PHONE_SALE']['VALUE'] ?>
                  </a>
                  <span><?= Loc::getMessage('SALE') ?></span>
                </div>
              <? endif; ?>
            </div>
            <? if (!empty($arItem['PROPERTIES']['EMAIL']['VALUE'])): ?>
              <a class="contacts__email" href="mailto:<?= $arItem['PROPERTIES']['EMAIL']['VALUE'] ?>"
                 title="<?= Loc::getMessage('EMAIL') ?>"><?= $arItem['PROPERTIES']['EMAIL']['VALUE'] ?></a>
            <? endif ?>
          </div>
        </div>
        <? if (!empty($arItem['PREVIEW_PICTURE']['SRC'])): ?>
          <div class="contacts__map" style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>)"></div>
        <? endif; ?>
      </div>
    </section>
  <? endforeach ?>

<? endif ?>
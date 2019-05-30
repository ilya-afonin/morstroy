<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

$assets = \Bitrix\Main\Page\Asset::getInstance();
Loc::loadMessages(__FILE__);
?>
  </div>
</main>
<footer class="footer<?=(CUR_DIR == '/')?' footer_multi-color':''?>">
  <div class="footer__container container">
    <span class="footer__copyright">
      <?= \COption::GetOptionString("askaron.settings", "UF_COPYRIGHT") ?>
    </span>
    <p class="footer__address<?=(CUR_DIR == '/')?' footer__address_color':''?>">
      <?= \COption::GetOptionString("askaron.settings", "UF_ADDRESS") ?>
    </p>
    <address class="footer__creator">
      <a class="footer__creator-link" href="https://cakelabs.ru/" alt="<?=Loc::getMessage('CREATOR_ALT')?>" target="_blank">
        <span class="footer__creator-desc"><?=Loc::getMessage('CREATOR');?>&nbsp;&ndash;&nbsp;</span>
        <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include/cake_logo.php", Array(), Array("MODE" => "php", 'SHOW_BORDER' => false))?>
      </a>
    </address>
  </div>
</footer>


</div>
<div class="modal">
  <div class="modal__content"></div><button class="modal__button"></button>
</div>

<template id="detailContent">
  <div class="detail">
    <div class="detail__text">
      <div class="detail__type"><span class="detail__type-desc">Флот</span>
        <h2 class="detail__title">Морская самоподъемная платформа «Ваенга»</h2>
      </div>
      <div class="detail__city"><span class="detail__info">Санкт-Петербург</span>
        <p class="detail__desc">Порт прописки</p>
      </div>
      <div class="detail__item"><span class="detail__info">16,89</span>
        <p class="detail__desc">Длина (м)</p>
      </div>
      <div class="detail__item"><span class="detail__info">2,51</span>
        <p class="detail__desc">Высота оборота (м)</p>
      </div>
      <div class="detail__item"><span class="detail__info">5,29</span>
        <p class="detail__desc">Ширина (м)</p>
      </div>
      <div class="detail__item"><span class="detail__info">2,2</span>
        <p class="detail__desc">Максимальная осадка (м)</p>
      </div>
    </div>
    <div class="detail__slider">
      <div class="swiper-wrapper">
        <div class="detail__slide swiper-slide" style="background-image: url(img/flot.jpg)"></div>
        <div class="detail__slide swiper-slide" style="background-image: url(img/home_bg.jpg)"></div>
        <div class="detail__slide swiper-slide" style="background-image: url(img/pic_1.jpg)"></div>
        <div class="detail__slide swiper-slide" style="background-image: url(img/about_bg.jpg)"></div>
      </div>
      <div class="detail__slider-navigation slider-nav">
        <div class="detail__slider-button detail__slider-button_prev slider-btn"></div>
        <div class="detail__slider-button detail__slider-button_next slider-btn slider-btn_next"></div>
      </div>
    </div>
  </div>
</template>
<template id="callbackForm">
  <div class="callback">
    <h1 class="callback__title title_section">Начните сотрудничать с&nbsp;нами</h1>
    <p class="callback__desc">Оставьте свой номер телефона, <br>и в&nbsp;ближайшее время наш специалист свяжется с вами.</p>
    <form class="callback__form" method="post" action="/local/tools/form-handler.php">
        <?=bitrix_sessid_post()?>
      <input class="callback__phone-area" id="phoneArea" type="tel" name="phone" placeholder="+7 (___) ___-__-__" value="+7" autofocus>
      <div class="callback__checkbox-wrap">
        <input class="callback__checkbox" id="privacyPolicyCheckbox" name="privacy" type="checkbox" checked>
        <label class="callback__checkbox-label" for="privacyPolicyCheckbox">Даю согласие на&nbsp;обработку моих персональных данных</label><a class="callback__privacy-policy" href="#" target="_blank" title="Просмотреть политику конфиденциальности">Политика конфиденциальности</a></div>
      <div class="callback__send-inner">
        <button class="button callback__send-btn button callback__send-btn_disabled" type="submit">Отправить</button>
        <p class="callback__message">23</p>
      </div>
    </form>
  </div>
</template>

<div class="tmp_for_json" style="display: none;"></div>

<?// $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/popups.php", Array(), Array("MODE" => "html")); ?>


<? if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false):
  $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include_areas/" . LANGUAGE_ID . "/yandex_metrika.php", Array(), Array("MODE" => "html"));
endif; ?>

<?
//$assets->addJs('https://api-maps.yandex.ru/2.1/?lang=ru_RU');

$assets->addJs(SITE_TEMPLATE_PATH . '/tpl/build/js/script.min.js');
if(PAGE == 'objects_detail'){?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnBfjkthm12TGSQ7iu8-qj4el4uFiK9Nc&amp;callback=initMap" async defer></script>
<?}

//$assets->addJs('/dev.js');
?>

</body>
</html>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$arSection = $arResult['SECTION']['PATH'][0];?>


        <div class="welcome__aside-title h1"><?=$arSection['NAME']?></div>
      </div>
    </div>
    <div class="welcome__media">
      <div class="welcome__media-image" style="background-image:url(<?=CFile::getPath($arSection['PICTURE'])?>)"></div>
    </div>
  </div>
  <div class="welcome__image">
    <img class="welcome__image-file" src="<?=SITE_TEMPLATE_PATH?>/tpl/assets/images/static/fingerprint_2.svg" alt="">
  </div>
</div>

<div class="container">
  <div class="decisions">
    <div class="decisions__s-name">
      <div class="s-name s-name--right s-name--border">
        <div class="s-name__text">
          <div class="s-name__title">о Решениях</div>
        </div>
      </div>
    </div>
    <div class="decisions__top">
      <div class="decisions__top-text">
        <?=$arSection['DESCRIPTION'];?>
      </div>
    </div>
    <div class="decisions__row">


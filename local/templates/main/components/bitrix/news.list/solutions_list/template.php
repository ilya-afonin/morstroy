<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$arSection = $arResult['SECTION']['PATH'][0]?>

    <div class="decisions__content">
      <div class="d-cards" id="solutions_list">
        <?php
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
          $APPLICATION->RestartBuffer();
        }
        ?>
        <?foreach($arResult['ITEMS'] as $arItem):?>
          <div class="d-card">
            <div class="d-card__image" style="background-image:url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
            <div class="d-card__content">
              <div class="d-card__title"><?=$arItem['NAME']?></div>
              <div class="d-card__price">
                <div class="d-card__price-full"><?=$arItem['PROPERTIES']['PRICE_M2']['VALUE']?> руб./м<sup>2</sup></div>
                <div class="d-card__price-detail"><?=$arItem['PROPERTIES']['PRICE_KG']['VALUE']?>  руб./кг</div>
              </div>
            </div>
            <div class="d-drop">
              <div class="d-drop__close"></div>
              <div class="d-drop__content">
                <div class="d-drop__top">
                  <div class="d-drop__title"><?=$arItem['NAME']?></div>
                  <div class="d-card__price">
                    <div class="d-card__price-full"><?=$arItem['PROPERTIES']['PRICE_M2']['VALUE']?> руб./м<sup>2</sup></div>
                    <div class="d-card__price-detail"><?=$arItem['PROPERTIES']['PRICE_KG']['VALUE']?> руб./кг</div>
                  </div>
                </div>
                <div class="d-drop__features">
                  <div class="d-drop__feature d-drop__feature--size"><?=$arItem['PROPERTIES']['THICKNESS']['VALUE']?> мм</div>
                  <div class="d-drop__feature d-drop__feature--protect">
                    <?foreach($arItem['PROPERTIES']['EXPLOITATION']['DISPLAY_VALUE'] as $exploit):?>
                      <div><?=$exploit?></div>
                    <?endforeach;?>
                  </div>
                </div>
                <div class="d-drop__options">
                  <?if(!empty($arItem['PROPERTIES']['GRUNT']['VALUE'])):?>
                  <div class="d-drop__option">
                    <div class="d-drop__option-row">
                      <div class="d-drop__option-name">Грунтование:</div>
                      <div class="d-drop__option-content">
                        <a class="d-drop__option-title" href="<?=$arItem['PROPERTIES']['GRUNT']['DISPLAY_LINK']?>"><?=$arItem['PROPERTIES']['GRUNT']['DISPLAY_NAME']?></a>
                        <?if(!empty($arItem['PROPERTIES']['GRUNT_RATE']['VALUE'])):?>
                          <div class="d-drop__option-text">расход <?=$arItem['PROPERTIES']['GRUNT_RATE']['VALUE']?> кг/м<sup>2</sup></div>
                        <?endif;?>
                      </div>
                    </div>
                  </div>
                  <?endif;?>
                  <?if(!empty($arItem['PROPERTIES']['SHPAT']['VALUE'])):?>
                  <div class="d-drop__option">
                    <div class="d-drop__option-row">
                      <div class="d-drop__option-name">Шпатлевание:</div>
                      <div class="d-drop__option-content">
                        <a class="d-drop__option-title" href="<?=$arItem['PROPERTIES']['SHPAT']['DISPLAY_LINK']?>"><?=$arItem['PROPERTIES']['SHPAT']['DISPLAY_NAME']?></a>
                        <?if(!empty($arItem['PROPERTIES']['SHPAT_RATE']['VALUE'])):?>
                          <div class="d-drop__option-text">расход <?=$arItem['PROPERTIES']['SHPAT_RATE']['VALUE']?> кг/м<sup>2</sup></div>
                        <?endif;?>
                      </div>
                    </div>
                  </div>
                  <?endif;?>
                  <?if(!empty($arItem['PROPERTIES']['FINISH']['VALUE'])):?>
                    <div class="d-drop__option">
                      <div class="d-drop__option-row">
                        <div class="d-drop__option-name">Финишный слой:</div>
                        <div class="d-drop__option-content">
                          <a class="d-drop__option-title" href="<?=$arItem['PROPERTIES']['FINISH']['DISPLAY_LINK']?>"><?=$arItem['PROPERTIES']['FINISH']['DISPLAY_NAME']?></a>
                          <?if(!empty($arItem['PROPERTIES']['FINISH_RATE']['VALUE'])):?>
                            <div class="d-drop__option-text">расход <?=$arItem['PROPERTIES']['FINISH_RATE']['VALUE'];?> кг/м<sup>2</sup></div>
                          <?endif;?>
                        </div>
                      </div>
                    </div>
                  <?endif;?>
                </div>
                <div class="d-drop__button"><a class="button button--blue button--small" href="#" data-popup="form">Заказать</a></div>
              </div>
            </div>
          </div>
        <?endforeach;?>

      </div>
    </div>
  </div>


  <?=$arResult["NAV_STRING"]?>

  <?if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
    die();
  }
  ?>



  <div class="types">
    <?foreach ($arResult['OTHER_SECTIONS'] as $i=> $arSection):?>
      <div class="types__item types__item--<?=($i%2==0)?'brown':'blue';?>">
        <a class="types__item-link" href="<?=$arSection['SECTION_PAGE_URL']?>"></a>
        <div class="types__item-name"><?=$arSection['NAME']?></div>
      </div>
    <?endforeach;?>
  </div>
</div>
</div>
  </div>
  </div>
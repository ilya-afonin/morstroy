<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
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

<?if(sizeof($arResult['PROPERTIES']['FILE']['RESIZE'])>0){?>
    <div class="n-slider" id="<?echo $this->GetEditAreaId($arResult['ID'])?>">
        <div class="n-slider__scene owl-carousel">
            <?foreach($arResult['PROPERTIES']['FILE']['RESIZE'] as $key=>$src){?>
                <div class="n-slider__slide">
                    <img class="n-slider__image" src="<?= $src?>" alt="<?= $arResult['PROPERTIES']['FILE']['DESCRIPTION'][$key]?>">
                    <div class="n-slider__note"><?= $arResult['PROPERTIES']['FILE']['DESCRIPTION'][$key]?></div>
                </div>
            <?}?>
        </div>
        <div class="n-slider__counter"><span class="n-slider__current"></span><span class="n-slider__total"></span></div>
    </div>
<?}?>

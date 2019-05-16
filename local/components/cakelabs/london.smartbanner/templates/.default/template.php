<?foreach ($arResult["BANNERS"] as $key=> $banner){?>
    <div class="welcome" style="background-image:url(<?=$banner["RESIZE"]?>)">
        <div class="mera">
            <div class="mera__logo"><a class="mera__link" href="/"></a>
                <object class="mera__logo-image" type="image/svg+xml" data="<?= SITE_TEMPLATE_PATH?>/tpl/assets/images/static/mera_logo_animated-text.svg"></object>
            </div>
        </div>
        <div class="welcome__content">
            <h1 class="welcome__title"><?$APPLICATION->ShowTitle(false);?></h1>
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "welcome", Array(
                "COMPONENT_TEMPLATE" => ".default",
                "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
            ),
                false
            );?>
        </div>
    </div>
<?}?>



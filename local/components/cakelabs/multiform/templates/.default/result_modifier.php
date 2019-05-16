<?if($arResult["MESS_OK"]){?>
    <?$APPLICATION->RestartBuffer();?>
        <?=$arResult["MESS_OK"]?>
    <?die();?>
<?}?>
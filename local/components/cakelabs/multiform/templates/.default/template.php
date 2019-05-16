<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="np_multiform">
    <?//CJSCore::Init(array('popup', 'date')); // для работы календаря?>
    <form name="np_multiform" ENCTYPE="multipart/form-data" action="<?=POST_FORM_ACTION_URI?>" method="post" >
        <?if(is_array($arParams["PROPERTY_FIELD_PHONE"])){?>
            <script src="<?=$templateFolder."/js/jquery.maskedinput.min.js";?>"></script>
        <?}?>
        <?=bitrix_sessid_post()?>
        <?if($arResult["MESS_OK"]): ?>
            <span class="np_form_ok_mess"><?= $arResult["MESS_OK"] ?></span><br><br>
        <?endif;?>
        <?if(is_array($arResult["ERROR_MESSAGE"])){
            foreach ($arResult["ERROR_MESSAGE"] as $v){?>
                <span class="np_error_mess"><? echo $v; ?></span><br>
            <?}?>
            <br>
        <?}?>


        <?foreach($arResult["DISPLAY_PROPERTIES"] as $arField){?>
            <?/*LIST*/?>
            <?if($arField["TYPE"] == "L"){?>
                <?if($arField["LIST_TYPE"] == "L"){?>
                    <?if ($arField["MULTIPLE"] == "Y"){?>
                        <select
                            class="
                                <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                                <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                            "
                            name=FIELDS[<?=$arResult["PREFIX"].$arField["ID"].$arResult["PARAMS_HASH"]?>][<?=$arField["CODE"]?>][]"
                            multiple="multiple">
                    <?}else{?>
                        <select
                            class="
                                <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                                <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                            "
                            name="FIELDS[<?=$arResult["PREFIX"].$arField["ID"].$arResult["PARAMS_HASH"]?>][<?=$arField["CODE"]?>]">
                    <?}?>
                            <?foreach ($arField["VALUE"] as $v){?>
                                <?if(!isset($_POST["FIELDS"][$arResult["PREFIX"].$arField["ID"].$arResult["PARAMS_HASH"]][$arField["CODE"]])/* && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])*/){?>
                                    <option value="<?=$v["ID"]?>" <?if($v['DEF'] == 'Y') echo 'selected="selected"';?> ><?=$v["VALUE"] ?></option>
                                <?}else{?>
                                    <?if($arField["MULTIPLE"] == "Y"){?>
                                        <option value="<?=$v["ID"]?>" <?if (in_array($v['ID'], $_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]])) echo 'selected="selected"'; ?> ><?=$v["VALUE"]?></option>
                                    <?}else{?>
                                        <option value="<?=$v["ID"]?>" <?if ($v['ID'] == $_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]]) echo 'selected="selected"'; ?> ><?=$v["VALUE"]?></option>
                                    <?}?>
                                <?}?>
                            <?}?>
                        </select>
                <?
                }elseif($arField["LIST_TYPE"] == "C"){
                    if ($arField["MULTIPLE"] == "Y") {
                        foreach ($arField["VALUE"] as $v){
                            if (!isset($_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]])/* && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])*/){?>

                                <input
                                    class="
                                        <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                                        <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                                    "
                                    id="<?=$v["ID"]?>"
                                    type="checkbox"
                                    name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]?>][<?=$arField["CODE"]?>][]"
                                    value="<?=$v["ID"]?>"
                                    <?if($v["DEF"] == "Y") echo 'checked="checked"';?>
                                    >
                                <?/*?><label for="<?=$v["ID"]?>"><?=$v["VALUE"]?></label><br/><?*/?>
                            <?}else{?>
                                <input
                                    class="
                                        <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                                        <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                                    "
                                    id="<?=$v["ID"]?>"
                                    type="checkbox"
                                    name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]?>][<?=$arField["CODE"]?>][]"
                                    value="<?=$v["ID"]?>"
                                    <?if(in_array($v['ID'], $_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]])) echo 'checked="checked"';?>>
                            <?}
                        }
                    }else {
                        foreach($arField["VALUE"] as $v){
                            if (!isset($_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"]][$arField["CODE"]])/* && !isset($arResult["FORM_ERRORS"]["EMPTY_FIELD"][$arField["CODE"]])*/) {
                                ?>

                                <input
                                    class="
                                        <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                                        <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                                    "
                                    id="<?= $v["ID"] ?>"
                                    type="checkbox"
                                    name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"] ?>][<?=$arField["CODE"]?>]"
                                    value="<?= $v["ID"] ?>"
                                    <?if ($v["DEF"] == "Y") echo 'checked="checked"';?>
                                    >
                                <?/*?><label for="<?=$v["ID"]?>"><?=$v["VALUE"]?></label><?*/?>
                            <?
                            } else {
                                ?>
                                <input
                                    class="
                                        <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                                        <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                                    "
                                    id="<?= $v["ID"] ?>"
                                    type="checkbox"
                                    name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"] ?>][<?=$arField["CODE"]?>]"
                                    value="<?= $v["ID"] ?>"
                                    <?if (in_array($v['ID'], $_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]])) echo 'checked="checked"';?>>
                            <?
                            }
                        }
                    }
                }
                /*HTML/TEXT*/
            }elseif($arField["USER_TYPE"] == "HTML"){?>
                <div>
                    <textarea
                        class="
                            <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                            <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                        "
                        placeholder="<?=$arField["DEFAULT_VALUE"]["TEXT"]?><?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>*<?}?>"
                        name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"] ?>][<?=$arField["CODE"]?>]"
                    ><?=$arResult["FIELD"][$arResult["PREFIX"]. $arField['ID'] . $arResult["PARAMS_HASH"]][$arField["CODE"]]?></textarea>
                </div>
                <?/*DATE*/?>
            <?}elseif($arField["USER_TYPE"] == "DateTime" || $arField["USER_TYPE"] == "Date"){?>
                <div>
                    <input
                        class="
                            np_date
                            <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                            <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                        "
                        placeholder="<?=$arField["HINT"]?$arField["HINT"]:$arField["NAME"]?><?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>*<?}?>"
                        type="text"
                        size="40"
                        id="<?=$arResult["FIELD"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]]?>"
                        name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"] ?>][<?=$arField["CODE"]?>]"
                        value="<?=$arResult["FIELD"][$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"]][$arField["CODE"]]?>"
                        readonly="readonly"
                        onclick="BX.calendar({node:this, field:'FIELDS[<?=$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"] ?>]', form: '', bTime: false, currentTime: '<?=(time()+date("Z")+CTimeZone::GetOffset())?>', bHideTime: false});" />

                    <div class="alx_feed_back_form_calendar_icon <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>" >
                        <?
                        require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/interface/admin_lib.php");
                        define("ADMIN_THEME_ID", CAdminTheme::GetCurrentTheme());
                        echo CAdminPage::ShowScript();
                        echo Calendar("FIELDS[".$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]."][".$arField["CODE"]."]","np_multiform");
                        ?>
                    </div>
                </div>
                <?/*ELEMENTS*/?>
            <?/*}elseif($arField["TYPE"] == "E"){?>
                    <?echo '<pre>'; print_r($arField); echo '</pre>';?>
                <div>
                    <?if($arField["MULTIPLE"] == "Y") { ?>
                        <? foreach ($arField["LINKED_ELEMENTS"] as $arEl){?>
                            <p>
                                <input
                                    class="<?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>"
                                    type="checkbox"
                                    name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"] ?>][<?=$arField["CODE"]?>][]"
                                    value="<?= $arEl["ID"] ?>" id="<?=$_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]]?>" <?
                                    if (!empty($_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]]) && in_array($arEl["ID"], $_POST["FIELDS"][$arResult["PREFIX"].$arField['CODE'].$arResult["PARAMS_HASH"]][$arField["CODE"]])){?>checked="checked"<?}?>/>
                                <!--                            <label for="--><? //=$arField["CODE"]?><!--1_-->
                                <? //=$arEl["ID"]?><!--">--><? //=$arEl["NAME"]?><!--</label>-->
                            </p>
                        <?}
                    }else{?>
                        <? foreach ($arField["LINKED_ELEMENTS"] as $arEl){?>
                            <p>
                                <input
                                    class="<?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>"
                                    type="checkbox"
                                    name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"] ?>][<?=$arField["CODE"]?>][]"
                                    value="<?= $arEl["ID"] ?>" id="<?=$_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]]?>" <?
                                    if (!empty($_POST["FIELDS"][$arResult["PREFIX"].$arField['ID'].$arResult["PARAMS_HASH"]][$arField["CODE"]]) && in_array($arEl["ID"], $_POST["FIELDS"][$arResult["PREFIX"].$arField['CODE'].$arResult["PARAMS_HASH"]][$arField["CODE"]])){?>checked="checked"<?}?>/>
                                <!--                            <label for="--><? //=$arField["CODE"]?><!--1_-->
                                <? //=$arEl["ID"]?><!--">--><? //=$arEl["NAME"]?><!--</label>-->
                            </p>
                        <?}
                    }?>
                </div>
                <?///STRING + E + G?>
            <?*/}elseif($arField["TYPE"] != "F"){?>
                <div>
                    <?if($arField["MULTIPLE"] == "N"){?>
                    <input
                        class="
                            <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELD_PHONE"])){?>np_phone<?}?>
                            <?if(in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_HIDDEN"])){?> np_hidden<?}?>
                            <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>required<?}?>
                        "
                        <?//if(!in_array($arField["CODE"], $arParams["PROPERTY_FIELD_PHONE"])){?>
                        placeholder="<?=$arField["HINT"]?$arField["HINT"]:$arField["NAME"]?><?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array($arField["CODE"], $arParams["PROPERTY_FIELDS_REQUIRED"])){?>*<?}?>"
                        <?//}?>
                        type="text"
                        size="40"
                        <?if($arField['CODE'] == "URL"){?>target_url="Y"<?}?>
                        name="FIELDS[<?=$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"] ?>][<?=$arField["CODE"]?>]"
                        value="<?=$arResult["FIELD"][$arResult["PREFIX"].$arField['ID'] . $arResult["PARAMS_HASH"]][$arField["CODE"]]?>" />
                    <?}?>
                </div>
                <?/*FILE*/?>
            <?}elseif($arField["TYPE"] == "F"){?>
                <input type="hidden" id="codeFileFields" name="codeFileFields[<?=$arField['CODE']?>]" value="<?=$arField['CODE']?>">
                <div>
                    <input type="hidden" name="FIELDS[myFile][<?=$arField["CODE"]?>]">
                    <?			if($arField["MULTIPLE"] == "Y"):?>
                        <input type="file" id="alx_feed_back_form_file_input_add<?=$k++?>" name="myFile[<?=$arField['CODE']?>][]" class="alx_feed_back_form_file_input_add" size="<?=$arParams["WIDTH_FORM"]?>" multiple="true" ><br/>
                    <?			else:?>
                        <input type="file" id="alx_feed_back_form_file_input_add<?=$k++?>" name="myFile[<?=$arField['CODE']?>]" class="alx_feed_back_form_file_input_add" size="<?=$arParams["WIDTH_FORM"]?>" />
                    <?			endif;?>
                </div>

            <?}?>
        <?}?>

        <?if($arParams["USE_MESSAGE_FIELD"] == "Y"){?>
            <textarea
                class="
                    <?if(in_array("MESSAGE_FIELD", $arParams["PROPERTY_FIELDS_HIDDEN"])){?>np_hidden<?}?>
                    <?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array("MESSAGE_FIELD", $arParams["PROPERTY_FIELDS_REQUIRED"])){?>*<?}?>
                "
                name="FIELDS[<?=$arResult["PREFIX"]?>MESSAGE_FIELD_<?=$arResult["PARAMS_HASH"]?>]"
                placeholder="<?=$arParams["MESSAGE_FIELD_NAME"]?><?if(empty($arParams["PROPERTY_FIELDS_REQUIRED"]) || in_array("MESSAGE_FIELD", $arParams["PROPERTY_FIELDS_REQUIRED"])){?>*<?}?>"
                rows="5"
                cols="100"><?=$arResult["FIELDS"]["MESSAGE_FIELD"]?></textarea>
        <?}?>

        <? if (!empty($arResult["CAPTCHA_CODE"])): ?>
            <div class="captcha">
                <h3><?= GetMessage("CAPTCHA_TITLE") ?>:</h3><br/>
                <img align="left" alt="<?= GetMessage("CAPTCHA_ALT") ?>"
                     src="/bitrix/tools/captcha.php?captcha_code=<?= $arResult["CAPTCHA_CODE"] ?>"/>&nbsp;
                <input type="hidden" name="captcha_code" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                <input size="30" maxlength="50" type="text" name="captcha_word"/>
            </div>
        <? endif; ?>
        <br>
        <div class="clear"></div>
    <!--    <div class="btn-group">-->
    <!--        <div class="btn btn-file"><span><input name="file" type="file" value="--><?//= $arParams["FILE"] ?><!--"></span>-->
    <!--        </div>-->
    <!--        <div class="btn-submit">-->
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                <input type="submit" name="submit"  class="btn" value="<?= GetMessage("SUBMIT") ?>">
    <!--        </div>-->
            <div class="clear"></div>
    <!--    </div>-->
    </form>
    <?if(is_array($arParams["PROPERTY_FIELD_PHONE"])){?>
        <script type="text/javascript">
            $(function($){
                $(".np_phone").mask("+7(999)999-99-99");
            });
        </script>
    <?}?>
</div>


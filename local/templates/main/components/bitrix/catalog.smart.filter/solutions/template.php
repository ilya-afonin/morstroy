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
<div class="decisions__sidebar">
  <div class="d-sidebar">
    <form class="d-sidebar__form" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" id="form_catalog_filter">

    <?foreach($arResult["HIDDEN"] as $arItem):?>
    <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
    <?endforeach;?>

    <?
    //not prices
    foreach($arResult["ITEMS"] as $key=>$arItem)
    {
        if(
            empty($arItem["VALUES"])
            || isset($arItem["PRICE"])
        )
            continue;

        if (
            $arItem["DISPLAY_TYPE"] == "A"
            && (
                $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
            )
        )
            continue;
        ?>

        <?
        $arCur = current($arItem["VALUES"]);
        switch ($arItem["DISPLAY_TYPE"])
        {
            case "A"://NUMBERS_WITH_SLIDER
                ?>
                <div class="bx_filter_parameters_box_container_block">
                    <div class="bx_filter_input_container">
                        <input
                            class="min-price"
                            type="text"
                            name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                            value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                            size="5"
                            onkeyup="smartFilter.keyup(this)"
                        />
                    </div>
                </div>
                <div class="bx_filter_parameters_box_container_block">
                    <div class="bx_filter_input_container">
                        <input
                            class="max-price"
                            type="text"
                            name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                            value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                            size="5"
                            onkeyup="smartFilter.keyup(this)"
                        />
                    </div>
                </div>
                <div style="clear: both;"></div>

                <div class="bx_ui_slider_track" id="drag_track_<?=$key?>">
                    <?
                    $value1 = $arItem["VALUES"]["MIN"]["VALUE"];
                    $value2 = $arItem["VALUES"]["MIN"]["VALUE"] + round(($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])/4);
                    $value3 = $arItem["VALUES"]["MIN"]["VALUE"] + round(($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])/2);
                    $value4 = $arItem["VALUES"]["MIN"]["VALUE"] + round((($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])*3)/4);
                    $value5 = $arItem["VALUES"]["MAX"]["VALUE"];
                    ?>
                    <div class="bx_ui_slider_part p1"><span><?=$value1?></span></div>
                    <div class="bx_ui_slider_part p2"><span><?=$value2?></span></div>
                    <div class="bx_ui_slider_part p3"><span><?=$value3?></span></div>
                    <div class="bx_ui_slider_part p4"><span><?=$value4?></span></div>
                    <div class="bx_ui_slider_part p5"><span><?=$value5?></span></div>

                    <div class="bx_ui_slider_pricebar_VD" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
                    <div class="bx_ui_slider_pricebar_VN" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
                    <div class="bx_ui_slider_pricebar_V"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
                    <div class="bx_ui_slider_range" 	id="drag_tracker_<?=$key?>"  style="left: 0;right: 0;">
                        <a class="bx_ui_slider_handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
                        <a class="bx_ui_slider_handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
                    </div>
                </div>
                <?
                $arJsParams = array(
                    "leftSlider" => 'left_slider_'.$key,
                    "rightSlider" => 'right_slider_'.$key,
                    "tracker" => "drag_tracker_".$key,
                    "trackerWrap" => "drag_track_".$key,
                    "minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
                    "maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
                    "minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
                    "maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
                    "curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                    "curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                    "fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
                    "fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
                    "precision" => $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0,
                    "colorUnavailableActive" => 'colorUnavailableActive_'.$key,
                    "colorAvailableActive" => 'colorAvailableActive_'.$key,
                    "colorAvailableInactive" => 'colorAvailableInactive_'.$key,
                );
                ?>
                <script type="text/javascript">
                    BX.ready(function(){
                        window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
                    });
                </script>
                <?
                break;
            case "B"://NUMBERS
                ?>
                <div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container">
                    <input
                        class="min-price"
                        type="text"
                        name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                        id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                        value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                        size="5"
                        onkeyup="smartFilter.keyup(this)"
                        />
                </div></div>
                <div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container">
                    <input
                        class="max-price"
                        type="text"
                        name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                        id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                        value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                        size="5"
                        onkeyup="smartFilter.keyup(this)"
                        />
                </div></div>
                <?
                break;
            case "G"://CHECKBOXES_WITH_PICTURES
                ?>
                <?foreach ($arItem["VALUES"] as $val => $ar):?>
                    <input
                        style="display: none"
                        type="checkbox"
                        name="<?=$ar["CONTROL_NAME"]?>"
                        id="<?=$ar["CONTROL_ID"]?>"
                        value="<?=$ar["HTML_VALUE"]?>"
                        <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                    />
                    <?
                    $class = "";
                    if ($ar["CHECKED"])
                        $class.= " active";
                    if ($ar["DISABLED"])
                        $class.= " disabled";
                    ?>
                    <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label dib<?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'active');">
                        <span class="bx_filter_param_btn bx_color_sl">
                            <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                            <span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                            <?endif?>
                        </span>
                    </label>
                <?endforeach?>
                <?
                break;
            case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
                ?>
                <?foreach ($arItem["VALUES"] as $val => $ar):?>
                    <input
                        style="display: none"
                        type="checkbox"
                        name="<?=$ar["CONTROL_NAME"]?>"
                        id="<?=$ar["CONTROL_ID"]?>"
                        value="<?=$ar["HTML_VALUE"]?>"
                        <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                    />
                    <?
                    $class = "";
                    if ($ar["CHECKED"])
                        $class.= " active";
                    if ($ar["DISABLED"])
                        $class.= " disabled";
                    ?>
                    <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'active');">
                        <span class="bx_filter_param_btn bx_color_sl">
                            <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                <span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                            <?endif?>
                        </span>
                        <span class="bx_filter_param_text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
                        if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
                            ?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
                        endif;?></span>
                    </label>
                <?endforeach?>
                <?
                break;
            case "P"://DROPDOWN
                $checkedItemExist = false;
                ?>
                <div class="filtr__item">
                    <div class="bx_filter_select_block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
                        <div class="bx_filter_select_text" data-role="currentOption">
                            <?
                            foreach ($arItem["VALUES"] as $val => $ar)
                            {
                                if ($ar["CHECKED"])
                                {
                                    echo $ar["VALUE"];
                                    $checkedItemExist = true;
                                }
                            }
                            if (!$checkedItemExist)
                            {
                                echo GetMessage("CT_BCSF_FILTER_ALL");
                            }
                            ?>
                        </div>
                        <div class="bx_filter_select_arrow"></div>
                        <input
                            style="display: none"
                            type="radio"
                            name="<?=$arCur["CONTROL_NAME_ALT"]?>"
                            id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
                            value=""
                        />
                        <?foreach ($arItem["VALUES"] as $val => $ar):?>
                            <input
                                style="display: none"
                                type="radio"
                                name="<?=$ar["CONTROL_NAME_ALT"]?>"
                                id="<?=$ar["CONTROL_ID"]?>"
                                value="<? echo $ar["HTML_VALUE_ALT"] ?>"
                                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                            />
                        <?endforeach?>
                        <div class="bx_filter_select_popup" data-role="dropdownContent" style="display: none;">
                            <ul>
                                <li>
                                    <label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx_filter_param_label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
                                        <? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
                                    </label>
                                </li>
                            <?
                            foreach ($arItem["VALUES"] as $val => $ar):
                                $class = "";
                                if ($ar["CHECKED"])
                                    $class.= " selected";
                                if ($ar["DISABLED"])
                                    $class.= " disabled";
                            ?>
                                <li>
                                    <label for="<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')"><?=$ar["VALUE"]?></label>
                                </li>
                            <?endforeach?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?
                break;
            case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
                ?>
                <div class="bx_filter_select_container">
                    <div class="bx_filter_select_block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
                        <div class="bx_filter_select_text" data-role="currentOption">
                            <?
                            $checkedItemExist = false;
                            foreach ($arItem["VALUES"] as $val => $ar):
                                if ($ar["CHECKED"])
                                {
                                ?>
                                    <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                        <span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                                    <?endif?>
                                    <span class="bx_filter_param_text">
                                        <?=$ar["VALUE"]?>
                                    </span>
                                <?
                                    $checkedItemExist = true;
                                }
                            endforeach;
                            if (!$checkedItemExist)
                            {
                                ?><span class="bx_filter_btn_color_icon all"></span> <?
                                echo GetMessage("CT_BCSF_FILTER_ALL");
                            }
                            ?>
                        </div>
                        <div class="bx_filter_select_arrow"></div>
                        <input
                            style="display: none"
                            type="radio"
                            name="<?=$arCur["CONTROL_NAME_ALT"]?>"
                            id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
                            value=""
                        />
                        <?foreach ($arItem["VALUES"] as $val => $ar):?>
                            <input
                                style="display: none"
                                type="radio"
                                name="<?=$ar["CONTROL_NAME_ALT"]?>"
                                id="<?=$ar["CONTROL_ID"]?>"
                                value="<?=$ar["HTML_VALUE_ALT"]?>"
                                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                            />
                        <?endforeach?>
                        <div class="bx_filter_select_popup" data-role="dropdownContent" style="display: none">
                            <ul>
                                <li style="border-bottom: 1px solid #e5e5e5;padding-bottom: 5px;margin-bottom: 5px;">
                                    <label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx_filter_param_label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
                                        <span class="bx_filter_btn_color_icon all"></span>
                                        <? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
                                    </label>
                                </li>
                            <?
                            foreach ($arItem["VALUES"] as $val => $ar):
                                $class = "";
                                if ($ar["CHECKED"])
                                    $class.= " selected";
                                if ($ar["DISABLED"])
                                    $class.= " disabled";
                            ?>
                                <li>
                                    <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
                                        <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                            <span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                                        <?endif?>
                                        <span class="bx_filter_param_text">
                                            <?=$ar["VALUE"]?>
                                        </span>
                                    </label>
                                </li>
                            <?endforeach?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?
                break;
            case "K"://RADIO_BUTTONS
                ?>
                <div class="filtr__item">
                    <?
                    unset($checkedVal);
                    $checkedVal = GetMessage('CT_BCSF_FILTER_VALUE_NOT_SET');
                    $checkedVal_const = GetMessage('CT_BCSF_FILTER_VALUE_NOT_SET');?>
                    <?foreach($arItem["VALUES"] as $val => $ar){
                        unset($name_val);
                        unset($id_val);
                        $name_val = $ar["CONTROL_NAME"];
                        $id_val = $ar["CONTROL_ID"];
                        if($ar["CHECKED"]){
                            $checkedVal = $ar["VALUE"];
                        }
                    }?>
                    <div class="filtr__opener">
                        <div class="filtr__item-title"><?= $checkedVal?></div>
                        <div class="filtr__name"><?= $arItem['NAME']?></div>
                    </div>
                    <div class="filtr__drop">
                        <label for="<? echo $arItem['CODE'] ?>" class="filrt__drop-label filrt__drop-label_unset"><? echo $checkedVal_const ?></label>
                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <input
                                    type="radio"
                                    value=""
                                    name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
                                    id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
                                    class="filtr__drop-input"
                            />
                            <?// обратить внимание что filtr в инпуте отличается от filrt label!!!! ?>
                            <label for="<? echo "all_".$arCur["CONTROL_ID"] ?>" class="filrt__drop-label"><? echo $ar["VALUE"] ?></label>
                        <?endforeach;?>
                    </div>
                </div>
                <?
                break;
            case "U"://CALENDAR
                ?>
                <div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container bx_filter_calendar_container">
                    <?$APPLICATION->IncludeComponent(
                        'bitrix:main.calendar',
                        '',
                        array(
                            'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
                            'SHOW_INPUT' => 'Y',
                            'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MIN"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
                            'INPUT_NAME' => $arItem["VALUES"]["MIN"]["CONTROL_NAME"],
                            'INPUT_VALUE' => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                            'SHOW_TIME' => 'N',
                            'HIDE_TIMEBAR' => 'Y',
                        ),
                        null,
                        array('HIDE_ICONS' => 'Y')
                    );?>
                </div></div>
                <div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container bx_filter_calendar_container">
                    <?$APPLICATION->IncludeComponent(
                        'bitrix:main.calendar',
                        '',
                        array(
                            'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
                            'SHOW_INPUT' => 'Y',
                            'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MAX"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
                            'INPUT_NAME' => $arItem["VALUES"]["MAX"]["CONTROL_NAME"],
                            'INPUT_VALUE' => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                            'SHOW_TIME' => 'N',
                            'HIDE_TIMEBAR' => 'Y',
                        ),
                        null,
                        array('HIDE_ICONS' => 'Y')
                    );?>
                </div></div>
                <?
                break;
            default://CHECKBOXES
            ?>

            <div class="d-sidebar__section">
              <div class="d-sidebar__title"><?= $arItem['NAME']?></div>
              <div class="d-sidebar__items">
                    <?foreach($arItem["VALUES"] as $val => $ar):?>
                        <div class="d-sidebar__item"><?// d-sidebar__item--disabled?>
                          <div class="d-sidebar__item-check">
                            <input class="d-sidebar__checkbox" type="checkbox" value="<?echo $ar['HTML_VALUE'];?>" name="<? echo $ar["CONTROL_NAME"] ?>"
                                   id="<? echo $ar["CONTROL_ID"] ?>" <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>>
                            <label class="d-sidebar__item-label" for="<? echo $ar["CONTROL_ID"] ?>"><? echo $ar["VALUE"] ?></label>
                            <?/*<div class="d-sidebar__item-value"><!--10--></div>*/?>
                          </div>
                        </div>
                    <?endforeach;?>
              </div>
            </div>
        <?}?>
    <?
    }
    ?>



    <div class="f-props__clear-wrapper">
      <a class="f-props__clear" href="javascript:void(0);">
        <?=GetMessage("CT_BCSF_DEL_FILTER")?></a>
    </div>

    <div class="bx_filter_button_box active" hidden>
        <div class="title_label_for_default"><?= GetMessage('CT_BCSF_FILTER_VALUE_NOT_SET');?></div>
        <input class="bx_filter_search_button" type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" />
        <input class="bx_filter_search_reset" type="submit" id="del_filter" name="del_filter" value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>" />
    </div>
</form>
  </div>
</div>
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
<?$this->SetViewTarget('filter_solution');?>


<form class="d-sidebar__form" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
  <?/*foreach($arResult["ITEMS"] as $arItem):*/?><!--
    <?/*if(!array_key_exists("HIDDEN", $arItem)):*/?>
      <tr>
        <td valign="top"><?/*=$arItem["NAME"]*/?>:</td>
        <td valign="top"><?/*=$arItem["INPUT"]*/?></td>
      </tr>
    <?/*endif*/?>
  --><?/*endforeach;*/?>
  <div class="d-sidebar__section">
    <div class="d-sidebar__title">Основа:</div>
    <div class="d-sidebar__items">
      <div class="d-sidebar__item">
        <div class="d-sidebar__item-check">
          <input class="d-sidebar__checkbox" type="checkbox" id="check_1">
          <label class="d-sidebar__item-label" for="check_1">Полиуретановая</label>
          <div class="d-sidebar__item-value">22</div>
        </div>
      </div>
      <div class="d-sidebar__item">
        <div class="d-sidebar__item-check">
          <input class="d-sidebar__checkbox" type="checkbox" id="check_2">
          <label class="d-sidebar__item-label" for="check_2">Эпоксидная</label>
          <div class="d-sidebar__item-value">16</div>
        </div>
      </div>
      <div class="d-sidebar__item">
        <div class="d-sidebar__item-check">
          <input class="d-sidebar__checkbox" type="checkbox" id="check_3">
          <label class="d-sidebar__item-label" for="check_3">Спортивные полы</label>
          <div class="d-sidebar__item-value">22</div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-sidebar__section">
    <div class="d-sidebar__title">Эксплуатация:</div>
    <div class="d-sidebar__items">
      <div class="d-sidebar__item d-sidebar__item--disabled">
        <div class="d-sidebar__item-check">
          <input class="d-sidebar__checkbox" type="checkbox" id="check_4">
          <label class="d-sidebar__item-label" for="check_4">Антистатичность</label>
          <div class="d-sidebar__item-value">10</div>
        </div>
      </div>
      <div class="d-sidebar__item">
        <div class="d-sidebar__item-check">
          <input class="d-sidebar__checkbox" type="checkbox" id="check_5">
          <label class="d-sidebar__item-label" for="check_5">Отрицательная температура</label>
          <div class="d-sidebar__item-value">7</div>
        </div>
      </div>
      <div class="d-sidebar__item">
        <div class="d-sidebar__item-check">
          <input class="d-sidebar__checkbox" type="checkbox" id="check_6">
          <label class="d-sidebar__item-label" for="check_6">Ударные нагрузки</label>
          <div class="d-sidebar__item-value">5</div>
        </div>
      </div>
      <div class="d-sidebar__item">
        <div class="d-sidebar__item-check">
          <input class="d-sidebar__checkbox" type="checkbox" id="check_7">
          <label class="d-sidebar__item-label" for="check_7">Ультрафиолетовое излучение</label>
          <div class="d-sidebar__item-value">9</div>
        </div>
      </div>
      <div class="d-sidebar__item">
        <div class="d-sidebar__item-check">
          <input class="d-sidebar__checkbox" type="checkbox" id="check_8">
          <label class="d-sidebar__item-label" for="check_8">Химическое воздействие</label>
          <div class="d-sidebar__item-value">9</div>
        </div>
      </div>
    </div>
  </div>
  <input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" />
  <input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;
  <input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" /></td>
</form>


<!--<form>
	<?/*foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;*/?>
	<table class="data-table" cellspacing="0" cellpadding="2">
	<thead>
		<tr>
			<td colspan="2" align="center"><?/*=GetMessage("IBLOCK_FILTER_TITLE")*/?></td>
		</tr>
	</thead>
	<tbody>

	</tbody>
	<tfoot>
		<tr>
			<td colspan="2">

		</tr>
	</tfoot>
	</table>
</form>-->
<?$this->EndViewTarget()?>

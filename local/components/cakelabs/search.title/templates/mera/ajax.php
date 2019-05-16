<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(!empty($arResult["CATEGORIES"])):?>
		<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
			<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
                <?
                // get url for first dir
                $tmp_parse = explode('/',$arItem["URL"]);
                $arCategory['URL'] = '/'.$tmp_parse[1].'/';
                ?>
				<?/*if($i == 0):?>
					<?echo $arCategory["TITLE"]?>
				<?else:?>
				<?endif*/?>

				<?if($category_id === "all"):?>
                    <?/*?>
                    <div class="h-search__item">
                        <a class="h-search__cat" href="<?= $arCategory['URL']?>"><?//= $arCategory['TITLE']?> <span class='h-search__cat-value'>/ <?= $i+1;?></span></a>
                        <a class="h-search__name" href="<?= $arItem["URL"]?>"><?echo $arItem["NAME"]?></a>
                    </div>
                    <?*/?>
				<?elseif(isset($arItem["ICON"])):?>
                    <div class="h-search__item">
                        <a class="h-search__cat" href="<?= $arCategory['URL']?>"><?= $arCategory['TITLE']?> <span class='h-search__cat-value'>/ <?= $i+1;?></span></a>
                        <a class="h-search__name" href="<?= $arItem["URL"]?>"><?echo $arItem["NAME"]?></a>
                    </div>
				<?else:?>
                    <div class="h-search__item">
                        <a class="h-search__cat" href="<?= $arCategory['URL']?>"><?= $arCategory['TITLE']?> <span class='h-search__cat-value'>/ <?= $i+1;?></span></a>
                        <a class="h-search__name" href="<?= $arItem["URL"]?>"><?echo $arItem["NAME"]?></a>
                    </div>
				<?endif;?>
			<?endforeach;?>
		<?endforeach;?>
<?endif;
?>
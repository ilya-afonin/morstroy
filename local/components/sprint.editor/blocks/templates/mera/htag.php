<?/** @var $block array */?>

<?switch($block['settings']['textpos']){
    case 'title_list':
        ?>
        <div class="design-stages__section_ol">
            <<?= $block['type']?> id="<?= $block['anchor']?>" class="n-list__title"><?=$block['value']?></<?= $block['type']?>>
        </div>
        <?
        break;
    case 'without_container':
        ?>
        <div class="k-section__title">
            <<?= $block['type']?> id="<?= $block['anchor']?>" class="s-title"><?=$block['value']?></<?= $block['type']?>>
        </div>
        <?
        break;
    default:
        ?>
        <div class="container">
            <div class="k-section__title">
                <<?= $block['type']?> id="<?= $block['anchor']?>" class="s-title"><?=$block['value']?></<?= $block['type']?>>
            </div>
        </div>
    <?}?>




<?/*if (!empty($block['anchor'])):?><a name="<?=$block['anchor']?>"></a><?endif;?>
<<?=$block['type']?>><?=$block['value']?></<?=$block['type']?>>


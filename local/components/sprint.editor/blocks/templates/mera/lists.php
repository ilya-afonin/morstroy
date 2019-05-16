<?/** @var $block array */?>

<?switch($block['settings']['textpos']){
    case 'somebody_list':
        ?>
        <?
        break;
    default:
        ?>
    <div class="design-stages__section_ol">
        <ol class="n-list__ul">
            <?foreach($block['elements'] as $item){?>
                <li class="n-list-li"><?=$item['text']?></li>
            <?}?>
        </ol>
    </div>
<?}?>
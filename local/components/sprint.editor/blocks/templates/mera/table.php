<? /** @var $block array */ ?>
<?switch($block['settings']['textpos']){
    case 'thead_table':
        ?>
        <div class="design-stages__section_ol">
            <div class="design-stages__table-wrap">
                <table>
                    <?foreach ($block['rows'] as $key => $cols){?>
                        <?if($key == 0){?>
                            <thead>
                                <tr>
                                    <?foreach ($cols as $key_col => $col){?>
                                        <th><?=$col['text']?></th>
                                    <?}?>
                                </tr>
                            </thead>
                        <?}else{?>
                            <tbody>
                                <tr>
                                    <?foreach ($cols as $key_col => $col){?>
                                        <?if($key_col == 0){?>
                                            <th><?=$col['text']?></th>
                                        <?}else{?>
                                            <td><?=$col['text']?></td>
                                        <?}?>

                                    <?}?>
                                </tr>
                        <?}?>
                        </tbody>
                    <?}?>
                </table>
            </div>
        </div>
        <?
        break;
    default:
        ?>
        <div class="design-stages__section_ol">
            <div class="design-stages__table-wrap">
                <table>
                    <?foreach ($block['rows'] as $cols){?>
                        <tr>
                            <?foreach ($cols as $col){?>
                                <td><?=$col['text']?></td>
                            <?}?>
                        </tr>
                    <?}?>
                </table>
            </div>
        </div>
    <?}?>
<?/*?>
<div class="sp-block-table">
    <table>
        <?foreach ($block['rows'] as $cols):?>
        <tr>
            <?foreach ($cols as $col): $col = Sprint\Editor\Blocks\Table::prepareColumn($col);?>
                <td <?if ($col['style']):?>style="<?=$col['style']?>"<?endif;?>
                    <?if ($col['colspan']):?>colspan="<?=$col['colspan']?>"<?endif;?>
                    <?if ($col['rowspan']):?>rowspan="<?=$col['rowspan']?>"<?endif;?>
                ><?=$col['text']?></td>
            <?endforeach;?>
        </tr>
        <?endforeach;?>
    </table>
</div>
<?*/?>
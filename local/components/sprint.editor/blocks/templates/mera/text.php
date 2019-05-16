<?/** @var $block array */
?><?//=Sprint\Editor\Blocks\Text::getValue($block)?>
<?
switch($block['settings']['textpos']){
    case 'center_text': // название сетки
        ?>
        <div class="k-section">
            <div class="k-section__text">
                <p><?= $block['value']?></p>
            </div>
        </div>

        <?
        break;
    case 'center_text_in_container': // название сетки
        ?>
        <div class="container">
            <div class="k-section">
                <div class="k-section__text">
                    <p><?= $block['value']?></p>
                </div>
            </div>
        </div>

        <?
        break;
    case 'blockquote_text': // название сетки
        ?>
        <div class="k-section">
            <div class="blockquote blockquote--large">
                <div class="blockquote__content">
                    <div class="blockquote__text"><?= $block['value']?></div>
                </div>
            </div>
        </div>

        <?
        break;
    case 'blockquote_text_in_container': // название сетки
        ?>
        <div class="design-stages__section_ol">
            <div class="blockquote blockquote--large">
                <div class="blockquote__content">
                    <div class="blockquote__text"><?= $block['value']?></div>
                </div>
            </div>
        </div>

        <?
        break;

}?>


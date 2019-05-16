<?/** @var $block array */?>

<?switch($block['settings']['textpos']){
    case 'image_no':
        ?>
        <div class="k-section__content">
            <div class="k-note">
                <div class="k-note__main"><?= $block['image']['desc']?></div>
                <div class="k-note__text">
                    <p><?= $block['text']['value']?></p>
                </div>
            </div>
        </div>
        <?
        break;
    case 'image_no_container':
        ?>
        <div class="container">
            <div class="k-section__content">
                <div class="k-note">
                    <div class="k-note__main"><?= $block['image']['desc']?></div>
                    <div class="k-note__text">
                        <p><?= $block['text']['value']?></p>
                    </div>
                </div>
            </div>
        </div>
        <?
        break;
    case 'image_no_3d_container':
        ?>
        <script src="/local/templates/main/tpl/assets/merahouse/js/three.js"></script>
        <script src="/local/templates/main/tpl/assets/merahouse/js/inflate.min.js"></script>
        <script src="/local/templates/main/tpl/assets/merahouse/js/FBXLoader.js"></script>
        <script src="/local/templates/main/tpl/assets/merahouse/js/OrbitControls.js"></script>
        <script src="/local/templates/main/tpl/assets/merahouse/js/Detector.js"></script>
        <script src="/local/templates/main/tpl/assets/merahouse/js/main.js"></script>
        <div class="container">
            <div class="ds-3d-wrap" id="ds-3d-wrap">
            </div>
            <div class="k-section__content">
                <div class="k-note">
                    <div class="k-note__main"><?= $block['image']['desc']?></div>
                    <div class="k-note__text">
                        <p><?= $block['text']['value']?></p>
                    </div>
                </div>
            </div>
        </div>
        <?
        break;
    case 'image_right_skos':
        $image['RESIZE'] = CFile::ResizeImageGet($block['image']['file']["ID"], array('width'=>680, 'height'=>520), BX_RESIZE_IMAGE_EXACT, true)['src'];
        ?>
        <div class="ds-top">
            <div class="ds-top__wrap">
                <div class="ds-top__text">
                    <?= $block['text']['value']?>
                </div>
            </div>
            <div class="ds-top__pic-bg" style="background-image: url(<?= $image['RESIZE'];?>);"></div>
        </div>
        <?
        break;
    case 'image_citata':
        $image['RESIZE'] = CFile::ResizeImageGet($block['image']['file']["ID"], array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true)['src'];
        ?>
        <div class="container">
            <div class="design-stages__section">
                <div class="design-stages__quote-wrap"><img class="design-stages__quote-ava" src="<?= $image['RESIZE'];?>">
                    <div class="design-stages__quote-text">
                        <div class="design-stages__quote"><?= $block['text']['value']?></div>
                        <div class="design-stages__quote-desc"><?= $block['image']['desc'];?></div>
                    </div>
                </div>
            </div>
        </div>
        <?
        break;
    case 'image_citata_news_detail':
        $image['RESIZE'] = CFile::ResizeImageGet($block['image']['file']["ID"], array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true)['src'];
        ?>
        <div class="design-stages__section">
            <div class="design-stages__quote-wrap"><img class="design-stages__quote-ava" src="<?= $image['RESIZE'];?>">
                <div class="design-stages__quote-text">
                    <div class="design-stages__quote"><?= $block['text']['value']?></div>
                    <div class="design-stages__quote-desc"><?= $block['image']['desc'];?></div>
                </div>
            </div>
        </div>
        <?
        break;
    default:
        ?>
        <?$image['RESIZE'] = CFile::ResizeImageGet($block['image']['file']["ID"], array('width'=>625, 'height'=>420), BX_RESIZE_IMAGE_EXACT, true)['src'];?>
        <div class="k-section">
            <div class="k-section__content">
                <div class="k-media <?= $block['settings']['textpos'] == 'image_right'?'k-media--reverse':'';?>"><img class="k-media__image" src="<?= $image['RESIZE']?>" alt="<?= $block['image']['desc']?>">
                    <div class="k-media__content">
                        <div class="k-media__title"><?= $block['image']['desc']?></div>
                        <div class="k-media__text"><?= $block['text']['value']?></div>
                    </div>
                </div>
            </div>
        </div>
<?}?>




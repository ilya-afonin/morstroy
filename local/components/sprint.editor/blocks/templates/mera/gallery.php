<?/**
 * @var $block array
 * @var $this \SprintEditorBlocksComponent
 */?>

<?
switch($block['settings']['textpos']){
    case 'gallery_big':
        // resize images
        foreach($block['images'] as $key=>$arImage){
            $images[$key]['RESIZE'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>1250, 'height'=>750), BX_RESIZE_IMAGE_EXACT, true)['src'];
            $images[$key]['RESIZE_THUMB'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>285, 'height'=>171), BX_RESIZE_IMAGE_EXACT, true)['src'];
        }

        if(!empty($images)){
            ?>
            <div class="k-section">
                <div class="k-section__w-slider">
                    <div class="w-slider">
                        <div class="w-slider__scene owl-carousel">
                            <?foreach($images as $key=>$arItem){?>
                                <div class="w-slider__slide"><img class="w-slider__slide-image" src="<?= $arItem['RESIZE']?>" alt="<?= $block['images'][$key]['desc']?>"></div>
                            <?}?>
                        </div>
                        <div class="w-slider__thumbs-wrapper">
                            <div class="w-slider__thumbs">
                                <?foreach($images as $key=>$arItem){?>
                                    <div class="w-slider__thumb <?if($key == 0){?>is-active<?}?>"><img class="w-slider__thumb-image" src="<?= $arItem['RESIZE_THUMB']?>" alt="<?= $block['images'][$key]['desc']?>"></div>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?
        }

        break;
    case 'gallery_middle':
        // resize images
        foreach($block['images'] as $key=>$arImage){
            $images[$key]['RESIZE'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>1300, 'height'=>780), BX_RESIZE_IMAGE_EXACT, true)['src'];
        }
        if(!empty($images)){
        ?>
            <div class="n-slider">
                <div class="n-slider__scene owl-carousel">
                    <?foreach($images as $key=>$arItem){?>
                        <div class="n-slider__slide">
                            <img class="n-slider__image" src="<?= $arItem['RESIZE']?>" alt="<?= $block['images'][$key]['desc']?>">
                            <div class="n-slider__note"><?= $block['images'][$key]['desc']?></div>
                        </div>
                    <?}?>
                </div>
                <div class="n-slider__counter"><span class="n-slider__current"></span><span class="n-slider__total"></span></div>
            </div>
        <?
        }

        break;
    case 'gallery_middle_container':
        // resize images
        foreach($block['images'] as $key=>$arImage){
            $images[$key]['RESIZE'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>1300, 'height'=>780), BX_RESIZE_IMAGE_EXACT, true)['src'];
        }
        if(!empty($images)){
            ?>
            <div class="container">
                <div class="n-slider">
                    <div class="n-slider__scene owl-carousel">
                        <?foreach($images as $key=>$arItem){?>
                            <div class="n-slider__slide">
                                <img class="n-slider__image" src="<?= $arItem['RESIZE']?>" alt="<?= $block['images'][$key]['desc']?>">
                                <div class="n-slider__note"><?= $block['images'][$key]['desc']?></div>
                            </div>
                        <?}?>
                    </div>
                    <div class="n-slider__counter"><span class="n-slider__current"></span><span class="n-slider__total"></span></div>
                </div>
            </div>
            <?
        }

        break;
    case 'gallery_small':
        // resize images
        foreach($block['images'] as $key=>$arImage){
            $images[$key]['RESIZE'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>1300, 'height'=>780), BX_RESIZE_IMAGE_EXACT, true)['src'];
        }
        if(!empty($images)){
            ?>
            <div class="n-slider n-slider--small">
                <div class="n-slider__scene owl-carousel">
                    <?foreach($images as $key=>$arItem){?>
                        <div class="n-slider__slide">
                            <img class="n-slider__image" src="<?= $arItem['RESIZE']?>" alt="<?= $block['images'][$key]['desc']?>">
                            <div class="n-slider__note"><?= $block['images'][$key]['desc']?></div>
                        </div>
                    <?}?>
                </div>
                <div class="n-slider__counter"><span class="n-slider__current"></span><span class="n-slider__total"></span></div>
            </div>
            <?
        }

        break;
    case 'gallery_small_container':
        // resize images
        foreach($block['images'] as $key=>$arImage){
            $images[$key]['RESIZE'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>1300, 'height'=>780), BX_RESIZE_IMAGE_EXACT, true)['src'];
        }
        if(!empty($images)){
            ?>
            <div class="container">
                <div class="n-detail__container">
                    <div class="n-slider n-slider--small">
                        <div class="n-slider__scene owl-carousel">
                            <?foreach($images as $key=>$arItem){?>
                                <div class="n-slider__slide">
                                    <img class="n-slider__image" src="<?= $arItem['RESIZE']?>" alt="<?= $block['images'][$key]['desc']?>">
                                    <div class="n-slider__note"><?= $block['images'][$key]['desc']?></div>
                                </div>
                            <?}?>
                        </div>
                        <div class="n-slider__counter"><span class="n-slider__current"></span><span class="n-slider__total"></span></div>
                    </div>
                </div>
            </div>
            <?
        }

        break;
    case 'gallery_scroll':
        // resize images
        foreach($block['images'] as $key=>$arImage){
            if($arImage['file']["ID"]){
                $arFile = CFile::GetFileArray($arImage['file']["ID"]);
                $images[$key]['WIDTH'] = $arFile['WIDTH'];
                $images[$key]['HEIGHT'] = $arFile['HEIGHT'];
                if($images[$key]['WIDTH']<$images[$key]['HEIGHT']){
                    $images[$key]['RESIZE'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>620, 'height'=>780), BX_RESIZE_IMAGE_EXACT, true)['src'];
                }else{
                    $images[$key]['RESIZE'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>1250, 'height'=>780), BX_RESIZE_IMAGE_EXACT, true)['src'];
                }
                $images[$key]['RESIZE_BIG'] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>1600, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
            }
        }
        if(!empty($images)){
            ?>
            <div class="gallery">
                <?foreach($images as $key=>$arItem){?>
                    <a class="gallery__item <?if($arItem['WIDTH']<$arItem['HEIGHT']){?>gallery__item--small<?}?>" href="<?= $arItem['RESIZE_BIG']?>" data-fancybox="gallery"><img class="gallrey__item-image" src="<?= $arItem['RESIZE']?>" alt="<?= $block['images'][$key]['desc']?>"></a>
                <?}?>
            </div>
            <?
        }

        break;
    default:
        ?>
<?}?>

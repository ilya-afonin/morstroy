<? /**
 * @var $this \SprintEditorBlocksComponent
 * @var $layout array
 *
 */
?>
<?if (count($layout['columns']) == 1 && empty($layout['columns'][0]['css'])){?>
    <? $this->includeLayoutBlocks( 0) ?>
<?}else{?>
    <?
    switch($layout['columns'][0]['css']){
        case 'my_column_two': // название сетки
            foreach ($layout['columns'] as $columnIndex => $column){
                $pos = $this->layoutIndex . ',' . $columnIndex;
                if (isset($this->preparedBlocks[$pos])) {
                    $content = $this->preparedBlocks[$pos];
                }
            }
            ?>
            <div class="info">
                <div class="info__row">
                    <div class="info__col">
                        <div class="info__title"><?= $content[0]['value'];?></div>
                        <div class="info__text"><?= $content[1]['value'];?></div>
                    </div>
                    <div class="info__col">
                        <div class="info__title"><?= $content[2]['value'];?></div>
                        <div class="info__text"><?= $content[3]['value'];?></div>
                    </div>
                </div>
            </div>

            <?
            break;
        case 'my_column_two_in_container': // название сетки
            foreach ($layout['columns'] as $columnIndex => $column){
                $pos = $this->layoutIndex . ',' . $columnIndex;
                if (isset($this->preparedBlocks[$pos])) {
                    $content = $this->preparedBlocks[$pos];
                }
            }
            ?>
            <div class="container">
                <div class="info">
                    <div class="info__row">
                        <div class="info__col">
                            <div class="info__title"><?= $content[0]['value'];?></div>
                            <div class="info__text"><?= $content[1]['value'];?></div>
                        </div>
                        <div class="info__col">
                            <div class="info__title"><?= $content[2]['value'];?></div>
                            <div class="info__text"><?= $content[3]['value'];?></div>
                        </div>
                    </div>
                </div>
            </div>

            <?
            break;
        case 'my_column_gray': // название сетки
            foreach ($layout['columns'] as $columnIndex => $column){
                $pos = $this->layoutIndex . ',' . $columnIndex;
                if (isset($this->preparedBlocks[$pos])) {
                    $content = $this->preparedBlocks[$pos];
                }
            }
            ?>
            <div class="ds-banner">
                <div class="ds-banner__col"><?= $content[0]['value'];?></div>
                <div class="ds-banner__col"><?= $content[1]['value'];?></div>
            </div>

            <?
            break;
        case 'my_column_gray_in_container': // название сетки
            foreach ($layout['columns'] as $columnIndex => $column){
                $pos = $this->layoutIndex . ',' . $columnIndex;
                if (isset($this->preparedBlocks[$pos])) {
                    $content = $this->preparedBlocks[$pos];
                }
            }
            ?>
            <div class="container">
                <div class="ds-banner">
                    <div class="ds-banner__col"><?= $content[0]['value'];?></div>
                    <div class="ds-banner__col"><?= $content[1]['value'];?></div>
                </div>
            </div>

            <?
            break;
        case 'photo_with_text_and_link': // название сетки
            foreach ($layout['columns'] as $columnIndex => $column){
                $pos = $this->layoutIndex . ',' . $columnIndex;
                if (isset($this->preparedBlocks[$pos])) {
                    $content = $this->preparedBlocks[$pos];
                }
            }

            foreach($content[0]['images'] as $key=>$arImage){
                $content[0]['RESIZE'][] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>620, 'height'=>400), BX_RESIZE_IMAGE_EXACT, true)['src'];
            }

            if(sizeof($content[0]['RESIZE'])>0){?>
                <div class="design-stages__section">
                    <div class="design-stages__row">
                        <div class="design-stages__col design-stages__col--slider">
                            <div class="ds-slider owl-carousel">
                                <?foreach($content[0]['RESIZE'] as $key=>$src){?>
                                    <a data-fancybox="<?= $content[0]['name'].intval($content[0]['layout'])?>" class="gallery__item" href="<?= $content[0]['images'][$key]['file']['ORIGIN_SRC']?>">
                                        <div class="ds-slider__item"><img src="<?= $src;?>" alt="<?= $content[0]['images'][$key]['desc']?>"></div>
                                    </a>
                                <?}?>
                            </div>
                        </div>
                        <div class="design-stages__col design-stages__col--text">
                            <h2><?= $content[1]['value']?></h2>
                            <div class="design-stages__desc"><?= $content[2]['value']?></div>
                            <?if($content[3]['value']){?>
                                <a class="design-stages__download-wrap" target="_blank" href="<?= $content[3]['value']?>">
                                    <img class="design-stages__download-pic" src="<?= SITE_TEMPLATE_PATH?>/tpl/assets/images/static/load.svg">
                                    <div class="design-stages__download-desc">Смотреть пример</div>
                                </a>
                            <?}?>
                        </div>
                    </div>
                </div>
            <?}?>

            <?/*?>
            <div class="container">
                <p>Сколько людей - столько взглядов и мнений. Также и с мнением об  идеальном доме. Кому-то по душе английский консерватизм, другим -  современный минимализм, а некоторые мечтают об особняке в классическом  стиле.</p>
                <p>Команда архитекторов и конструкторов компании «Мера-проект» как никто  понимают, что любой заказчик - личность со своими желаниями и  требованиями, поэтому работа над каждым проектом начинается с изучения  вкусов и пожеланий будущего хозяина дома.</p>
                <h4 class="design-stages__title">Что мы учитываем при индивидуальном проектировании дома:</h4>
                <div class="design-stages__section">
                    <ol>
                        <li>Размеры, форма, рельеф участка, ориентация относительно сторон света, расположение подъездов, соседние строения;</li>
                        <li>Стиль будущего дома;</li>
                        <li>Имеющиеся и планирующиеся объекты инженерной инфраструктуры (водоснабжение, канализация, газ и проч.);</li>
                        <li>Данные инженерно-геологических исследований почвы, уровень грунтовых вод;</li>
                        <li>Надворные постройки, в том числе те, которые только в планах (хозяйственный блок, гараж и навес, беседка, летняя кухня и др.).</li>
                    </ol>
                </div>
            </div>
            <?*/?>
            <?
            break;
        case 'photo_with_text_and_link_reverse': // название сетки //design-stages__row--reverse
            foreach ($layout['columns'] as $columnIndex => $column){
                $pos = $this->layoutIndex . ',' . $columnIndex;
                if (isset($this->preparedBlocks[$pos])) {
                    $content = $this->preparedBlocks[$pos];
                }
            }

            foreach($content[0]['images'] as $key=>$arImage){
                $content[0]['RESIZE'][] = CFile::ResizeImageGet($arImage['file']["ID"], array('width'=>620, 'height'=>400), BX_RESIZE_IMAGE_EXACT, true)['src'];
            }

            if(sizeof($content[0]['RESIZE'])>0){?>
                <div class="design-stages__section">
                    <div class="design-stages__row design-stages__row--reverse">
                        <div class="design-stages__col design-stages__col--slider">
                            <div class="ds-slider owl-carousel">
                                <?foreach($content[0]['RESIZE'] as $key=>$src){?>
                                    <a data-fancybox="<?= $content[0]['name'].intval($content[0]['layout'])?>" class="gallery__item" href="<?= $content[0]['images'][$key]['file']['ORIGIN_SRC']?>">
                                        <div class="ds-slider__item"><img src="<?= $src;?>" alt="<?= $content[0]['images'][$key]['desc']?>"></div>
                                    </a>
                                <?}?>
                            </div>
                        </div>
                        <div class="design-stages__col design-stages__col--text">
                            <h2><?= $content[1]['value']?></h2>
                            <div class="design-stages__desc"><?= $content[2]['value']?></div>
                            <?if($content[3]['value']){?>
                                <a class="design-stages__download-wrap" target="_blank" href="<?= $content[3]['value']?>">
                                    <img class="design-stages__download-pic" src="<?= SITE_TEMPLATE_PATH?>/tpl/assets/images/static/load.svg">
                                    <div class="design-stages__download-desc">Смотреть пример</div>
                                </a>
                            <?}?>
                        </div>
                    </div>
                </div>
            <?}?>
            <?
            break;
        default:
            //echo '<pre>'; print_r('_default'); echo '</pre>';
    }?>

<?}?>

<? /**
 * @var $this \SprintEditorBlocksComponent
 * @var $layout array
 *
 */
?>

<? if (count($layout['columns']) == 1 && empty($layout['columns'][0]['css'])) { ?>
  <? $this->includeLayoutBlocks(0) ?>
<? } else { ?>

  <?

  switch ($layout['columns'][0]['css']) {
    case 'h2_text_row_left': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;

        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }
      ?>

      <div class="page__content">
        <h2><?= $content[0]['value']; ?></h2>
        <?
        if(strpos($content[1]['value'], '<') !== false){
           preg_match("/<p[^>]*>(.*?)<\/p>/is", $content[1]['value'], $matches);
          $main_text = $matches[1];
          ?>
          <p class="left-line"><?= $main_text; ?></p>
          <?
        } else {
            echo $content[1]['value'];
        }

        ?>

        <?//на случай добавления новых текстовых блоков
        for ($i = 2; $i < count($content); $i++):?>
          <? echo $content[$i]['value'] ?>
        <?endfor;?>

      </div>

      <?
      break;


  case 'h2_text_row_left_content': // название сетки
    foreach ($layout['columns'] as $columnIndex => $column) {
      $pos = $this->layoutIndex . ',' . $columnIndex;

      if (isset($this->preparedBlocks[$pos])) {
        $content = $this->preparedBlocks[$pos];
      }
    }
    ?>

    <div class="page__content">

      <h2><?= $content[0]['value']; ?></h2>

      <?
          if(strpos($content[1]['value'], '<') !== false){
            preg_match("/<p[^>]*>(.*?)<\/p>/is", $content[1]['value'], $matches);
            $main_text = $matches[1];
            ?>
            <p class="left-line"><?= $main_text; ?></p>
            <?
          } else { ?>
            <p class="left-line"><?= $content[1]['value']; ?></p>
          <? } ?>

      <?//на случай добавления новых текстовых блоков
      for ($i = 2; $i < count($content); $i++):?>
        <?
        echo $content[$i]['value'] ?>
      <?endfor; ?>

    </div>

    <?
    break;
    case 'h2_row_blue_image': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;
        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }
      $content[1]['resize'] = CFile::ResizeImageGet($content[1]['file']["ID"], array('width' => 934, 'height' => 466), BX_RESIZE_IMAGE_EXACT, true)['src'];

      ?>

      <div class="page__content">
        <h2 class="bottom-line"><?= $content[0]['value']; ?></h2>
        <div class="slide" style="background-image: url(<?= $content[1]['resize']; ?>)">
          <div class="slide__inner">
            <h3><?= $content[2]['value']; ?></h3>
            <?= $content[3]['value']; ?>
          </div>
        </div>
      </div>

      <?
      break;


    case 'file_link': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;
        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }
      ?>


      <div class="page__content">
        <a class="download-file" href="<?= $content[0]['files'][0]['file']['SRC']; ?>" download>
          <label class="download-file__button">
            <svg class="download-file__icon" width="26" height="24" viewBox="0 0 27 25"
                 xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round"
                 stroke-miterlimit="1.41">
              <path class="download-file__icon-path"
                    d="M26.33 11.46a5.92 5.92 0 0 1-5.91 5.91h-2.28v-2.56h2.28c1.84 0 3.34-1.5 3.34-3.35 0-2.27-1.52-3.44-3.15-3.45-.08-3.77-2.6-5.45-5.04-5.45a5.1 5.1 0 0 0-4.88 3.38C9.38 4.04 5.81 5.47 6.55 8c-2.21-.4-3.99 1.27-3.99 3.45 0 1.85 1.5 3.35 3.35 3.35h2.61v2.56h-2.6A5.92 5.92 0 0 1 4.23 5.8a4.6 4.6 0 0 1 5.57-3.12A7.56 7.56 0 0 1 23 6.14a5.89 5.89 0 0 1 3.34 5.32zm-9.99 3.2c0-1.97.39-3.1 2.05-3.64-1.29-.54-8.02-1.85-8.02 4.3v3.77h-2.4l5.39 5.39 5.38-5.4h-2.4v-4.42z"
                    fill="#01619d" fill-rule="nonzero"></path>
            </svg>
            <input class="download-file__link" type="submit" value="Скачать файл">
          </label>
        </a>
      </div>

      <?
      break;

  case 'my_pic_text': // название сетки
    foreach ($layout['columns'] as $columnIndex => $column) {
      $pos = $this->layoutIndex . ',' . $columnIndex;
      if (isset($this->preparedBlocks[$pos])) {
        $content = $this->preparedBlocks[$pos];
      }
    }
    ?>



    <?
    break;

    case 'my_table': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;
        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }

      ?>


      <div class="page__inner">
        <table class="info-table">

          <?
          $thead = array_shift($content[0]['rows']); ?>

          <tr>
            <?
            //Debug::dtc($thead, 'head');
            foreach ($thead as $h => $header):?>
              <td<?
              if ($h == 0) echo ' id="start"'; elseif ($h == count($thead) - 1) echo ' id="end"';
              if($header['attrs']) echo ' class="'.implode(' ', $header['attrs']).'"';
              if($header['rowspan']) echo ' rowspan="'.$header['rowspan'].'"'?>
              ><?= $header['text'] ?></td>
            <?endforeach; ?>
          </tr>


          <?
          foreach ($content[0]['rows'] as $r => $columns):?>
            <tr>
              <?
              foreach ($columns as $c => $column):?>
                <td<?if($column['attrs']) echo ' class="'.implode(' ', $column['attrs']).'"';
                if($column['rowspan']) echo ' rowspan="'.$column['rowspan'].'"'?>><?= $column['text'] ?></td>
              <?endforeach; ?>
            </tr>
          <?endforeach; ?>

        </table>
      </div>
      <div class="table-nav slider-nav"><a
                class="table-nav__btn table-nav__btn_disabled slider-btn slider-btn_color slider-btn_prev"></a><a
                class="table-nav__btn slider-btn slider-btn_color slider-btn_next"></a></div>

      <?
      break;


    case 'my_video': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;
        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
        $content[0]['resize'] = CFile::ResizeImageGet($content[0]['preview']['file']["ID"], array('width' => 934, 'height' => 466), BX_RESIZE_IMAGE_EXACT, true)['src'];
      }

      $url = str_replace("watch?v=", "embed/", $content[0]['url']);

      ?>

      <div class="page__content">
        <div class="slide" style="background-image: url(<?= $content[0]['resize'] ?>)">
          <a href="#" id="<?=$url?>"></a>
          <div class="slide__inner">
            <h3><?= $content[1]['value'] ?></h3>
            <?= $content[2]['value'] ?>
          </div>
        </div>
      </div>

      <?
      break;

    case 'my_3_items_in_row': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;
        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }
      ?>
      <div class="page__inner">
        <div class="item-cart__list">
          <?foreach ($content as $item):?>
            <?
            $item['image']['resize'] = CFile::ResizeImageGet($item['image']['file']["ID"], array('width' => 510, 'height' => 675), BX_RESIZE_IMAGE_EXACT, true)['src'];
            ?>
            <article class="item-cart">
              <div class="item-cart__img" style="background-image: url(<?= $item['image']['resize']?>)"></div>
              <h3><?=$item['image']['desc']?></h3>
              <?=$item['text']['value']?>
            </article>
          <?endforeach;?>
        </div>
      </div>
      <?
      break;

    case 'my_gallery': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;
        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }
      ?>
      </div>
      <div class="page__inner">
        <div class="slider swiper-container container">
        <div class="swiper-wrapper">
          <?foreach ($content[0]['images'] as $item):?>
            <?
              $item['file']['RESIZE'] = CFile::ResizeImageGet($item['file']["ID"], array('width' => 1720, 'height' => 700), BX_RESIZE_IMAGE_EXACT, true)['src'];
            ?>
          <div class="slide slider__item swiper-slide" style="background-image: url(<?=$item['file']['RESIZE']?>)">
            <div class="slide__inner slider__inner">
              <h3><?=$item['desc']?></h3>
              <p><?=$item['text']?></p>
            </div>
          </div>
          <?endforeach;?>
        </div>
        <div class="slider__navigation slider-nav">
          <div class="slider__button slider__button_prev slider-btn slider-btn_color">
          </div>
          <div class="slider__button slider__button_next slider-btn slider-btn_color slider-btn_next">
          </div>
        </div>
      </div>
      </div>
      <div class="container">
      <?
      break;

    default:
      //echo '<pre>'; print_r('_default'); echo '</pre>';
  } ?>

<? } ?>

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
    case 'h1_text_row_left': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;

        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }
      ?>
      <? preg_match("/<p[^>]*>(.*?)<\/p>/is", $content[0]['value'], $matches);
        $main_text = $matches[1];
      ?>
      <p class="title"><?= $main_text ?></p>
      <div class="content content_text">
        <? preg_match("/<p[^>]*>(.*?)<\/p>/is", $content[1]['value'], $matches);
        $main_text1 = $matches[1];
        ?>
        <p class="left-line"><?=$main_text1?></p>

        <?//на случай добавления новых текстовых блоков
        for ($i = 2; $i < count($content); $i++):?>
          <?
          echo $content[$i]['value'] ?>
        <?endfor; ?>

      </div>


      <?
      break;

    case 'h2_row_blue': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;
        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }

      ?>
      <div class="container">
        <div class="content content_text">
          <h2 class="bottom-line"><?= $content[0]['value']; ?></h2>
          <? preg_match("/<p[^>]*>(.*?)<\/p>/is", $content[1]['value'], $matches);
          $text = $matches[1];
          ?>
          <p class="left-line"><?= $text ?></p>
        </div>
      </div>

      <?
      break;

    case 'my_pic_text': // название сетки
    foreach ($layout['columns'] as $columnIndex => $column) {
      $pos = $this->layoutIndex . ',' . $columnIndex;
      if (isset($this->preparedBlocks[$pos])) {
        $content = $this->preparedBlocks[$pos];
      }
      $content[0]['resize'] = CFile::ResizeImageGet($content[0]['file']["ID"], array('width' => 584, 'height' => 394), BX_RESIZE_IMAGE_EXACT, true)['src'];
    }
    ?>

      <div class="container">
        <div class="content content_img">
          <img src="<?=$content[0]['resize']?>" alt="<?=$content[1]['value']?>">
          <div class="inner">
            <h3><?=$content[1]['value']?></h3>
            <?=$content[2]['value']?>
          </div>
        </div>
      </div>

    <?
    break;

  case 'h3_text_row_left': // название сетки
    foreach ($layout['columns'] as $columnIndex => $column) {
      $pos = $this->layoutIndex . ',' . $columnIndex;

      if (isset($this->preparedBlocks[$pos])) {
        $content = $this->preparedBlocks[$pos];
      }
    }
    ?>

    <div class="container">
      <div class="content content_text">
        <h3><?= $content[0]['value']; ?></h3>
        <? preg_match("/<p[^>]*>(.*?)<\/p>/is", $content[1]['value'], $matches);
        $main_text = $matches[1];
        ?>
        <p class="left-line"><?= $main_text; ?></p>

        <?//на случай добавления новых текстовых блоков
        for ($i = 2; $i < count($content); $i++):?>
          <?
          echo $content[$i]['value'] ?>
        <?endfor; ?>

      </div>
    </div>

    <?
    break;

    case 'h2_text_row_left_gallery': // название сетки
      foreach ($layout['columns'] as $columnIndex => $column) {
        $pos = $this->layoutIndex . ',' . $columnIndex;

        if (isset($this->preparedBlocks[$pos])) {
          $content = $this->preparedBlocks[$pos];
        }
      }
      ?>
      <div class="container">
        <h2 class="about__seventh-screen-title title title_section"><?=$content[0]['value']?></h2>
          <? preg_match("/<p[^>]*>(.*?)<\/p>/is", $content[1]['value'], $matches);
          $main_text = $matches[1];
          ?>
          <p class="text text_left-line"><?= $main_text; ?></p>
      </div>

      <div class="about__seventh-screen-slider-wrap">
        <div class="slider swiper-container container">
          <div class="swiper-wrapper">
            <?foreach ($content[2]['images'] as $item):?>
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
            <div class="slider__button slider__button_prev slider-btn slider-btn_color"></div>
            <div class="slider__button slider__button_next slider-btn slider-btn_color slider-btn_next"></div>
          </div>
        </div>
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

      <div class="container">
        <div class="content content_text">
          <h2 class="about__ninth-screen-title"><?= $content[0]['value']; ?></h2>

          <? preg_match("/<p[^>]*>(.*?)<\/p>/is", $content[1]['value'], $matches);
          $main_text = $matches[1];
          ?>
          <p class="left-line about__ninth-screen-text"><?=$main_text?></p>
          <?//на случай добавления новых текстовых блоков
          for ($i = 2; $i < count($content); $i++):?>
            <?
            echo $content[$i]['value'] ?>
          <?endfor; ?>
        </div>
      </div>

      <?
      break;

    default:
      //echo '<pre>'; print_r('_default'); echo '</pre>';
  } ?>

<? } ?>

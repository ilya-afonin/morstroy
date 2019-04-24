<?foreach ($arResult["BANNERS"] as $banner):?>

  <div class="bq">
    <div class="bq__title"><?=$banner['NAME']?></div>
    <div class="bq__text"><?=$banner["TEXT"]?></div>
  </div>

<?endforeach?>
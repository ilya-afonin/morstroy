<?/** @var $block array */?>
<div class="k-section__title">
    <h2 class="s-title"><?=$block['value']?></h2>
</div>
<?
echo '<pre>'; print_r($block['type']); echo '</pre>';
/*if (!empty($block['anchor'])):?><a name="<?=$block['anchor']?>"></a><?endif;?>
<<?=$block['type']?>><?=$block['value']?></<?=$block['type']?>>


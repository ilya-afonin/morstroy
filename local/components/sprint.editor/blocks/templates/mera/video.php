<?/** @var $block array */?><?

/*
$preview = Sprint\Editor\Blocks\Image::getImage($block['preview'], array(
    'width' => 1024,
    'height' => 768,
    'exact' => 0,
    //'jpg_quality' => 75
));
*/


$tube_val = str_replace('youtu.be','youtube.com/embed',$block['url'],$count_str); // если вставляем с youtube как поделиться
$arTubeId = explode('/',$block['url']);
$tubeId = end($arTubeId);
$block['value_img']["VALUE_IMG"] = 'https://img.youtube.com/vi/'.$tubeId.'/sddefault.jpg';

if($count_str == 0){
    $video = explode('?',$block['url']);
    if($video[1]){
        $tube_video_2 = explode('&',$video[1]);
        foreach($tube_video_2 as $tube_video_2_val){
            if(strpos($tube_video_2_val,'v=') !== false){
                $tubeId = str_replace('v=','',$tube_video_2_val);
                $tube_val = 'http://youtube.com/embed/'.$tubeId; // для ссылки вида http://youtube.com/?v=yrtyrthrdghtgd
            }

            $block['value_img'] = 'https://img.youtube.com/vi/'.$tubeId.'/sddefault.jpg';
            // https://img.youtube.com/vi/uhBHL3v4d3I/sddefault.jpg
        }
    }
}
//if($count_str == 0){
//    $tube_val = $block['url']; // если не то и не то оставляем как есть
//}
$block['url'] = $tube_val;
?>
<div class="k-section">
    <div class="k-section__content">
        <div class="k-section__video">
            <div class="video">
                <a class="video__main video__main--video"
                   href="<?= $block['url']?>" style="background-image:url(<?= /*$block['preview']['file']['SRC']?$block['preview']['file']['SRC']:*/$block['value_img']?>)">
                </a>
            </div>
        </div>
    </div>
</div>
<?php

/**
 * backgroundの画像を表示する場合
 */

// アイキャッチ画像のIDを全て取得
$id = get_post_thumbnail_id();

// 添付された画像ファイルの"url"、"width"、"height"属性を配列として返す関数
// 引数にget_post_thumbnail_id();を格納
$img = wp_get_attachment_image_src($id, 'full');

// 配列の中から[0]で呼び出すサムネイルを指定、echoでurlを呼び出す。
//<div style="background-image: url('<?php echo $img[0]; ?>');">

?>

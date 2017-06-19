<?php

// Composerで印すっと-ル↓ライブラリを一括読み込み
require_once __DIR__ . '/vendor/autoload.php';
// 合成のベースとなるサイズを定義
define('GD_BASE_SIZE', 700);

// 合成のベースになる画像を生成
$destinationImage = imagecreatefrompng('imgs/reversi_board.png');

// パラメーターから現在の石の配置を取得
$stones = json_decode($_REQUEST['stones']);

// 各列をループ
for($i = 0; $i < count($stones); $i++) {
  $row = $stones[$i];
  // 各要素をループ
  for($j = 0; $j < count($row); $j++) {
    // 現在の石を生成
    if($row[$j] == 1) {
      $stoneImage = imagecreatefrompng('imgs/reversi_stone_white.png');
    } else if($row[$j] == 2) {
      $stoneImage = imagecreatefrompng('imgs/reversi_stone_black.png')
    }
    // 合成
    if($row[$j] > 0) {
      imagecopy($destinationImage, $stoneImage, 9 + (int)($j * 87.5), 9 + (int)($i * 87.5), 0, 0, 70, 70);

      // 破棄
      imagedestroy($stoneImage);
    }
  }
}

 ?>

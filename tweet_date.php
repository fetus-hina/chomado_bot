<?php
require_once(__DIR__ . '/twitteroauth/twitteroauth.php'); // OAuth
require_once(__DIR__ . '/class/log.php');       // Log
Log::setErrorHandler();
require_once(__DIR__ . '/class/date.php'); // class Date
require_once(__DIR__ . '/class/config.php'); // class Config

// ファイルの行をランダムに抽出
Log::trace("list.txtを読み込みます。");
$filelist = file(__DIR__ . '/tweet_content_data_list/list.txt');
shuffle($filelist);
Log::trace("list.txtは" . count($filelist) . "行です");

// 呟く文成形
$message = sprintf(
    "%s\n\n%s",
    $filelist[0],
    (new Date())->GetDateMessage() //『今日2015/01/20は第04週目の火曜です。今年の5.2%が経過しました。』
);

// Twitterに接続
$config = Config::getInstance();
$connection = new TwitterOAuth(
    $config->getTwitterConsumerKey(),
    $config->getTwitterConsumerSecret(),
    $config->getTwitterAccessToken(),
    $config->getTwitterAccessTokenSecret()
);

$param = [
    'status' => $message,
];

Log::info("Twitter に tweet を POST します:");
Log::info($param);

// 投稿
// TODO: エラーチェック
$connection->post('statuses/update', $param);
Log::success("Tweet を投稿しました");

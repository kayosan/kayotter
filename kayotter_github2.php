<?php
class kayotter_github2
{
    
 public static function getTweets(){
require_once('TwitterAppOAuth.php');
 
// Consumer Key (API Key) を設定
$consumer_key =  '';
 
// Consumer Secret (API Secret) を設定
$consumer_secret = '';
 
// アプリケーション認証実行
$connection = new TwitterAppOAuth($consumer_key, $consumer_secret);
     
if (isset($_GET['key_word'])) {
    $key_word = $_GET['key_word'];
    $params = array(
    'q' => $key_word 
    );    
}else{
    $params = array(
    'q' => 'FC東京'
    );
}
 
// ツイート検索実行
$tweets_obj = $connection->get('search/tweets',$params);
 
// オブジェクトを配列に変換
$tweets_arr = json_decode($tweets_obj,true);
     return $tweets_arr;

 }
}
?>

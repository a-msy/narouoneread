<?php
echo $ppp= __DIR__."\phpQuery-onefile.php";
// $ncode＝Nコード　$numが話数

function shownovel($ncode,$num){
    $path= __DIR__;
    set_include_path($path);
    //phpQueryを呼び出し
    include($path."\phpQuery-onefile.php");
    //なろうのページを取得
    $ctx = stream_context_create(array(
        'http' => array(
          'method' => 'GET',
          'header' => 'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko')
        )
      );
    $data = file_get_contents('https://ncode.syosetu.com/'.$ncode .'/' .$num,false,$ctx);
    $html = phpQuery::newDocumentHTML($data);
 
    // 記事取得（HTML内のnovel_honbunの部分を抽出）
    $content = $html["#novel_honbun"];
    echo $content->text();
}

shownovel('n4836fm',1);
?>
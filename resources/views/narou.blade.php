@extends('layouts.app')

@section('narou')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body tate mixed" id ="narouhonbun">
<?php
//echo $ppp= resource_path('php/phpQuery-onefile.php');
// $ncode＝Nコード　$numが話数

function shownovel($ncode,$num){
    $path= resource_path('php/phpQuery-onefile.php');
    set_include_path($path);
    //phpQueryを呼び出し
    include($path);
    include(resource_path('php/myfunc.php'));//myfunc読み込む
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
    $str = $content->text();
    $str= str_replace('。', '。</li><li>', $str);
    $str= str_replace('」', '」</li><li>', $str);
    $wrap_word = mb_wordwrap($str, 999999999, '</li><li>', true);//myfuncに記載の関数
    echo $wrap_word;
}
echo '<ul> <li>';
shownovel('n4836fm',2);
echo '</li><li>終わり</li> </ul>';//wordwrapするなら</li><li>終わり</li> </ul>　しないなら
?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
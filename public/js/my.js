$(function() {
    $('#narouhonbun').vTicker({
        speed: 700, //切り替わりの速度（1秒/1000）
        pause: 4000, //止まっている時間（1秒/1000）
        showItems: 1, //表示する行数
        mousePause: true, //マウスオン時の動作
        //height: 0, //親要素の高さを設定（基本的には自動取得します。単位：px）
        animate: true, //アニメーションON/OFF（true/false）
        margin: 0, // 行単位での外余白（単位：px）
        padding: 0 //行単位での内余白（単位：px）
    });
});
<?php
// POSTリクエストの場合のみ処理を実行
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたデータを取得
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $inquiry = $_POST['inquiry'] ?? '';

    // 名前、メールアドレス、お問い合わせ内容のいずれかが空でない場合
    if (!empty($name) && !empty($email) && !empty($inquiry)) {
        // ファイルに書き込むデータを作成
        $data = [$name, $email, $inquiry];
        // inquiries.csvファイルを開く
        $file = 'inquiries.csv';
        // ファイルを書き込みモードで開く
        $fp = fopen($file, 'a');
        // ファイルにデータを書き込む
        fputcsv($fp, $data);
        // ファイルを閉じる
        fclose($fp);

        echo "お問い合わせありがとうございます。";
        echo "<br><a href='read.php'>お問い合わせ一覧を見る</a>";
    } else {
        echo "名前、メールアドレス、お問い合わせ内容のいずれかが空です。";
        echo "<br><a href='index.php'>お問い合わせフォームへ戻る</a>";
    }
} else {
    echo "直接アクセス禁止";
}
?>




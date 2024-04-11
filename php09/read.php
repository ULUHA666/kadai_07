<?php
// inquiries.csvファイルを読み込む関数
function readCSV($filename)
{
    // 配列を初期化
    $data = [];
    // ファイルを読み込みモードで開く
    if (($handle = fopen($filename, "r")) !== false) {
        // ファイルを1行ずつ読み込む（最大1000文字、カンマ区切り、falseになるまで繰り返す）
        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            // 配列に追加
            $data[] = [
                'name' => $row[0],
                'email' => $row[1],
                'inquiry' => $row[2]
            ];
        }
        // ファイルを閉じる
        fclose($handle);
    }
    // 配列を返す
    return $data;
}

// csvファイルが存在しない場合は処理を終了
if (!file_exists('inquiries.csv')) {
    echo "お問い合わせはありません。";
    exit;
}

$data = readCSV('inquiries.csv');

if (empty($data)) {
    echo "お問い合わせはありません。";
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>お問い合わせ一覧</title>
    </head>
    <body>
        <h1>お問い合わせ一覧</h1>
        <table border='1'>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>お問い合わせ内容</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['inquiry'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php">お問い合わせフォームへ</a>

        
    </body>
    </html>
    <?php
}
?>

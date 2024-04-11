<!DOCTYPE html>
<html>
<head>
    <title>お問い合わせフォーム</title>
</head>
<body>
    <h1>お問い合わせフォーム</h1>
    <link rel='stylesheet' href='css/style.css'>

    <!-- お問い合わせフォーム -->
    <form action="write.php" method="post">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="inquiry">お問い合わせ内容:</label><br>
        <textarea id="inquiry" name="inquiry" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="送信">
    </form>

    <hr>

    <!-- お問い合わせ一覧表示へのリンク -->
    <a href="read.php">お問い合わせ一覧を見る</a>
</body>
</html>

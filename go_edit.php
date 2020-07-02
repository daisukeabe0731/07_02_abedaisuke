<?php
// 送信データのチェック
// var_dump($_GET);
// exit();

// 関数ファイルの読み込み
//function_go.phpファイルを読み込む
include('function_go.php');

// idの受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'SELECT * FROM go_table WHERE id=:id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $number, PDO::PARAM_INT);
// $stmt->bindValue(':myname', $myname, PDO::PARAM_INT);
// $stmt->bindValue(':nowtime', $nowtime, PDO::PARAM_INT);
$status = $stmt->execute(); // SQLを実行

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    // データ登録失敗時にエラーを表示
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
    // exit('sqlError:' . $error[2]);
} else {
    // 正常にSQLが実行された場合は指定のレコードを取得
    // 登録ページへ移動
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>出席確認（編集画面）</title>
</head>

<body>
    <form action="go_update.php" method="POST">
        <fieldset>
            <legend>削除するなまえをたっち！</legend>
            <div class="menbox">
                <input class="men" type="submit" value="じろー" name="myname" alt="jiro">>">
                <input class="men" type="submit" value="だいすけ" name="myname" alt="daisuke">
                <input class="men" type="submit" value="あらた" name="myname" alt="arata">
                <input class="men" type="submit" value="けんいち" name="myname" alt="kenichi">
                <input class="men" type="submit" value="ひろし" name="myname" alt="hiroshi">
                <input class="men" type="submit" value="まいける" name="myname" alt="maikeru">
            </div>

            <div class="womenbox">
                <input class="women" type="submit" value="はなこ" name="myname" alt="hanako">
                <input class="women" type="submit" value="しずか" name="myname" alt="shizuka">
                <input class="women" type="submit" value="みゆき" name="myname" alt="miyuki">
                <input class="women" type="submit" value="りえこ" name="myname" alt="rieko">
                <input class="women" type="submit" value="すず" name="myname" alt="suzu">
                <input class="women" type="submit" value="あい" name="myname" alt="ai">
            </div>
        </fieldset>
    </form>

    <div class="link_button">
        <a href="go_read.php">《 出席リストへ 》</a>
    </div>

    <!-- 追加 -->
    <input type="hidden" name="id" value="<?= $record["id"] ?>">

</body>

</html>
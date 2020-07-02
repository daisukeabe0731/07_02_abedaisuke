<?php

//function_go.phpファイルを読み込む
include('function_go.php');

// DB接続の設定
// DB名は`gsacf_x00_00`にする
// $dbn = 'mysql:dbname=gsacf_d06_02;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   // ここでDB接続処理を実行する
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit('dbError:' . $e->getMessage());
// }

$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM go_table';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>出席確認</title>
</head>

<body>

    <div>
    <?
    // $ohayo = 'SELECT * FROM go_table ORDER BY myname DESC';
    // echo $ohayo;

    // $outputname = $record["myname"];
    // $output = $record["myname"];
    // $ohayo = $record['myname'].'さん'.'<br/>'.'おはようございます';
    // echo $output;
    ?>
    </div>

    <p class="ohayo">おはようございます</p>
    

    <div class="link_button">
        <a href="go_input.php">《 タッチ画面へ 》</a>
    </div>
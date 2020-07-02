<?php

// 送信データのチェック
// var_dump($_POST);
// exit();

// 関数ファイルの読み込み
//functions.phpファイルを読み込む
include('function_go.php');

// 送信データ受け取り
$number = $_POST['id'];
$myname = $_POST['myname'];
$nowtime = $_POST['nowtime'];

// DB接続
$pdo = connect_to_db();

// UPDATE文を作成&実行
$sql = "UPDATE go_table SET id=:id, myname=:myname, nowtime=:nowtime WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $todo, PDO::PARAM_INT);
$stmt->bindValue(':myname', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':nowtime', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
    header("Location:go_read.php");
    exit();
}

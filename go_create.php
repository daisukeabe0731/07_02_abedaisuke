<?php

//function_go.phpファイルを読み込む
include('function_go.php');

// 送信確認
// var_dump($_POST);
// exit();

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
// if (
//   !isset($_POST['myname']) || $_POST['myname'] == '' ||
//   !isset($_POST['nowtime']) || $_POST['nowtime'] == ''
// ) {
//   exit('ParamError');
// }
// 解説
// 「ParamError」が表示されたら，必須データが送られていないことがわかる


// 受け取ったデータを変数に入れる
$number = $_POST['id'];
$myname = $_POST['myname'];
$nowtime = $_POST['nowtime'];


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
//   exit();
// }

$pdo = connect_to_db();

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO go_table(id, myname, nowtime) VALUES(:id, :myname, :nowtime)';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $number, PDO::PARAM_STR);
$stmt->bindValue(':myname', $myname, PDO::PARAM_STR);
$stmt->bindValue(':nowtime', $nowtime, PDO::PARAM_STR);
$status = $stmt->execute(); // SQLを実行

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
  // データ登録失敗時にエラーを表示
  // exit('sqlError:' . $error[2]);

} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // 登録ページへ移動
  header('Location:go_ohayo.php');
  exit();
}


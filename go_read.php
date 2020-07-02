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

// データ登録処理後
$view = '';
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";

  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["id"]}</td>";
    $output .= "<td>{$record["myname"]}</td>";
    $output .= "<td>{$record["nowtime"]}</td>";
    // edit deleteリンクを追加
    // $output .= "<td><a href = 'go_edit.php?id={$record["id"]}'>edit</a></td>";
    $output .= "<td><a href = 'go_delete.php?id={$record["id"]}'>delete</a></td>";

    $output .= "</tr>";
  }
  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($record);
}

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


  <div class="link_button">
    <a href="go_input.php">《 タッチ画面へ 》</a>
  </div>

  <fieldset>
    <!-- <legend>おはようございます</legend> -->
    <table>
      <thead>
        <tr>
          <th>NO.</th>
          <th>園児名</th>
          <th>登園時間</th>
        </tr>
      </thead>
      <tbody>

        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>
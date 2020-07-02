<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>出席確認</title>
</head>

<body>
  <form action="go_create.php" method="POST">
    <fieldset>
      <legend>じぶんのなまえをたっち！</legend>
      <div class="menbox">
        <input class="men" type="submit" value="じろう" name="myname" alt="jiro">
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


</body>

</html>
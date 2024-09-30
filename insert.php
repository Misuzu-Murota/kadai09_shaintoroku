<!-- 社員番号登録 -->
<?php

//1. POSTデータ取得
//[shainno,name,gender,age,busho,position,year]
$shainno = $_POST["shainno"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$busho = $_POST["busho"];
$position = $_POST["position"];
$year = $_POST["year"];
// var_dump($year);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// 関数用のファイルを使用できるように呼び出す
require_once('funcs.php');

echo "funcs.php loaded!<br>";

$pdo = db_conn();
if (!$pdo) {
  exit("Database connection failed.");
}

//３．データ登録SQL作成
$sql = "INSERT INTO allmembers(shainno,name,gender,age,busho,position,year,indate)VALUES(:shainno,:name,:gender,:age,:busho,:position,:year,sysdate());";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':shainno', $shainno,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name',   $name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':gender',  $gender,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age',    $age,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':busho',  $busho,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':position', $position,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':year', $year,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //True or False

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit();
}
?>

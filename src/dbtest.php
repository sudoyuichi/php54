<?php
// MySQL接続情報
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$dbname = 'testdb';

// MySQLに接続
$link = mysql_connect($host, $user, $pass);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully to MySQL';

// データベースを選択
$db_selected = mysql_select_db($dbname, $link);

if (!$db_selected) {
    die('Could not select database: ' . mysql_error());
}
echo 'Database selected successfully';

// 接続を閉じる
mysql_close($link);
?>

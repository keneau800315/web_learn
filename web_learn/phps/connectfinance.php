<?php 
	$dsn = "mysql:host=localhost;port=3306;dbname=finance;charset=utf8";
	$user = "root";
	$password = "root";
	//https://www.php.net/manual/en/pdo.constants.php
    //PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 抓取錯誤訊息，PDO執行query錯誤時也丟出例外
    //設定PDO::ATTR_ERRMODE錯誤報告，屬性為PDO::ERRMODE_EXCEPTION
	$options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    //new 一個PDO物件讓我們可以跟資料庫做連結
	$pdo = new PDO($dsn, $user, $password, $options);
?>
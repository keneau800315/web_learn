<?php
try{
  require_once("connectfinance.php");

  $sql = "select * from `member` where memName=:memName";
  $member = $pdo->prepare($sql);
  $member->bindValue(":memName", $_GET["memName"]);
  $member->execute();

  if( $member->rowCount() !=0){ //此帳號已存在, 不可用
    echo "名稱已存在";
  }else{ //此帳號可使用
    echo "名稱ok!!";
  } 
}catch(PDOException $e){
  echo "error";
}
?>    
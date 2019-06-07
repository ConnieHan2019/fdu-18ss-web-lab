<?php
$connString = "mysql:host=localhost;dbname=travel";
$username = "root";
$password = "conniehan2019";

try{
$pdo = new PDO($connString, $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "链接成功<br/>";
//try{
// $sqlofCon="SELECT * FROM continents";
////  $result=$pdo->query($sqlofCon);
        //while($row = $result->fetch(PDO::FETCH_ASSOC)) {
           //  echo $row['ContinentCode'] . '>' . $row['ContinentName'];
           //   }
             ////   $pdo=null;
//   }catch (PDOException $e){
 //  echo"nnope";
  //  die($e->getMessage());
 //  }
 }catch(PDOException $e){
echo "没有链接成功";
 die($e -> getMessage());
 }


 ?>

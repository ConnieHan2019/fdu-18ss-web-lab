<?php
//$host = "localhost";
//$database = "travel";
//$username = "root";
//$password = "conniehan2019";

// 创建连接
//$conn = mysqli_connect($host,$username,$password,$database);
// 检测连接
//if ($conn->connect_error) {
  //  die("连接失败: " . $conn->connect_error);
//}

//$sql = "SELECT Title, Description, ContinentCode, Path FROM imagedetails";
//$result = $conn ->query($sql);
//if ($result->num_rows > 0) {
    // 输出数据
   // while($row = $result->fetch_assoc()) {
        //echo "Title: " . $row["Title"]. " - Description: " . $row["Description"]. " -Path" . $row["Path"]. "<br>";
    //}
//} else {
  //  echo "0 结果";
//}
//$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
                <?php
                 try{
                      include 'connect.php';
                     $sqlofCon="SELECT * FROM continents";
                     $result=$pdo->query($sqlofCon);
                      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                      echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                       }
                       $pdo=null;
                        }catch (PDOException $e){
                         die($e->getMessage());
                  }
                  ?>

              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                 <?php
                 try{
                      include 'connect.php';
                     $sqlofCon="SELECT * FROM countries";
                     $result=$pdo->query($sqlofCon);
                      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                     echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                       }
                       $pdo=null;
                        }catch (PDOException $e){
                         die($e->getMessage());
                  }
                  ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
		/**从最小范围开始筛选

		*/
            <?php 
             try{
                            include ("connect.php");
                            if(isset($_GET["country"])){
                                if($_GET["country"]!=0){
                                    $ISO=$_GET["country"];
                                    $sql="select * from imagedetails where CountryCodeISO='$ISO'";
                                    $result=$pdo->query($sql);
                                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<li>
                          <a href="detail.php?id=' . $row['ImageID'] . '" class="img-responsive">
                            <img src="images/square-medium/' . $row['Path'] . '" alt="'.$row['Title'].'">
                            <div class="caption">
                              <div class="blur"></div>
                              <div class="caption-text">
                                <p>'.$row['Description'].'</p>
                              </div>
                            </div>
                          </a>
                        </li>';}
                                }
                                else{
                                    $ContinentCode = $_GET["continent"];
                                    $sql = "select * from imagedetails where ContinentCode='$ContinentCode'";
                                    $result = $pdo->query($sql);
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<li>
                          <a href="detail.php?id=' . $row['ImageID'] . '" class="img-responsive">
                            <img src="images/square-medium/' . $row['Path'] . '" alt="' . $row['Title'] . '">
                            <div class="caption">
                              <div class="blur"></div>
                              <div class="caption-text">
                                <p>' . $row['Description'] . '</p>
                              </div>
                            </div>
                          </a>
                        </li>';}}
                            } else{
                                $sql = "select * from imagedetails";
                                $result = $pdo->query($sql);
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<li>
                          <a href="detail.php?id=' . $row['ImageID'] . '" class="img-responsive">
                            <img src="images/square-medium/' . $row['Path'] . '" alt="' . $row['Title'] . '">
                            <div class="caption">
                              <div class="blur"></div>
                              <div class="caption-text">
                                <p>' . $row['Description'] . '</p>
                              </div>
                            </div>
                          </a>
                        </li>';
                                }
                            }
                            $pdo=null;
                        }catch (PDOException $e){
                            die($e->getMessage());
                        }

            ?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
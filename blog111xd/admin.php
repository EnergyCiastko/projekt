<?php
  function dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName)
  {
  $connect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);

  if (!$connect) {
      die("blad");
  }
  return $connect;
  }
  $dbHost = "localhost";
  $dbUserName = "root";
  $dbUserPassword = "root";
  $dbName="Blog";
  
  $dbConnect = dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName);

  $sql="SELECT idPosts,postDate,postTitle FROM Posts";
  $dbQuery=mysqli_query($dbConnect, $sql);


?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Admin</title>
</head>
<body>
  <?php while($row=mysqli_fetch_assoc($dbQuery)){?>
  <article>
    <?php echo $row['postDate']?>
    <?php echo $row['postTitle']?>
  
    <a href="admin.php?postid=<?php echo $row['idPosts'];?>">Usuń</a>
    <br><br>
  </article>
   <form method="get">
  <input type="text" name="date"> DATE
  <br>
  <input type="text" name="title"> TITLE
  <br>
  <input type="text" name="intro"> INTRO
  <br>  
  <input type="text" name="readmore"> READMORE
  <br>
  <input type="submit">
  </form> 
  <?}?>
</body>
</html>
<?php
     if(isset($_GET['postid'])){
      $postNumber=$_GET['postid'];
      $sql="DELETE FROM Posts WHERE idPosts= $postNumber";
      $dbQuery=mysqli_query($dbConnect, $sql);
    }
    
?>

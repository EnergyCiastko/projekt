<?php

function dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName)
{
  // Create connection
  $connect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);

  // Check connection
  if (!$connect) 
  {
      die("blad");
  }

  return $connect;
}

$dbHost = "localhost";
$dbUserName = "root";
$dbUserPassword = "root";
$dbName = "Blog";

$dbConnect = dbConnector($dbHost,$dbUserName,$dbUserPassword,$dbName);
$sql = "SELECT idPosts, postDate, postAuthor, postTitle, postIntro FROM Posts";
$dbQuery = mysqli_query($dbConnect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>


<article>
  <header>
    <p>DODAJ POST</p>
  </header>

  <form method="GET">
  Tytuł (max 240 znaków): <br>
  <input type="text" name="postTitle" size=150,> <br>
  WSTĘP DO POSTA(max 240 znaków): <br>
  <input type="text" name="postIntro" size=150> <br>
  TEKST POSTA: <br>
  <input type="text" name="postReadMore" size=150> <br>
  AUTOR POSTA(wpisz 1): <br>
  <input type="text" name="postAuthor"> <br>
  DATA POSTA: <br>
  <input type='date' value='<?php echo date('Y-m-d');?>' name="postDate"> <br>
  <input type="submit" value="Dodaj">
  </form>
  <br><br>
</article>

<form action="index.php" method="post">
<input type="submit" name="POWRÓT" value="WRÓĆ" /><br /><br />
</form>
<?php 

if(isset($_GET['postIntro'])){

  $postTitle = $_GET['postTitle'];
  $postIntro = $_GET['postIntro'];
  $postReadMore = $_GET['postReadMore'];
  $postAuthor = $_GET['postAuthor'];
  $postDate = $_GET['postDate'];

// Dodawanie posta
  $sqlDodawanie = "INSERT INTO Posts values (null,'$postDate','$postIntro','$postReadMore','$postAuthor','$postTitle')";
  $dbQuery2=mysqli_query($dbConnect, $sqlDodawanie);
  header("Location: admin.php"); 
}


?>

</body>
</html>
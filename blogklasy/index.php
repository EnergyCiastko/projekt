<?php

class blog
{
  private $dbConn;
  //Konstruktor
  function __construct($serverName,$userName,$password,$dbName)
  {
    // Create connection
    $this->dbConn = mysqli_connect($serverName, $userName, $password,$dbName);
    
    // Check connection
    if (!$this->dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
  }


function dodaj($postDate,$postIntro,$postReadMore,$postAuthor,$postTitle){
$sql = "INSERT INTO Posts(postDate,postIntro,,postReadMore,postAuthor,postTitle) VALUES ( '$postDate','$postIntro','$postReadMore','$postAuthor,'$postTitle')";
mysqli_query($this->dbConn, $sql);


//$this -> sqlDodaj = "INSERT INTO Posts values (null, '$postDate','$postIntro','$postReadMore','$postAuthor,'$postTitle')";
//$dbQuery=mysqli_query($this -> dbConn ,$this -> sqlDodaj);
}

  function usun($idPosts)
  {
    $sql ="DELETE FROM Posts WHERE idPosts=$idPosts";
    mysqli_query($this->dbConn, $sql);
    
  }

  function edytuj($idPosts,$postDate,$postIntro,$postReadMore,$postAuthor,$postTitle)
  {
    $Edytuj = "UPDATE Posts SET postDate=$postDate,postIntro=$postIntro,postReadMore=$postReadMore,postAuthor=$postAuthor,postTitle=$postTitle WHERE idPosts=$idPosts";
  }
}

$blogTomka= new blog('localhost','root','root','Blog');
$action = $_GET['action'];

switch ($action){
  case 'usun' :
  $blogTomka->usun(2);
  break;
}

//$blogTomka= new blog('localhost','root','root','Blog1');
//$blogTomka= dodaj('2001-12-12','intro','readmore',2,'title'); //Jeśli mamy konstruktora w klasie to podajemy parametry odrazu przy tworzeniu obiektu


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
  <a href="index.php?action=usun&id=2">usun</a>
</body>
</html>
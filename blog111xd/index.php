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

if(!isset($_GET['idpost'])){
 $sql="SELECT idPosts,postDate,postIntro,postAuthor,postTitle,postIntro FROM Posts";
 $dbQuery=mysqli_query($dbConnect, $sql);

 include('blog.php');
}
if(isset($_GET['idpost'])){

  $postNumber=$_GET['idpost'];
 $sql="SELECT idPosts,postDate,postIntro,postAuthor,postTitle,postIntro,postReadMore FROM Posts WHERE idPosts= $postNumber";
 $dbQuery=mysqli_query($dbConnect, $sql);

 include('post.php');
}

?>
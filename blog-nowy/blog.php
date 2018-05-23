<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Blog</title>
</head>
<body>
  <h1>BLOG</h1>
  
  <form action="usuwanie.php" method="post">

<input type="submit" name="USUWANIE POSTÓW" value="USUWANIE POSTÓW " /><br /><br />
</form>


<form action="admin.php" method="post">
<input type="submit" name="DODAWANIE POSTÓW" value="DODAWANIE POSTÓW" /><br /><br />
</form>
<?php 


//wypisywanie wszystkich wpisów bloga
while($row = mysqli_fetch_assoc($dbQuery)){ ?>

  <article>
    <header>
      <span><?php echo $row['postDate'] ?></span>
      <h2><?php echo $row['postTitle'] ?></h2>
    </header>
  
      <p><?php echo $row['postIntro'] ?></p>

    <footer>
    <!--link do postu -->
      <a href="index.php?idPost=<?php echo $row['idPosts']; ?>">czytaj więcej</a>
    </footer>
    <hr>
  </article> 

<?php } ?>
  
</body>
</html>
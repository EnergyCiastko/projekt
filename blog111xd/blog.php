<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog</title>
</head>
<body>
  <h1>pisssda :'(</h1>

  <?php while($row=mysqli_fetch_assoc($dbQuery)){?>

  <article>
    <header>
      <span><?php echo $row['postDate']?></span>
      <h2><?php echo $row['postTitle']?></h2>
    </header>

      <p><?php echo $row['postIntro']?></p>

    <footer>
      <a href="index.php?idPosts= <?php echo $row['idPosts'];?>">Readmore</a>
    </footer>

    <hr>
  </article>

  <?php } ?>

</body>
</html>
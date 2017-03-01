<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/Envision.css">
  </head>

  <body>
    <div id="wrap">
  <header>
    <h1><a href="/">Mon super site</a></h1>
    <p>Comment ça, il n'y a presque rien ?</p>
  </header>

  <nav>
    <ul>
      <li><a href="/">Accueil</a></li>
      <?php if ($user->isAuthenticated()) { ?>
      <li><a href="/admin/">Admin</a></li>
      <li><a href="/admin/news-insert.html">Ajouter une news</a></li>
      <?php } ?>
    </ul>
  </nav>

  <div id="content-wrap">
    <section id="main">
      <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

      <?= $content ?>
    </section>
  </div>

  <footer></footer>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>

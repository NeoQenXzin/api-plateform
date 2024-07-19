<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application PHP personnalisée</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
  </head>
  <body>
    <header class="container">
        <h1>Bienvenue sur notre application PHP personnalisée</h1>
    </header>
    <main class="container">
      <h2><?php echo "Version de PHP : " . phpversion(); ?></h2>
      <p>Cette application a été créée à partir d'une image Docker personnalisée.</p>
    </main>
    <footer class="container">
      <p>Développé par <?php echo getenv('DEVELOPED_BY') ?></p>
    </footer>
  </body>
</html>
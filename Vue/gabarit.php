<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Blog MVC</title>
    <link rel="stylesheet" href="<?php echo rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); ?>/Contenu/style.css">
</head>
<body>
    <header>
        <h1><a href="index.php">Mon Blog </a></h1>
        <nav>
            <a href="index.php">Accueil</a>
        </nav>
    </header>

    <main>
        <?php echo $contenu; ?>
    </main>

    <footer>
        <p>Blog réalisé par Aldrix Tech</p>
    </footer>
</body>
</html>
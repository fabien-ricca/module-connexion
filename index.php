<?php include 'include/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/f18b510552.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sahitya:wght@700&family=Trirong:wght@600&family=Trykker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <header><?php include 'include/header.php' ?></header>

    <main class="flex-row">

    <?php if(!isset($_SESSION['login'])){ ?>
        <h1>Welcome</h1>

    <?php } else{?>
        <h1><?php echo 'Un plaisir de vous revoir ' . $_SESSION['login'] ?></h1>
    <?php } ?>

        
    </main>

    <footer><?php include 'include/footer.php' ?></footer>
</body>
</html>
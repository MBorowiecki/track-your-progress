<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('public/components/styles.php'); ?>
    <?php include_once('public/components/fonts.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Progress - Dashboard</title>
</head>
<body>
    <?php include_once('public/components/header.php'); ?>

    <main class="center-content">
        <?php
            $user = unserialize($_SESSION['user']);

            echo "<h1 class='font-size_xl color_white mb-4'>Welcome, {$user->getEmail()}!</h1>";
        ?>
    </main>
</body>
</html>
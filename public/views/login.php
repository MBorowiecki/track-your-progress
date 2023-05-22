<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="public/src/css/main.css">
    <link rel="stylesheet" href="public/src/css/header.css">
    <link rel="stylesheet" href="public/src/css/inputs.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Track Your Progress - Login</title>
</head>
<body>
    <header class="header">
        <img src="public/assets/logo.svg" alt="logo" class="header_logo">
    </header>

    <main class="center-content">
        <form class="login-form" action="login" method="POST">
            <div class="login__messages">
                <?php
                    if(isset($messages)) {
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </div>

            <div class="row">
                <div class="input__container">
                    <label class="input__label" for="email-input">E-mail</label>
                    <input class="input" type="text" placeholder="example@example.com" name="email">
                </div>
            </div>

            <div class="row">
                <div class="input__container">
                    <label class="input__label" for="email-input">Password</label>
                    <input class="input" type="password" placeholder="********" name="password">
                </div>
            </div>

            <div class="row">
                <button type="submit" class="button button--primary">Login</button>
            </div>
        </form>
    </main>
</body>
</html>
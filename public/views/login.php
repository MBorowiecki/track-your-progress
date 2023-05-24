<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('public/components/styles.php'); ?>
    <?php include_once('public/components/fonts.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Progress - Login</title>
</head>
<body>
    <?php include_once('public/components/header.php'); ?>

    <main class="center-content">
        <form class="login-form column_hcenter" action="login" method="POST">
            <?php
                if(isset($messages)) {
                echo "<div class='login-form__messages mb-4'>";
                    foreach($messages as $message) {
                        echo "<span class='login-form__message'>$message</span>";
                    }
                    echo "</div>";
                }
            ?>

            <div class="row mb-2">
                <div class="input__container">
                    <label class="input__label" for="email-input">E-mail</label>
                    <input class="input" type="text" placeholder="example@example.com" name="email">
                </div>
            </div>

            <div class="row mb-2">
                <div class="input__container">
                    <label class="input__label" for="email-input">Password</label>
                    <input class="input" type="password" placeholder="********" name="password">
                </div>
            </div>

            <div class="row row_hcenter mb-2">
                <button type="submit" class="button_primary full_width">Login</button>
            </div>

            <div class="row row_hcenter">
                <span class="font-size_s color_white">Don't have an account? <a href="register" class="font-size_s color_primary link">Register</a></span>
            </div>
        </form>
    </main>
</body>
</html>
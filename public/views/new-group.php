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
        <form class="column_hcenter form" action="create-group" method="POST">
            <?php
                if(isset($messages)) {
                echo "<div class='login-form__messages mb-4'>";
                    foreach($messages as $message) {
                        echo "<span class='login-form__message'>$message</span>";
                    }
                    echo "</div>";
                }
            ?>

            <div class="row mb-2 full_width">
                <div class="input__container full_width">
                    <label class="input__label" for="name">Group name</label>
                    <input class="input" type="text" placeholder="Example Excersise Group" name="name">
                </div>
            </div>

            <div class="row row_hcenter mb-2">
                <button type="submit" class="button_primary full_width">CREATE GROUP</button>
            </div>
        </form>
    </main>
</body>
</html>
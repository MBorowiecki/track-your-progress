<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('public/components/styles.php'); ?>
    <?php include_once('public/components/fonts.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Progress - New Excersise</title>
</head>
<body>
    <?php include_once('public/components/header.php'); ?>

    <main class="center-content form">
        <form class="column_hcenter form" action="add-excersise?id=<?php echo $_GET['id'] ?>" method="POST">
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
                    <label class="input__label" for="name">Excersise name</label>
                    <input class="input" type="text" placeholder="Example excersise name" name="name">
                </div>
            </div>

            <div class="row mb-2 full_width">
                <div class="input__container full_width">
                    <label class="input__label" for="date">Date</label>
                    <input class="input" type="date" name="date">
                </div>
            </div>

            <div class="row mb-2 full_width">
                <div class="input__container full_width">
                    <label class="input__label" for="weight">Weight</label>
                    <input class="input" type="number" placeholder="30 kg" name="weight">
                </div>
            </div>

            <div class="row mb-2 full_width">
                <div class="input__container full_width">
                    <label class="input__label" for="reps">Reps</label>
                    <input class="input" type="number" placeholder="8" name="reps">
                </div>
            </div>

            <div class="row mb-2 full_width">
                <div class="input__container full_width">
                    <label class="input__label" for="sets">Sets</label>
                    <input class="input" type="number" placeholder="3" name="sets">
                </div>
            </div>

            <div class="row row_hcenter mb-2 full_width">
                <button type="submit" class="button_primary full_width">Add excersise</button>
            </div>
        </form>
    </main>
</body>
</html>
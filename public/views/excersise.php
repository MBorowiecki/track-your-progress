<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('public/components/styles.php'); ?>
    <?php include_once('public/components/fonts.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Progress - Excersise</title>
</head>
<body>
    <?php include_once('public/components/header.php'); ?>

    <main class="center-content ml-4 mr-4">
        <div class="row">
            <h2 class="font-size_36 color_white"><?php if(isset($excersiseGroup)) echo $excersiseGroup->getName(); ?></h2>
        </div>

        <?php
        if(isset($excersises)) {
            foreach($excersises as $excersise) {
                $date = new DateTime($excersise->getDate());

                echo "<div class='row full_width row_hcenter'>";
                    echo "<div class='card'>";
                        echo "<div class='card__header row row_vcenter'>";
                            echo "<h3 class='font-size_24 color_white row_grow'>{$excersise->getName()}</h3>";
                            echo "<p class='font-size_18 color_white mr-1'>{$date->format('Y-m-d')}</p>";
                            echo "<a class='button_outline' href='delete-excersise?id={$excersise->getId()}&group_id={$excersise->getGroupId()}'><img src='public/assets/trash.svg'></a>";
                        echo "</div>";

                        echo "<div class='card__body'>";
                            echo "<p class='font-size_18 color_white mr-1'><b>{$excersise->getReps()}</b> reps</p>";
                            echo "<p class='font-size_18 color_white mr-1'><b>{$excersise->getSets()}</b> sets</p>";
                            echo "<p class='font-size_18 color_white mr-1'><b>{$excersise->getWeight()}</b> kg</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        }

        ?>
    </main>
</body>
</html>
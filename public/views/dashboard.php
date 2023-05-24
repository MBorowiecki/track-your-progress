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
        <div class="dashboard">
        <?php
            if(isset($excersiseGroups) && count($excersiseGroups) > 0) {
                foreach($excersiseGroups as $excersiseGroup) {
                    $excersises = [];

                    if(isset($latestExcersises)) {
                        foreach($latestExcersises as $latestExcersise) {
                            if($latestExcersise == null) continue;
                            foreach($latestExcersise as $excersise) {
                                if($excersise->getGroupId() == $excersiseGroup->getId()) {
                                    $excersises[] = $excersise;
                                }
                            }
                        }
                    }

                    echo "<div class='dashboard__item'>";
                    echo "<div class='dashboard__header row row_vcenter'>";
                    echo "<a class='link_clean row_grow' href='excersise?id={$excersiseGroup->getId()}'><p class='title'>{$excersiseGroup->getName()}</p></a>";
                    echo "<a class='button_outline' href='delete-group?id={$excersiseGroup->getId()}'><img src='public/assets/trash.svg'></a>";
                    echo "</div>";
                    echo "<div class='dashboard__item__excersises'>";

                    $i = 1;

                    foreach($excersises as $excersise) {
                        $date = new DateTime($excersise->getDate());
                        
                        echo "<div class='dashboard__item__excersise'>";
                        echo "<span class='mr-1'>$i.</span>";
                        echo "<span>{$excersise->getName()} - </span>";
                        echo "<span class='mr-1'>{$date->format('Y-m-d')}</span>";
                        echo "<span class='mr-1'>{$excersise->getReps()} reps</span>";
                        echo "<span class='mr-1'>{$excersise->getSets()} sets</span>";
                        echo "<span class='mr-1'>{$excersise->getWeight()} kg</span>";
                        echo "</div>";

                        $i++;
                    }

                    if(count($excersises) == 0) echo "<span class='font-size_m color_white'>No excersises yet</span>";

                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='align_center'>";
                    echo "<img src='public/assets/chill.svg' class='full_image'>";
                    echo "<h2 class='font-size_36 color_white'>No Excersise Group here.<br />Did you forget to create one?</h2>";
                echo "</div>";
            }
        ?>
        </div>
    </main>
</body>
</html>
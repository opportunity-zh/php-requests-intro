<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if($siteTitle){
            echo "<title>" . $siteTitle . "</title>";
        } else {
            echo "<title>PHP Request Intro</title>";
        }
    ?>
    <link rel="stylesheet" href="./src/css/styles.css">
</head>
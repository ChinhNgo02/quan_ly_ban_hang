<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    #tong {
        width: 100%;
        height: 1000px;
        /* background: black; */
    }

    #tren {
        width: 100%;
        height: 10%;
        background: yellow;
        padding-top: 10px;
    }

    #giua {
        width: 100%;
        height: 80%;
        /* background: yellow; */
    }

    #duoi {
        width: 100%;
        height: 10%;
        background: pink;
    }
    </style>

</head>

<body>
    <div id="tong">
        <?php include 'menu.php'; ?>
        <?php include 'id.php'; ?>
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>
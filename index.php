<?php
    session_start();
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
        <?php include 'products.php'; ?>
        <?php include 'footer.php'; ?>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(".btn-add-to-cart").click(function() {
            let id = $(this).data("id");
            $.ajax({
                    type: "GET",
                    url: "add_to_cart.php",
                    data: {
                        id
                    },
                    // dataType: "dataType",
                })
                .done(function(response) {
                    if ((response == 1)) {
                        // alert("Thanh cong");
                    } else {
                        alert(response);
                    }
                })

        });
        $("#btn-signup").click(function() {

        });
    });
    </script>
</body>

</html>
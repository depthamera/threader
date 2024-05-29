<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["member_id"])) {
        unset($_SESSION["member_id"]);
    }
    if (isset($_SESSION["permission"])) {
        unset($_SESSION["permission"]);
    }
    if (isset($_SESSION["member_name"])) {
        unset($_SESSION["member_name"]);
    }
    ?>

    <script>
        location.replace('../main/main.php');
    </script>
</body>

</html>
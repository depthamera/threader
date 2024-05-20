<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function draw_thread($thread)
    {
        $title = $thread["title"];
        echo ("$title <br>");
    }
    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT * FROM `thread` ORDER BY `comment_id_end`";
    $result = mysqli_query($con, $sql);

    const ROW_MAX = 10;
    if (mysqli_num_rows($result) > 0) {
        $page = (isset($_GET["page"]) ? $_GET["page"] : 1);
        $offset = ROW_MAX * ($page - 1);
        mysqli_data_seek($result, $offset);

        for ($end = $offset + ROW_MAX; $end != $offset && $row = mysqli_fetch_array($result); $offset++) {
            draw_thread($row);
        }
    }
    ?>
</body>

</html>
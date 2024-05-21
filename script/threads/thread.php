<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function draw_comment($comment)
    {
        $title = $comment["title"];
        $comment = $comment["comment"];
        echo ("$title | $comment <br>");
    }
    $thread_id = $_GET["thread_id"];

    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT * FROM `comment` WHERE `thread_id` = $thread_id ORDER BY `comment_id`";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        draw_comment($row);
    }
    ?>


</body>

</html>
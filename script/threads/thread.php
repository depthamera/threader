<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../header/header.php" ?>
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

    <h3>코멘트 등록하기</h3>
    <form action="comment_submit.php" method="post" name="comment_form">
        <input type="hidden" name="thread_id" value=<?= $thread_id ?>>
        <input type="text" name="title" id="title" placeholder="제목"><br>
        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="내용"></textarea>
        <button type="sumbit">게시</button>
    </form>

</body>

</html>
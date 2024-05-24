<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../header/header.php" ?>

    <style>
        table,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    function draw_comment($row)
    {
        $comment_id = $row["thread_inner_id"];
        $title = $row["title"];
        $comment = $row["comment"];
        $author = ($row["author_type"] == "anonymous") ? "익명" : $row["author_id"]; ?>


        <tr>
            <td><?= $comment_id ?></td>
            <td><?= $author ?></td>
            <td><?= $title ?></td>
            <td><?= $comment ?></td>
        </tr>
    <?php
    }
    $thread_id = $_GET["thread_id"];

    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT * FROM `comment` WHERE `thread_id` = $thread_id ORDER BY `comment_id`";
    $result = mysqli_query($con, $sql);

    echo "<table>";
    echo "<tr><td>코멘트 번호</td><td>작성자</td><td>제목</td><td>내용</td></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        draw_comment($row);
    }
    echo "</table>";
    ?>

    <h3>코멘트 등록하기</h3>
    <form action="comment_submit.php" method="post" name="comment_form">
        <input type="hidden" name="thread_id" value=<?= $thread_id ?>>
        <input type="text" name="title" id="title" placeholder="제목">
        <?php if (isset($_SESSION["member_id"])) { ?>
            <input type="checkbox" name="is_anonymous" id="anonymous" value="yep">
            <label for="anonymous">익명</label>
        <?php } ?>
        <br>
        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="내용"></textarea>
        <button type="sumbit">게시</button>
    </form>

</body>

</html>
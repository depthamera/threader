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
    //코멘트 출력 함수
    function draw_comment($row)
    {
        $thread_id = $row["thread_id"];
        $comment = $row["comment"];
        echo ("<a href=thread.php?thread_id=$thread_id>$thread_id| $comment</a><br>");
    }
    $keyword = $_GET["keyword"];
    $page = $_GET["page"];

    // 제목 또는 코멘트에 검색어가 포함된 코멘트를 검색
    $sql = "SELECT * 
            FROM `comment` 
            WHERE `title` LIKE '%$keyword%' OR `comment` LIKE '%$keyword%'
            ORDER BY `comment_id` DESC";
    $result = mysqli_query($con, $sql);

    // 페이지 계산, 출력
    const ROW_MAX = 10;
    $offset = ($page - 1) * ROW_MAX;
    mysqli_data_seek($result, $offset);
    for ($end = $offset + ROW_MAX; ($row = mysqli_fetch_assoc($result)) && $offset < $end; $offset++) {
        draw_comment($row);
    }

    //페이지 이동 버튼 출력
    ?>
</body>

</html>
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

    //단일 스레드 출력 함수
    function draw_thread($row)
    {
        $thread_id = $row["thread_id"];
        $title = $row["title"];
        $comment = $row["comment"];


        echo ("<a href=thread.php?thread_id=$thread_id>
                $thread_id | $title - $comment
            </a><br>");
    }

    //최근에 업데이트된 스레드부터 내림차순으로 정렬
    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT c1.thread_id, c1.title, c1.comment
            FROM (
                SELECT *, 
                    ROW_NUMBER() OVER(PARTITION BY thread_id ORDER BY comment_id) idx
                FROM comment) c1
            JOIN (
                SELECT DISTINCT thread_id, 
                    MAX(comment_id) OVER(PARTITION BY thread_id) last_id
                FROM comment) c2
            ON c1.thread_id = c2.thread_id
            WHERE c1.idx = 1
            ORDER BY c2.last_id DESC;";

    $result = mysqli_query($con, $sql);

    //한 페이지에 표시될 최대 스레드
    const ROW_MAX = 10;

    //스레드 출력
    if (mysqli_num_rows($result) > 0) {
        $page = $_GET["page"];
        $offset = ROW_MAX * ($page - 1);
        mysqli_data_seek($result, $offset);

        for ($end = $offset + ROW_MAX; $end != $offset && $row = mysqli_fetch_array($result); $offset++) {
            draw_thread($row);
        }
    }
    ?>


    <h3>새로운 스레드 시작하기</h3>
    <form action="thread_submit.php" method="post" name="thread_post">
        <input type="text" name="title" id="title" placeholder="제목"><br>
        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="내용"></textarea>
        <button type="sumbit">게시</button>
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    <?php include "../header/header.php" ?>
    <h3>스레드 목록 (클릭 시 이동)</h3>
    <?php
    //스레드 출력 함수
    function draw_thread($row, $is_admin)
    {
        $thread_id = $row["thread_id"];
        $title = $row["title"];
        $comment = $row["comment"];
        $author = $row["author_display"];
        $author_id = $row["author_id"];
        $target = "thread.php?thread_id=$thread_id"; ?>


        <tr onclick="location.href='<?= $target ?>'">
            <td><?= $thread_id ?></td>
            <td><?= $author ?></td>
            <td><?= $title ?></td>
            <?php
            if ($is_admin || isset($_SESSION["member_id"]) && $author_id == $_SESSION["member_id"]) { ?>
                <td><a href="thread_delete.php?thread_id=<?= $thread_id ?>">삭제</a></td>
            <?php
            }
            ?>
        </tr>
    <?php
    }

    //최근에 업데이트된 스레드부터 내림차순으로 정렬
    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT cmt.thread_id, cmt.title, cmt.comment, cmt.author_display, cmt.author_id,
			CASE cmt.author_id
            WHEN NULL THEN NULL
            ELSE (SELECT member_name FROM member WHERE member_id = cmt.author_id)
            END AS member_name
            FROM (
                SELECT *
                FROM comment
                WHERE thread_inner_id = 1
                ) cmt
            JOIN thread th
            ON cmt.comment_id = th.comment_id_first          
            ORDER BY th.comment_id_last DESC;";

    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    //한 페이지에 표시될 최대 스레드
    const ROW_MAX = 5;
    //표시될 최대 페이지 수
    const PAGE_MAX = 5;

    //페이지 출력, 관리자 계정이라면 삭제 메뉴도 표시
    if ($rows > 0) {
        echo "<table>";
        echo "<tr><td>스레드 번호</td><td>작성자</td><td>제목</td>" .
            ($is_admin ? "<td>관리</td>" : "")
            . "</tr>";
        $page = $_GET["page"];
        $pages = $rows / ROW_MAX + (($rows % ROW_MAX) == 0 ? 0 : 1);
        $offset = ROW_MAX * ($page - 1);
        mysqli_data_seek($result, $offset);

        //ROW_MAX만큼 스레드 출력
        for ($i = $offset, $end = $offset + ROW_MAX; $end != $i && $row = mysqli_fetch_array($result); $i++) {
            draw_thread($row, $is_admin);
        }
        echo "</table>";

        echo "<hr>";
        //페이지 이동 번호 출력
        for ($i = $page - PAGE_MAX, $count = 0, $end = $page + PAGE_MAX; $count < PAGE_MAX && $i <= $pages; $i++) {
            if ($i <= 0) continue;

            if ($i == $page)
                echo "| $i ";
            else {
                echo "| <a href='threads.php?page=$i'>$i</a>";
            }
            $count++;
        }
    } else echo "스레드가 존재하지 않습니다";
    ?>

    <hr>
    <h3>새로운 스레드 시작하기</h3>
    <form action="thread_submit.php" method="post" name="thread_post">
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
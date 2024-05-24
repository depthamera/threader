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
    //코멘트 출력 함수
    function draw_comment($row, $is_admin)
    {
        $comment_id = $row["comment_id"];
        $thread_id = $row["thread_id"];
        $inner_id = $row["thread_inner_id"];
        $title = $row["title"];
        $comment = $row["comment"];
        $author = ($row["author_type"] == "anonymous") ? "익명" : $row["author_id"]; ?>


        <tr>
            <td><?= $author ?></td>
            <td><?= $title ?></td>
            <td><?= $comment ?></td>
            <?php
            if ($is_admin && $inner_id != 1) { ?>
                <td><a href="admin_comment_delete.php?thread_id=<?= $thread_id ?>&comment_id=<?= $comment_id ?>">삭제</a></td>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    $keyword = $_GET["keyword"];
    $page = $_GET["page"];

    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT * FROM comment WHERE title LIKE '%$keyword%' OR comment LIKE '%$keyword%' ORDER BY comment_id DESC";

    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    //한 페이지에 표시될 최대 스레드
    const ROW_MAX = 10;
    //표시될 최대 페이지 수
    const PAGE_MAX = 10;

    //페이지 출력, 관리자 계정이라면 삭제 메뉴도 표시
    if ($rows > 0) {
        echo "<table>";
        echo "<tr><td>작성자</td><td>제목</td><td>내용</td>" .
            ($is_admin ? "<td>관리</td>" : "")
            . "</tr>";
        $page = $_GET["page"];
        $pages = $rows / ROW_MAX + (($rows % ROW_MAX) == 0 ? 0 : 1);
        $offset = ROW_MAX * ($page - 1);
        mysqli_data_seek($result, $offset);

        //ROW_MAX만큼 스레드 출력
        for ($i = $offset, $end = $offset + ROW_MAX; $end != $i && $row = mysqli_fetch_array($result); $i++) {
            draw_comment($row, $is_admin);
        }
        echo "</table>";

        echo "<hr>";
        //페이지 이동 번호 출력
        for ($i = $page - PAGE_MAX, $count = 0, $end = $page + PAGE_MAX; $count < PAGE_MAX && $i <= $pages; $i++) {
            if ($i <= 0)
                continue;

            if ($i == $page)
                echo "| $i ";
            else {
                echo "| <a href='threads.php?page=$i'>$i</a>";
            }
            $count++;
        }
    }
    ?>
</body>

</html>
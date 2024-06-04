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
    function delete_comment($thread_id, $comment_id)
    {
        // 코멘트 삭제
        $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
        $sql = "DELETE FROM comment WHERE comment_id = $comment_id";
        mysqli_query($con, $sql);

        // 코멘트가 삭제된 스레드의 마지막 코멘트 아이디를 획득
        $sql = "SELECT comment_id FROM comment WHERE thread_id = $thread_id ORDER BY comment_id DESC";
        $res = mysqli_query($con, $sql);
        $id_last = mysqli_fetch_array($res)[0];

        // 스레드의 마지막 코멘트 아이디를 갱신
        $sql = "UPDATE thread SET comment_id_last = $id_last WHERE thread_id = $thread_id";
        $res = mysqli_query($con, $sql);
    }

    $comment_id = $_GET["comment_id"];
    $thread_id = $_GET["thread_id"];

    // 권한이 있는 경우에만 삭제 진행
    if (isset($_SESSION["permission"]) && $_SESSION["permission"] == "admin") {
        delete_comment($thread_id, $comment_id);
    }
    // 해당 코멘트의 작성자라면 삭제 진행
    else if (isset($_SESSION["member_id"])) {
        $member_id = $_SESSION["member_id"];
        $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
        $sql = "SELECT * FROM comment WHERE comment_id = $comment_id AND author_id = '$member_id'";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res)) {
            delete_comment($thread_id, $comment_id);
        } else {
            echo "<script>alert('잘못된 접근입니다')</script>";
        }
    } else {
        echo "<script>alert('잘못된 접근입니다')</script>";
    } ?>
    <script>
        const referrer = document.referrer;
        location.replace(referrer);
    </script>
</body>

</html>
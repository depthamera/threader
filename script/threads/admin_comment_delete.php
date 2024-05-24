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

    // 권한이 있는 경우에만 삭제 진행
    if (isset($_SESSION["permission"]) && $_SESSION["permission"] == "admin") {
        $comment_id = $_GET["comment_id"];
        $thread_id = $_GET["thread_id"];
        $con = mysqli_connect("localhost", "threader_user", "0000", "threader");

        //스레드 삭제
        $sql = "DELETE FROM comment WHERE comment_id = $comment_id";
        mysqli_query($con, $sql);
    } else {
        echo "<script>alert('잘못된 접근입니다')</script>";
    } ?>
    <script>
        const referrer = document.referrer;
        location.replace(referrer);
    </script>
</body>

</html>
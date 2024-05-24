<?php
session_start();

// 권한이 있는 경우에만 삭제 진행
if (isset($_SESSION["permission"]) && $_SESSION["permission"] == "admin") {
    $thread_id = $_GET["thread_id"];

    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");

    //스레드 삭제
    $sql = "DELETE FROM thread WHERE thread_id = $thread_id";
    mysqli_query($con, $sql);

    //스레드의 코멘트들 삭제
    $sql = "DELETE FROM comment WHERE thread_id = $thread_id";
    mysqli_query($con, $sql);
} else {
    echo "<script>alert('잘못된 접근입니다')</script>";
}
echo "<script>location.replace('threads.php?page=1')</script>";

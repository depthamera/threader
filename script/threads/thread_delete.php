<?php
//스레드와 그 코멘트들 삭제 함수
function delete_thread($thread_id)
{
    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    //스레드 삭제
    $sql = "DELETE FROM thread WHERE thread_id = $thread_id";
    mysqli_query($con, $sql);

    //스레드의 코멘트들 삭제
    $sql = "DELETE FROM comment WHERE thread_id = $thread_id";
    mysqli_query($con, $sql);
}

session_start();
$thread_id = $_GET["thread_id"];

// 권한이 있는 경우에 삭제 진행
if (isset($_SESSION["permission"]) && $_SESSION["permission"] == "admin") {
    delete_thread($thread_id);
}
// 삭제를 시도하는 유저가 작성자라면 삭제 진행 
else if (isset($_SESSION["member_id"])) {
    $member_id = $_SESSION["member_id"];
    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT * FROM comment WHERE thread_id = $thread_id AND author_id = '$member_id' AND thread_inner_id = 1";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res)) {
        delete_thread($thread_id);
    } else {
        echo "<script>alert('잘못된 접근입니다')</script>";
    }
} else {
    echo "<script>alert('잘못된 접근입니다')</script>";
}
echo "<script>location.replace('threads.php?page=1')</script>";

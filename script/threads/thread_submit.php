<?php
session_start();
$member_id = isset($_SESSION["member_id"]) ? $_SESSION["member_id"] : null;
$author_name = isset($_SESSION["member_name"]) ? $_SESSION["member_name"] : null;
if (isset($_POST["is_anonymous"]) || !$member_id) {
    $display_name = "익명";
} else if ($author_name) {
    $display_name = "$author_name ($member_id)";
} else {
    $display_name = $member_id;
}

$title = $_POST["title"];
$comment = $_POST["comment"];
$replaced_comment = str_replace("\n", "<br>", $comment);

//새 스레드 등록
$con = mysqli_connect("localhost", "threader_user", "0000", "threader");
$sql = "INSERT INTO thread(next_thread_inner_id) VALUES(2)";
mysqli_query($con, $sql);

//등록한 스레드의 번호 가져오기
$sql = "SELECT thread_id FROM thread ORDER BY 1 DESC LIMIT 1";
$thread_id = mysqli_fetch_array(mysqli_query($con, $sql))[0];

//등록한 스레드에 코멘트 추가
if ($member_id) {
    $sql = "INSERT INTO comment(thread_id, thread_inner_id, title, comment, author_id, author_display) 
    VALUES ($thread_id, 1, '$title', '$replaced_comment', '$member_id', '$display_name')";
} else {
    $sql = "INSERT INTO comment(thread_id, thread_inner_id, title, comment, author_display) 
    VALUES ($thread_id, 1, '$title', '$replaced_comment', '$display_name')";
}

mysqli_query($con, $sql);

//등록한 코멘트의 번호 가져오기
$sql = "SELECT comment_id FROM comment ORDER BY 1 DESC LIMIT 1";
$comment_id = mysqli_fetch_array(mysqli_query($con, $sql))[0];

//등록한 스레드의 정보를 갱신
$sql = "UPDATE thread SET comment_id_first = $comment_id, comment_id_last = $comment_id WHERE thread_id = $thread_id";
mysqli_query($con, $sql);

//생성한 스레드로 이동
echo "<script>location.replace('thread.php?thread_id=$thread_id')</script>";

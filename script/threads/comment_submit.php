<?php
session_start();
$member_id = isset($_SESSION["member_id"]) ? $_SESSION["member_id"] : null;
$author_name = isset($_SESSION["member_name"]) ? $_SESSION["member_name"] : null;

//회원 여부, 익명 체크 여부에 따른 작성자 생성
if (isset($_POST["is_anonymous"]) || !$member_id) {
    $display_name = "익명";
} else if ($author_name) {
    $display_name = "$author_name ($member_id)";
} else {
    $display_name = $member_id;
}

$thread_id = $_POST["thread_id"];
$title = $_POST["title"];
$comment = $_POST["comment"];
$comment = str_replace("\n", "<br>", $comment);


//다음 내부 id 받아오기
$con = mysqli_connect("localhost", "threader_user", "0000", "threader");
$sql = "SELECT next_thread_inner_id FROM thread WHERE thread_id = $thread_id";
$inner_id = mysqli_fetch_array(mysqli_query($con, $sql))[0];


//새로운 코멘트 등록. 
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

//스레드의 최근 코멘트 id, 다음 내부 id 갱신
$sql = "UPDATE thread SET comment_id_last = $comment_id, next_thread_inner_id = next_thread_inner_id + 1 WHERE thread_id = $thread_id";
mysqli_query($con, $sql);

//스레드로 돌아가기
echo "<script>location.replace('thread.php?thread_id=$thread_id')</script>";

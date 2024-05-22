<?php
$thread_id = $_POST["thread_id"];
$title = $_POST["title"];
$comment = $_POST["comment"];

//새로운 코멘트 등록
$con = mysqli_connect("localhost", "threader_user", "0000", "threader");
$sql = "INSERT INTO comment(thread_id, title, comment) VALUES($thread_id, '$title', '$comment')";
mysqli_query($con, $sql);

//등록한 코멘트의 번호 가져오기
$sql = "SELECT comment_id FROM comment ORDER BY 1 DESC LIMIT 1";
$comment_id = mysqli_fetch_array(mysqli_query($con, $sql))[0];

//스레드의 최근 코멘트 id 갱신
$sql = "UPDATE thread SET comment_id_last = $comment_id WHERE thread_id = $thread_id";

//스레드로 돌아가기
echo "<script>location.replace('thread.php?thread_id=$thread_id')</script>";

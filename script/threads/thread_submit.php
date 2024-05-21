<?php
$title = $_POST["title"];
$comment = $_POST["comment"];

//새 스레드 생성
$con = mysqli_connect("localhost", "threader_user", "0000", "threader");
$sql = "INSERT INTO `thread` VALUES ()";
mysqli_query($con, $sql);

//생성한 스레드의 번호 가져오기
$sql = "SELECT `thread_id` FROM `thread` ORDER BY 1 DESC LIMIT 1";
$thread_id = mysqli_fetch_array(mysqli_query($con, $sql))[0];

//가져온 스레드 번호로 코멘트 등록
$sql = "INSERT INTO `comment`(`thread_id`, `title`, `comment`) VALUES ($thread_id, '$title', $comment')";
mysqli_query($con, $sql);
echo "<script>location.replace('thread.php?thread_id=$thread_id')</script>";

<?php

$user_name = $_POST["user_name"];
$user_id = $_POST["user_id"];
$user_password = $_POST["user_password"];

//아이디 중복 검사
$con = mysqli_connect("localhost", "threader_user", "0000", "threader");
$sql = "SELECT * FROM `member` WHERE `member_id` = '$user_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

//중복 시 돌아가기
if ($row) {
?>
    <script>
        alert('이미 존재하는 아이디입니다');
        location.replace('./sign_up.html');
    </script>
<?php
}
//중복이 아닐 시 DB에 등록 후 로그인, 메인으로 이동
else {
    $sql = "INSERT INTO `member` (member_name, `member_id`, `member_password`) VALUES ('$user_name', '$user_id', '$user_password')";
    mysqli_query($con, $sql);
    session_start();
    $_SESSION["member_id"] = $user_id;

    echo "<script>location.replace('../main/main.php')</script>";
}

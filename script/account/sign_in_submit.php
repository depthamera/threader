<?php
session_start();

//이미 로그인되어 있다면 메인 페이지로 이동
if (isset($_SESSION["member_id"])) {
    echo "<script>location.replace('../main/main.php')</script>";
}
$member_id = $_POST["member_id"];
$member_password = $_POST["member_password"];

//아이디, 비밀번호 검사
$con = mysqli_connect("localhost", "threader_user", "0000", "threader");
$sql = "SELECT * FROM `member` WHERE `member_id` = '$member_id' AND `member_password` = '$member_password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

//검사에 성공했다면 세션에 아이디 등록 후 메인 페이지로 이동
if ($row) {
    $_SESSION["member_id"] = $row["member_id"];
    $_SESSION["member_name"] = $row["member_name"];
    $_SESSION["permission"] = $row["permission"];
    echo "<script>location.replace('../main/main.php')</script>";
}
//검사에 실패했다면 로그인 페이지로 이동
else {
?>
    <script>
        alert('아이디 또는 비밀번호가 올바르지 않습니다');
        location.replace('sign_in.php')
    </script>";
<?php
}

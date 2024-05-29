<?php
session_start();

$member_id = $_SESSION["member_id"];
$member_name = $_POST["member_name"];
$current_password = $_POST["member_password"];
$update_password = $_POST["member_password_update"];

$con = mysqli_connect("localhost", "threader_user", "0000", "threader");
if ($member_name == "") {
    $sql = "UPDATE member SET member_name = NULL WHERE member_id = '$member_id'";
    $_SESSION["member_name"] = null;
} else {
    $sql = "UPDATE member SET member_name = '$member_name' WHERE member_id = '$member_id'";
    $_SESSION["member_name"] = $member_name;
}
mysqli_query($con, $sql);


if ($update_password != "") {
    $sql = "UPDATE member SET member_password = '$update_password' WHERE member_id = '$member_id' AND member_password = '$current_password'";
    mysqli_query($con, $sql);
    if (!mysqli_affected_rows($con)) {
        echo ("<script>alert('비밀번호가 올바르지 않습니다')</script>");
    }
}

echo "<script>location.replace('./member_info.php')</script>";

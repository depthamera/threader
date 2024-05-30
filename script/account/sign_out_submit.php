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
    $member_id = $_SESSION["member_id"];
    $member_password = $_POST["member_password"];

    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT * FROM `member` WHERE `member_id` = '$member_id' AND `member_password` = '$member_password'";
    if (mysqli_num_rows(mysqli_query($con, $sql))) {
        $sql = "DELETE FROM member WHERE member_id = '$member_id'";
        mysqli_query($con, $sql);
        unset($_SESSION["member_id"]);
        unset($_SESSION["member_name"]);
        unset($_SESSION["permission"]);
        echo ("<script>alert('탈퇴가 완료되었습니다')</script>");
    } else {
        echo ("<script>alert('비밀번호가 올바르지 않습니다')</script>");
    }
    echo ("<script>window.close()</script>");
    ?>
</body>

</html>
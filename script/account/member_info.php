<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../header/header.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        const openWindow = () => {
            window.open(
                "sign_out_check.php",
                "_blank",
                "scrollbars=no, width=320, height=120"
            );
        }
    </script>
    <?php
    if (!isset($_SESSION["member_id"])) {
        echo "<script>location.replace('../main/main.php')</script>";
    }
    $member_id = $_SESSION["member_id"];
    $member_name = $_SESSION["member_name"];
    ?>
    <form action="member_data_submit.php" method="post">
        <h4>일반</h4>
        아이디: <?= $member_id ?> <br>
        닉네임: <input type="text" name="member_name" value="<?= $member_name ?>"> <br>
        <hr>

        <h4>고급</h4>
        <input type="text" name="member_password_update" placeholder="변경할 비밀번호"> <br>
        <input type="text" name="member_password" placeholder="현재 비밀번호 확인"> <br>
        <hr>
        <button type="submit">변경사항 적용</button>
        <hr><br><br>
        <a href="#" onclick="openWindow()">회원탈퇴</a>
    </form>
</body>

</html>
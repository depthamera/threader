<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../header/header.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $member_id = $_SESSION["member_id"];
    $member_name = $_SESSION["member_name"];
    ?>
    <form action="member_data_submit.php" method="post">
        아이디: <?= $member_id ?> <br>
        닉네임: <input type="text" name="member_name" value="<?= $member_name ?>"> <br>
        <hr>

        <h4>비밀번호 변경</h4>
        <input type="text" name="member_password" placeholder="현재 비밀번호 확인"> <br>
        <input type="text" name="member_password_update" placeholder="변경할 비밀번호"> <br>
        <hr>
        <button type="submit">변경사항 적용</button>
    </form>
</body>

</html>
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
    $member_name = $_SESSION["member_name"];
    $member_display = $member_name ? "$member_name($member_id)" : $_member_id;
    echo $member_display;
    ?>

    계정의 회원탈퇴 확인
    <form action="sign_out_submit.php" method="post">
        <input type="text" name="member_password" placeholder="비밀번호">
        <button type="submit">탈퇴</button>
    </form>
</body>

</html>
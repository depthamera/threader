<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $user_id = $_GET["user_id"];

    //아이디 중복 검사
    $con = mysqli_connect("localhost", "threader_user", "0000", "threader");
    $sql = "SELECT * FROM `member` WHERE `member_id` = '$user_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    //검사 결과 출력 
    if ($row) {
        echo "이미 존재하는 아이디입니다.";
    } else {
        echo "사용 가능한 아이디입니다.";
    }
    ?>
    <br>

    <button onclick="window.close()">확인</button>
</body>

</html>
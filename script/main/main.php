<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php include "../header/header.php" ?>
  <h1>메인 페이지입니다</h1>
  <?php
  if (!isset($_SESSION["member_id"])) { ?>
    <h3>회원으로 이용하기</h3>
    <a href="../account/sign_in.php">로그인</a>
    <br>또는<br>
    <a href="../account/sign_up.php">회원가입</a>
    <hr>
  <?php
  }
  ?>

  <h3>지금 인기 있는 스레드들</h3>
  <a href="../threads/threads.php?page=1">스레드 구경하기</a>
</body>

</html>
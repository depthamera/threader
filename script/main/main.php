<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <?php include "../header/header.php" ?>
</head>

<body>
  <?php
  if (!isset($_SESSION["member_id"])) { ?>
    <a href="../account/sign_in.php">로그인</a>
    <a href="../account/sign_up.php">회원가입</a>
  <?php
  }
  ?>
  <a href="../threads/threads.php?page=1">스레드 구경하기</a>
</body>

</html>
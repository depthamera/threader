<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <?php include "../header/header.php" ?>
</head>

<body>
  <h1>메인 페이지입니다</h1>
  <?php
  if (!isset($_SESSION["member_id"])) { ?>
    <h3>게시물에 작성자 아이디를 남기고 싶다면</h3>
    <a href="../account/sign_in.php">로그인</a>
    <br>또는<br>
    <a href="../account/sign_up.php">회원가입</a>
    <hr>
  <?php
  }
  ?>

  <h3>지금 인기 있는 스레드는 뭘까요?</h3>
  <a href="../threads/threads.php?page=1">스레드 구경하기</a>
</body>

</html>
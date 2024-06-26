<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <?php include "../header/header.php" ?>
  <script>
    //엘리먼트에 값이 입략되었는지 확인. (엘리먼트, 실패 시 출력할 엘리먼트의 이름)
    const checkInputProvided = (element, elementName) => {
      if (element.value == "") {
        alert(`${elementName}를 입력해 주세요`);
        element.focus();
        return false;
      }
      return true;
    };

    //아이디와 비밀번호가 입력되었다면 submit
    const trySubmit = () => {
      const memberId = document.getElementById("member_id");
      const memberPassword = document.getElementById("member_password");
      if (
        checkInputProvided(memberId, "아이디") &&
        checkInputProvided(memberPassword, "비밀번호")
      ) {
        document.sign_up.submit();
      }
    };
  </script>

  <h1>로그인</h1>

  <form action="sign_in_submit.php" method="post" name="sign_up">
    <input type="text" name="member_id" id="member_id" placeholder="아이디" />
    <br />

    <input type="password" name="member_password" id="member_password" placeholder="비밀번호" />
  </form>
  <br />
  <button type="button" onclick="trySubmit()">로그인</button>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <?php include "../header/header.php" ?>
</head>

<body>
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

    //아이디가 입력되었는지 체크 후, 검사 결과 창을 띄움
    const checkIdDuplication = () => {
      const userId = document.getElementById("user_id");
      if (checkInputProvided(userId, "아이디")) {
        window.open(
          `id_duplication_check.php?user_id=${userId.value}`,
          "_blank",
          "scrollbars=no, width=320, height=120"
        );
      }
    };

    //아이디와 비밀번호가 입력되었다면 submit
    const trySubmit = () => {
      const userId = document.getElementById("user_id");
      const userPassword = document.getElementById("user_password");
      if (
        checkInputProvided(userId, "아이디") &&
        checkInputProvided(userPassword, "비밀번호")
      ) {
        document.sign_up.submit();
      }
    };
  </script>

  <h1>가입 정보 입력</h1>

  <form action="sign_up_submit.php" method="post" name="sign_up">
    <input type="text" name="user_id" id="user_id" placeholder="아이디" />
    <button type="button" onclick="checkIdDuplication()">중복 확인</button>
    <br />

    <input type="password" name="user_password" id="user_password" placeholder="비밀번호" />
  </form>
  <br />
  <button type="button" onclick="trySubmit()">가입</button>
</body>

</html>
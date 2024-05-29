<style>
    <?php include "header.css"; ?>
</style>
<?php
session_start();
$is_admin = (isset($_SESSION["permission"]) && $_SESSION["permission"] == "admin");
?>
<header>
    <h3>이것은 헤더입니다</h3>
    <script>
        const handleKeyPress = (e) => {
            if (e.keyCode == 13) {
                const keyword = document.getElementById('keyword').value;
                if (keyword) {
                    location.href = `../threads/search.php?page=1&keyword=${keyword}`;
                }
            }
        }
    </script>
    <?php $con = mysqli_connect("localhost", "threader_user", "0000", "threader"); ?>
    <a href="../main/main.php">메인</a>
    <a href="../threads/threads.php?page=1">스레드 목록</a>
    <input type="text" name="keyword" id="keyword" onkeypress="handleKeyPress(event)" placeholder="검색">
    <?php
    if (isset($_SESSION["member_id"])) {
        if ($_SESSION["member_name"] == null)
            echo $_SESSION["member_id"] . " ";
        else {
            echo $_SESSION["member_name"] . "(";
            echo $_SESSION["member_id"] . ") ";
        }
        echo "<a href='../account/member_info.php'>회원정보</a> ";
        echo "<a href='../account/logout.php'>로그아웃</a>";
    } else {
        echo "<a href='../account/sign_in.php'>로그인</a> ";
        echo "<a href='../account/sign_up.php'>회원가입</a>";
    }
    ?>
    <hr>
</header>
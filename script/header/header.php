<head>
    <?php session_start() ?>
    <header>
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
        <a href="../main/main.php">THREADER</a>
        <a href="../threads/threads.php?page=1">스레드 목록</a>
        <input type="text" name="keyword" id="keyword" onkeypress="handleKeyPress(event)" placeholder="검색">
        <?php
        if (isset($_SESSION["member_id"]))
            echo "<a href='../account/logout.php'>로그아웃</a>";
        else {
            echo "<a href='../account/sign_in.php'>로그인</a> ";
            echo "<a href='../account/sign_up.php'>회원가입</a>";
        }
        ?>
        <hr>
    </header>
</head>
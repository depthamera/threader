<head>
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

        <a href="threads.php?page=1">스레드 목록</a>
        <input type="text" name="keyword" id="keyword" onkeypress="handleKeyPress(event)" placeholder="검색">
    </header>
</head>
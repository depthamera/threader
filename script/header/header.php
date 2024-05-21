<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <header>
        <script>
            const handleKeyPress = (e) => {
                if (e.keyCode == 13) {
                    const keyword = document.getElementById('keyword').value;
                    if (keyword) {
                        location.href = `../search/search.php?page=1&keyword=${keyword}`;
                    }
                }
            }
        </script>
        <?php $con = mysqli_connect("localhost", "threader_user", "0000", "threader"); ?>


        <input type="text" name="keyword" id="keyword" onkeypress="handleKeyPress(event)" placeholder="검색">
    </header>
</head>

</html>
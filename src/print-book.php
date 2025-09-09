<!DOCTYPE html>
<html lang="cs">
<head>
    <!-- This page doesn't need styling -->
    <title>Tisk knihy <?php echo $_GET['id'];?></title>
</head>
<body>
<?php
    // Simply prints out the whole contents of a book based on the ID received through the GET superglobal variable
    require "php/dbconnect.php";
    $sql = "SELECT `content` FROM `content` WHERE books_id=".$_GET['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['content'];
    $conn->close();
?>
<script>
window.print(); // Prints the whole page and then closes the page
window.close();
</script>
</body>
</html>
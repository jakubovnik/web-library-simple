<!DOCTYPE html>
<html lang="cs">
<head>
    <title>Tisk knihy <?php echo $_GET['id'];?></title>
</head>
<body>
<?php
    require "php/dbconnect.php";
    $sql = "SELECT `content` FROM `content` WHERE books_id=".$_GET['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['content'];
    $conn->close();
?>
<script>
window.print();
window.close();
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="cs">
<head>
    <link rel="stylesheet" href="css/default.css">
    <title>Knihovna</title>
</head>
<body>
    <div id="navbar">
        <div id="navbar-title"><a href="index.php">Moje knihovna</a></div>
        <div id="navbar-add-btn">
            <a href="print-book.php" target="_blank">
                <img src="images/printing.svg" alt="add book">
            </a>
        </div>
    </div>
    <div id="book-container">
        <div id="book-details">
            <?php
                require "php/dbconnect.php";
                $sql = "SELECT * FROM `books` WHERE id=".$_GET['id'];
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo '<div id="book-title" class="book-detail-text">'.$row['title'].'</div>';
                echo '<div id="book-author" class="book-detail-text">'.$row['author'].'</div>';
                echo '<div id="book-release" class="book-detail-text">Rok vydání: '.$row['release'].'</div>';
                echo '<div id="book-price" class="book-detail-text">Cena: '.$row['price'].' Kč</div>';
                echo '<div id="book-rating" class="book-detail-text">Hodnocení: '.$row['rating'].'⭐</div>';
                echo '<img src="'.$row['image_path'].'" id="book-preview-image">';
            ?>
        </div>
        <div id="book-itself">
            <?php
                $sql = "SELECT `content` FROM `content` WHERE books_id=".$_GET['id'];
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo $row['content'];
                $conn->close();
            ?>
        </div>
    </div>
<script>

</script>
</body>
</html>
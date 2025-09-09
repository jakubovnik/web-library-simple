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
            <a href="add-book.php">
                <img src="images/plus-circle.svg" alt="add book">
            </a>
        </div>
    </div>
    <div id="library-container">
        <?php
            // fetches data about all of the books and outputs it into the grid layout element
            require "php/dbconnect.php";
            $sql = "SELECT * FROM `books` ORDER BY id";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo '<a id="book-preview-'.$row['id'].'" class="book-preview" href="book.php?id='.$row['id'].'">';
                echo '  <img src="'.$row['image_path'].'" class="book-preview-image">';
                echo '  <div class="book-preview-overlay">';
                echo '      <div class="book-preview-title">'.$row['title'].'</div>';
                echo '  </div>';
                echo '</a>';
            }
            $conn->close();
        ?>
    </div>
</body>
</html>
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
            <!-- Not an add button in this case but it needs the same styling so I kept the same tag id -->
            <a href="print-book.php?id=<?php echo $_GET['id'];?>" target="_blank">
                <img src="images/printing.svg" alt="add book">
                <div id="print-info">Při tisku možná bude potřeba v nastavní vypnout tisk záhlaví a zápatí</div>
                <!-- Print info only shows up when the cursor hovers above the print button -->
            </a>
        </div>
    </div>
    <div id="book-container">
        <div id="book-details">
            <?php
                require "php/dbconnect.php"; // fetches book data based on the ID from the superglobal variable GET and outputs it as elements into the side panel
                $sql = "SELECT 
                            books.id as id,
                            title,
                            author,
                            `release`,
                            price,
                            genre.name as genre,
                            rating,
                            image_path
                        FROM `books`
                        INNER JOIN `genre` ON `books`.`genre_id`=`genre`.`id`
                        WHERE books.id=".$_GET['id'];
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo '<div id="book-title" class="book-detail-text">'.$row['title'].'</div>';
                echo '<div id="book-author" class="book-detail-text">'.$row['author'].'</div>';
                echo '<div id="book-genre" class="book-detail-text">'.$row['genre'].'</div>';
                echo '<div id="book-release" class="book-detail-text">Rok vydání: '.$row['release'].'</div>';
                echo '<div id="book-price" class="book-detail-text">Cena: '.$row['price'].' Kč</div>';
                echo '<div id="book-rating" class="book-detail-text">Hodnocení: '.$row['rating'].'⭐</div>';
                echo '<img src="'.$row['image_path'].'" id="book-preview-image">';
                // connection to the db doesnt close here since its still needed later
            ?>
        </div>
        <div id="book-itself">
            <?php
                // Outputs the contents of the book from the database into the central panel
                $sql = "SELECT `content` FROM `content` WHERE books_id=".$_GET['id'];
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo $row['content'];
                $conn->close(); // now the db connection can be closed
            ?>
        </div>
    </div>
</body>
</html>
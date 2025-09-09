<?php
require "dbconnect.php"; // connects to the database

$new_image_path = ""; // dont remember how global/local variables are handled so I created this variable before the if statement to avoid error either way
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){ // If there is a file successfully sent through POST, it saves it into the previews directory
    $tmp_name = $_FILES['image']['tmp_name'];
    $new_image_path = "previews/" . (string) time() . basename($_FILES['image']['name']);
    move_uploaded_file($tmp_name, "../".$new_image_path); // THIS DOESNT CREATE DIRECTORIES AUTOMATICALLY, so there absolutely should be a /previews/ directory in root
}

// Inserts details about a book into the database (contents are stored in a separate table for "potential" performance boost, which doesnt matter in this small use case)
$sql = "INSERT INTO `books` (`title`, `author`, `release`, `price`, `rating`, `image_path`, `genre_id`)
VALUES
(
'".$_POST['title']."',
'".$_POST['author']."',
".$_POST['release'].",
".$_POST['price'].",
".$_POST['rating'].",
'".$new_image_path."',
'".$_POST['genre']."'
);";
if($conn->query($sql) === FALSE){
    echo "1";
    exit;
}
$book_id = mysqli_insert_id($conn); // retrieves the newly generated ID of the book for later use

// now is the "later use". Inserts the book content into the content table and gives it the same id as the book details row so that it is linked
$sql = "INSERT INTO `content` (`books_id`, `content`)
VALUES
(
'".$book_id."',
\"".$_POST['content']."\"
);";
if($conn->query($sql) === FALSE){
    echo "1";
    exit;
}

$conn->close();
echo "0";
?>
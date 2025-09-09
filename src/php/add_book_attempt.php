<?php
require "dbconnect.php";

$new_image_path = "";
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    $tmp_name = $_FILES['image']['tmp_name'];
    $new_image_path = "previews/" . (string) time() . basename($_FILES['image']['name']);
    move_uploaded_file($tmp_name, "../".$new_image_path);
}

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
$book_id = mysqli_insert_id($conn);


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
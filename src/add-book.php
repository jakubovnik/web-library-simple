<!DOCTYPE html>
<html lang="cs">
<head>
    <link rel="stylesheet" href="css/default.css">
    <title>Přidat knihu</title>
</head>
<body>
    <div id="navbar">
        <div id="navbar-title"><a href="index.php">Moje knihovna</a></div>
        <div id="navbar-add-btn">
            <img src="images/plus-circle-solid.svg" alt="add book" onclick="add_book_attempt()">
        </div>
    </div>
    <div id="add-book-container">
        <div class="input-container">
            <input id="input-title" type="text" placeholder="Název">
        </div>
        <div class="input-container">
            <input id="input-author" type="text" placeholder="Autor">
        </div>
        <div class="input-container">
            <select id="input-genre" placeholder="Žánr">
                <?php
                require "php/dbconnect.php";
                $sql = "SELECT * FROM `genre` ORDER BY id";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
                $conn->close();
                ?>
            </select>
        </div>
        <div class="input-container">
            <input id="input-release" type="number" placeholder="Rok vydání">
        </div>
        <div class="input-container">
            <input id="input-price" type="number" placeholder="Cena">
        </div>
        <div class="input-container">
            <label for="rating">Hodnocení</label>
            <input id="input-rating" type="range" name="rating" min="1" max="5" step="1">
        </div>
        <div class="input-container">
            <input id="input-image" type="file" accept="image/*">
        </div>
    </div>
    <textarea id="input-content" placeholder="Obsah knihy"></textarea>
<script>
input_title = document.getElementById("input-title");
input_author = document.getElementById("input-author");
input_genre = document.getElementById("input-genre");
input_release = document.getElementById("input-release");
input_price = document.getElementById("input-price");
input_rating = document.getElementById("input-rating");
input_image = document.getElementById("input-image");
input_content = document.getElementById("input-content");

function clear_form(){
    input_title.value = "";
    input_author.value = "";
    input_release.value = "";
    input_price.value = "";
    input_rating.value = "";
    input_image.value = "";
    input_content.value = "";
}

function form_is_filled(){
    if(input_title.value == ""){
        alert("Název není vyplněn");
        return false;
    }
    if(input_author.value == ""){
        alert("Autor není vyplněn");
        return false;
    }
    if(input_release.value == ""){
        alert("Rok vydání není vyplněn");
        return false;
    }
    if(input_price.value == ""){
        alert("Cena není vyplněná");
        return false;
    }
    if(input_image.files.length === 0){
        alert("Obrázek není vybrán");
        return false;
    }
    if(input_content.value == ""){
        alert("Kniha nemá obsah");
        return false;
    }
    return true;
}

function add_book_attempt(){
    if(!form_is_filled()){
        return;
    }
    add_book_request();
}

function add_book_request(){
    var request = new XMLHttpRequest();
    var form_data = new FormData();
    form_data.append("title", input_title.value);
    form_data.append("author", input_author.value);
    form_data.append("genre", input_genre.value);
    form_data.append("release", input_release.value);
    form_data.append("price", input_price.value);
    form_data.append("rating", input_rating.value);
    form_data.append("content", input_content.value);

    if(input_image.files.length > 0){
        form_data.append("image", input_image.files[0]);
    }
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "0"){
                clear_form();
                alert("Kniha úspěšně přidána");
            }else{
                alert("Něco se pokazilo" + this.responseText);
            }
        }
    };
    request.open("POST", "php/add_book_attempt.php", true);
    request.send(form_data);
}

</script>
</body>
</html>
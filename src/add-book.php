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
            <a href="add-book.php">
                <img src="images/plus-circle-solid.svg" alt="add book">
            </a>
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
                <option value="1">temp_option_1</option>
                <option value="2">temp_option_2</option>
                <option value="3">temp_option_3</option>
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

</script>
</body>
</html>
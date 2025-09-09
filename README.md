# web-library-simple
Tento projekt slouží pro splnění jednodušší varianty testovacího úkolu. Ukládá knihy a detaily o knize do SQL databáze. Knihy jsou ve formátu čistého html (jelikož jsem nestihl vytvořit hezké rozhraní pro PDF soubory).
Celý projekt byl vytvořen ve windows a testován s pomocí aplikace XAMPP, která zajišťovala server (s PHP) a MariaDB databázi (přestože byla popisována jako MySQL databáze na control panelu, XAMPP používá MariaDB).
# Instalace
1. Je třeba vložit celý obsah src adresáře do kořenového adresáře serveru
2. Poté použít skripty create_script.sql a insert_script.sql v adresáři sql/ ve své databázi
3. Nasledně v adresáři /php/ (který už by měl být v kořenovém adresáři serveru) je nutno v souboru dbconnect.php změnit údaje o databázi (servername, username, password, případně název databáze pokud byl změněn v druhém kroku)
4. Případně konfigurovat server aby php přijímalo větší soubory (kdyby stránka měla potíže)
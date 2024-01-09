<?php
  // guard.php prüft ob der Benutzer eingeloggt ist, wenn nicht wird er auf die index.php weitergeleitet.
  include './auth/guard.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
  $siteTitle = 'Search';
  include_once './src/components/templates/head.php';
?>
<body>
    <?php include './src/components/nav/main-menu.php'; ?>

    <main class="main-container">
        <div class="such-resultate">
            <?php include './src/components/nav/searchbar.php'; ?>
            <?php
                /* 
                    pseudo datenbank mit produkten
                    hier wäre sonst eine datenbankabfrage
                */
                $products = [
                    'Turnschuhe' => [
                        'name' => 'Turnschuhe',
                        'preis' => 100,
                        'bild' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/u_126ab356-44d8-4a06-89b4-fcdcc8df0245,c_scale,fl_relative,w_1.0,h_1.0,fl_layer_apply/2f79063e-d7dc-4a88-99ce-253a59382fa3/air-jordan-4-retro-schuh-fur-altere.png',
                        'beschreibung' => 'Schuhe für Sport'
                    ],
                    'Basketball' => [
                        'name' => 'Basketball',
                        'preis' => 50,
                        'bild' => 'https://target.scene7.com/is/image/Target/GUEST_20affc7e-e0d7-4eb6-a6f3-68d13520f8be?wid=488&hei=488&fmt=pjpeg',
                        'beschreibung' => 'NBA Profi Basketball'
                    ],
                    'Shorts' => [
                        'name' => 'Shorts',
                        'preis' => 79,
                        'bild' => 'https://images.footballfanatics.com/los-angeles-lakers/los-angeles-lakers-hardwood-classics-road-swingman-shorts-by-mitchell-and-ness-yellow-mens_ss4_p-12013093+u-12d8b3tp529112uhafgn+v-25893c36bab841a89b49e4f6bbd7b144.jpg?_hv=2&w=900',
                        'beschreibung' => 'Schuhe für Sport'
                    ],
                ];
            
                // Wenn die Anfrage eine GET Anfrage ist, dann führe den Code aus.
                if($_SERVER['REQUEST_METHOD'] == 'GET'){
                    $suche = $_GET['suche'];

                    // sanitize input (lösche html tags, Schrägstriche, Leerzeichen und konvertiere spezielle Zeichen zu html entities)
                    $suche = strip_tags($suche); // strip HTML and PHP tags 
                    $suche = stripslashes($suche); // un-quotes a quoted string
                    $suche = trim($suche); // lösch Leerzeichn am Anfang und Ende des Strings
                    $suche = htmlspecialchars($suche); // konvertiert spezielle Zeichen zu HTML entities
                    $suche = strtolower($suche); // macht alle Buchstaben klein

                    echo "<h1>Suchresultat: $suche</h1>";

                    // macht alle Keys in dem Array in Kleinbuchstaben
                    $arrayKeyToLower = array_change_key_case($products, CASE_LOWER);
                    if(array_key_exists($suche, $arrayKeyToLower)){ // prüft ob der Key in dem Array existiert
                        $searchResult = $arrayKeyToLower[$suche]; // speichert das Produkt in einer Variable, anhand des Keys
                        $product = "<div class='product-card'>";
                        $product .= "<h2>$searchResult[name]</h2>";
                        $product .= "<img src='$searchResult[bild]' alt='$searchResult[name]'>";
                        $product .= "<p>$searchResult[beschreibung]</p>";
                        $product .= "<p>Preis: $searchResult[preis]</p>";
                        $product .= "</div>";
                        echo $product;
                    }else{
                        echo "<h2>Kein Resultat gefunden</h2>";
                    }
                }
            ?>
        </div>
    </div> 
</body>
</html>
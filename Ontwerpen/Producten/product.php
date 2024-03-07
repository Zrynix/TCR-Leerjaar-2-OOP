<!-- author:amin -->
<?php

abstract class Product {
    public $naam;
    public $inkoopprijs;
    public $btw;
    public $omschrijving;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving) {
        $this->naam = $naam;
        $this->inkoopprijs = $inkoopprijs;
        $this->btw = $btw;
        $this->omschrijving = $omschrijving;
    }

    abstract public function getProductInformatie();
}

class Music extends Product {
    private $artiest;
    private $nummers;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $artiest, $nummers) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->artiest = $artiest;
        $this->nummers = $nummers;
    }

    public function getProductInformatie() {
        $nummersList = "<ul>";
        foreach ($this->nummers as $nummer) {
            $nummersList .= "<li>$nummer</li>";
        }
        $nummersList .= "</ul>";
    
        return "Artiest: " . $this->artiest . "<br> Nummers: " . $nummersList . "<br>Details: " . $this->omschrijving;
    }
    
}

class Film extends Product {
    private $kwaliteit;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $kwaliteit) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->kwaliteit = $kwaliteit;
    }

    public function getProductInformatie() {
        return "Kwaliteit: " . $this->kwaliteit;
    }
}

class Game extends Product {
    private $genre;
    private $minimaleHardware;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $genre, $minimaleHardware) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->genre = $genre;
        $this->minimaleHardware = $minimaleHardware;
    }

    public function getProductInformatie() {
        return "Genre: " . $this->genre . "<br> Minimale hardware eisen: <br> " . $this->minimaleHardware;
    }
}

class ProductList {
    private $producten = [];

    public function voegProductToe(Product $product) {
        $this->producten[] = $product;
    }

    public function toonProducten() {
        echo "<table border='1'>";
        echo "<tr><th>Naam van product</th><th>Categorie</th><th>Verkoopprijs</th><th>Informatie over het product</th></tr>";
        foreach ($this->producten as $product) {
            $verkoopprijs = $product->inkoopprijs * (1 + $product->btw) * 1.2; 
            echo "<tr>";
            echo "<td>" . $product->naam . "</td>";
            echo "<td>" . $this->getCategorie($product) . "</td>";
            echo "<td>" . $verkoopprijs . "</td>";
            echo "<td>" . $product->getProductInformatie() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    private function getCategorie(Product $product) {
        if ($product instanceof Music) {
            return "Muziek";
        } elseif ($product instanceof Film) {
            return "Film";
        } elseif ($product instanceof Game) {
            return "Game";
        } else {
            return "Onbekend";
        }
    }
    
}

// Voorbeeld van gebruik:
$productList = new ProductList();
$productList->voegProductToe(new Music("Heaven Knows", 20, 0.21, "Warner Uk", "PinkPanthress", ["Mosquito", "Boys a liar pt2"]));
$productList->voegProductToe(new Music("Thriller", 20, 0.21, "Epic Records", "Michael Jackson", ["Thriller", "Billy Jean"]));
$productList->voegProductToe(new Film("Kung Fu Panda", 10.0, 0.21, "Dreamworks", "Blueray"));
$productList->voegProductToe(new Film("Cars", 10.0, 0.21, "Pixar", "Blueray"));
$productList->voegProductToe(new Game("Dragon Ball Xenoverse 2", 15, 0.21, "Bandai Namco Entertainment", "RPG", "RAM: 2 GB, Intel Core 2 Quad Q6600 2.4 GHz or AMD Phenom II X4 945 3.0 GHz
"));
$productList->voegProductToe(new Game("Ark Survival Evolved", 15, 0.21, "Action", "Survival", "8 GB RAM, Intel Core i5-2400/AMD FX-8320 or better."));

$productList->toonProducten();
?>

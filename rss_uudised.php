<!DOCTYPE html>
<html lang="et">
<head>
    <title>XML andmete lugemine PHP abil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <ul class="menu">
            <li>
                <a href="https://annaoleks24.thkit.ee/php/php/?leht=avaleht.php">Avaleht</a>
            </li>
            <li>
                <a href="rss_uudised.php">RSS uudised</a>
            </li>
            <li>
                <a href="xml_inimesteKuvamine.php">XML lugemine</a>
            </li>
        </ul>
    </nav>
</header>
<h2>RSS uudised err.ee</h2>
<ul>
    <?php
    $linkide_arv=10;
    $uudised=simplexml_load_file("https://www.err.ee/rss");
    $loendur=1;
    foreach ($uudised->channel->item as $item) {
        if($loendur<=$linkide_arv){
            echo "<li><a href='$item->link'>".$item->title."</a>";
            echo "<br>".$item->description;
            echo "<br>Kategooria: ".$item->category;
            echo "<br>Kuupäev: ".$item->pubDate;
            echo "<br>";
            echo "<br>";
            //echo "<br>Autor: ".$item->author;
            echo "</li>";
            $loendur++;
        }
    }
    ?>
</ul>
<?php
include("footer.php");
?>
</body>
</html>


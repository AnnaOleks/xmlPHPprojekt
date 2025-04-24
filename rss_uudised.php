<!DOCTYPE html>
<html lang="et">
<head>
    <title>XML andmete lugemine PHP abil</title>
</head>
<body>
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
            //echo "<br>Autor: ".$item->author;
            echo "</li>";
            $loendur++;
        }
    }
    ?>
</ul>
</body>
</html>


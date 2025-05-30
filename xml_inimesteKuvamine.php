<?php
$inimene=simplexml_load_file("inimesed.xml");
?>
<?php
if(isset($_POST['submit'])){
    $xmlDoc = new DOMDocument("1.0","UTF-8");
    $xmlDoc->preserveWhiteSpace = false;
    $xmlDoc->load('inimesed.xml');
    $xmlDoc->formatOutput = true;

    $xml_root = $xmlDoc->documentElement;
    $xmlDoc->appendChild($xml_root);

    $xml_inimene = $xmlDoc->createElement("inimene");
    $xmlDoc->appendChild($xml_inimene);

    $xml_root->appendChild($xml_inimene);

    unset($_POST['submit']);
    foreach($_POST as $voti=>$vaartus){
        $kirje = $xmlDoc->createElement($voti,$vaartus);
        $xml_inimene->appendChild($kirje);
    }
    $xmlDoc->save('inimesed.xml');
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <title>XML inimeste lugemine PHP abil</title>
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
<h2>inimesed.xml failist sisu</h2>
<?php
echo "<strong>1. inimese andmed: </strong>";
echo $inimene->inimene[0]->ees_nim." ";
echo $inimene->inimene[0]->perekonna_nimi.", ";
//xml atribuuti lugemine
echo $inimene->inimene[0]->attributes()->isikukood;
echo "<br>";
?>
<form action="" method="post" name="vorm1">
    <label for="ees_nim">Eesnimi:</label>
    <input type="text" name="ees_nim" id="nimi" autofocus>
    <label for="perekonna_nimi">Perekonnanimi:</label>
    <input type="text" name="perekonna_nimi" id="perenimi">
    <label for="sugu">Sugu:</label>
    <input type="text" name="sugu" id="sugu">
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email">
    <input type="submit" name="submit" id="submit" value="Sisesta">
</form>
<br>
<br>
<table>
    <tr>
        <th>ID</th>
        <th>Nimi</th>
        <th>Perenimi</th>
        <th>Sugu</th>
        <th>e-mail</th>
        <th>Lapseandmned</th>
    </tr>
    <?php
    foreach($inimene->inimene as $isik){
        echo "<tr>";
        echo "<td>".$isik->id."</td>";
        echo "<td>".$isik->ees_nim."</td>";
        echo "<td>".$isik->perekonna_nimi."</td>";
        echo "<td>".$isik->sugu."</td>";
        echo "<td>".$isik->email."</td>";
        foreach($isik->laps->inimene as $laps){
            echo "<td>".$laps->ees_nim." ".$laps->perekonna_nimi."<br>".$laps->sugu."<br>".$laps->email."</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
<?php
include("footer.php");
?>
</body>
</html>